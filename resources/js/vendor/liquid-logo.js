/**
 * liquid-logo.js — framework-free port of paper-design/liquid-logo.
 *
 * Turns a flat logo (SVG/PNG, dark or coloured shape on white or transparent)
 * into animated liquid metal with WebGL2. No dependencies.
 *
 * Shader and mask algorithm: © Paper (https://paper.design), PolyForm Shield 1.0.0.
 * See LICENSE-NOTICE.md in this folder before shipping.
 *
 * Usage:
 *   import { mountLiquidLogo } from './liquid-logo.js';
 *   const logo = await mountLiquidLogo(canvasEl, '/logo.svg', { speed: 0.3 });
 *   logo.setParams({ liquid: 0.2 });
 *   logo.destroy();
 */

export const VERTEX_SHADER = `#version 300 es
precision mediump float;
in vec2 a_position;
out vec2 vUv;
void main() {
  vUv = .5 * (a_position + 1.);
  gl_Position = vec4(a_position, 0.0, 1.0);
}`;

export const FRAGMENT_SHADER = `#version 300 es
precision mediump float;

in vec2 vUv;
out vec4 fragColor;

uniform sampler2D u_image_texture;
uniform float u_time;
uniform float u_ratio;
uniform float u_img_ratio;
uniform float u_patternScale;
uniform float u_refraction;
uniform float u_edge;
uniform float u_patternBlur;
uniform float u_liquid;
uniform vec3 u_color1;
uniform vec3 u_color2;

#define TWO_PI 6.28318530718
#define PI 3.14159265358979323846

vec3 mod289(vec3 x) { return x - floor(x * (1. / 289.)) * 289.; }
vec2 mod289(vec2 x) { return x - floor(x * (1. / 289.)) * 289.; }
vec3 permute(vec3 x) { return mod289(((x*34.)+1.)*x); }
float snoise(vec2 v) {
    const vec4 C = vec4(0.211324865405187, 0.366025403784439, -0.577350269189626, 0.024390243902439);
    vec2 i = floor(v + dot(v, C.yy));
    vec2 x0 = v - i + dot(i, C.xx);
    vec2 i1;
    i1 = (x0.x > x0.y) ? vec2(1., 0.) : vec2(0., 1.);
    vec4 x12 = x0.xyxy + C.xxzz;
    x12.xy -= i1;
    i = mod289(i);
    vec3 p = permute(permute(i.y + vec3(0., i1.y, 1.)) + i.x + vec3(0., i1.x, 1.));
    vec3 m = max(0.5 - vec3(dot(x0, x0), dot(x12.xy, x12.xy), dot(x12.zw, x12.zw)), 0.);
    m = m*m;
    m = m*m;
    vec3 x = 2. * fract(p * C.www) - 1.;
    vec3 h = abs(x) - 0.5;
    vec3 ox = floor(x + 0.5);
    vec3 a0 = x - ox;
    m *= 1.79284291400159 - 0.85373472095314 * (a0*a0 + h*h);
    vec3 g;
    g.x = a0.x * x0.x + h.x * x0.y;
    g.yz = a0.yz * x12.xz + h.yz * x12.yw;
    return 130. * dot(m, g);
}

vec2 get_img_uv() {
    vec2 img_uv = vUv;
    img_uv -= .5;
    if (u_ratio > u_img_ratio) {
        img_uv.x = img_uv.x * u_ratio / u_img_ratio;
    } else {
        img_uv.y = img_uv.y * u_img_ratio / u_ratio;
    }
    img_uv += .5;
    img_uv.y = 1. - img_uv.y;
    return img_uv;
}
vec2 rotate(vec2 uv, float th) {
    return mat2(cos(th), sin(th), -sin(th), cos(th)) * uv;
}
float get_color_channel(float c1, float c2, float stripe_p, vec3 w, float extra_blur, float b) {
    float ch = c2;
    float border = 0.;
    float blur = u_patternBlur + extra_blur;

    ch = mix(ch, c1, smoothstep(.0, blur, stripe_p));

    border = w[0];
    ch = mix(ch, c2, smoothstep(border - blur, border + blur, stripe_p));

    b = smoothstep(.2, .8, b);
    border = w[0] + .4 * (1. - b) * w[1];
    ch = mix(ch, c1, smoothstep(border - blur, border + blur, stripe_p));

    border = w[0] + .5 * (1. - b) * w[1];
    ch = mix(ch, c2, smoothstep(border - blur, border + blur, stripe_p));

    border = w[0] + w[1];
    ch = mix(ch, c1, smoothstep(border - blur, border + blur, stripe_p));

    float gradient_t = (stripe_p - w[0] - w[1]) / w[2];
    float gradient = mix(c1, c2, smoothstep(0., 1., gradient_t));
    ch = mix(ch, gradient, smoothstep(border - blur, border + blur, stripe_p));

    return ch;
}

float get_img_frame_alpha(vec2 uv, float img_frame_width) {
    float img_frame_alpha = smoothstep(0., img_frame_width, uv.x) * smoothstep(1., 1. - img_frame_width, uv.x);
    img_frame_alpha *= smoothstep(0., img_frame_width, uv.y) * smoothstep(1., 1. - img_frame_width, uv.y);
    return img_frame_alpha;
}

void main() {
    vec2 uv = vUv;
    uv.y = 1. - uv.y;
    uv.x *= u_ratio;

    float diagonal = uv.x - uv.y;
    float t = .001 * u_time;

    vec2 img_uv = get_img_uv();
    vec4 img = texture(u_image_texture, img_uv);

    vec3 color = vec3(0.);
    float opacity = 1.;

    vec3 color1 = u_color1;
    vec3 color2 = u_color2;
    color2.b += .1 * smoothstep(.7, 1.3, uv.x + uv.y);

    float edge = img.r;

    vec2 grad_uv = uv;
    grad_uv -= .5;

    float dist = length(grad_uv + vec2(0., .2 * diagonal));

    grad_uv = rotate(grad_uv, (.25 - .2 * diagonal) * PI);

    float bulge = pow(1.8 * dist, 1.2);
    bulge = 1. - bulge;
    bulge *= pow(uv.y, .3);

    float cycle_width = u_patternScale;
    float thin_strip_1_ratio = .12 / cycle_width * (1. - .4 * bulge);
    float thin_strip_2_ratio = .07 / cycle_width * (1. + .4 * bulge);
    float wide_strip_ratio = (1. - thin_strip_1_ratio - thin_strip_2_ratio);

    float thin_strip_1_width = cycle_width * thin_strip_1_ratio;
    float thin_strip_2_width = cycle_width * thin_strip_2_ratio;

    opacity = 1. - smoothstep(.9 - .5 * u_edge, 1. - .5 * u_edge, edge);
    opacity *= get_img_frame_alpha(img_uv, 0.01);

    float noise = snoise(uv - t);

    edge += (1. - edge) * u_liquid * noise;

    float refr = 0.;
    refr += (1. - bulge);
    refr = clamp(refr, 0., 1.);

    float dir = grad_uv.x;
    dir += diagonal;
    dir -= 2. * noise * diagonal * (smoothstep(0., 1., edge) * smoothstep(1., 0., edge));

    bulge *= clamp(pow(uv.y, .1), .3, 1.);
    dir *= (.1 + (1.1 - edge) * bulge);
    dir *= smoothstep(1., .7, edge);
    dir += .18 * (smoothstep(.1, .2, uv.y) * smoothstep(.4, .2, uv.y));
    dir += .03 * (smoothstep(.1, .2, 1. - uv.y) * smoothstep(.4, .2, 1. - uv.y));
    dir *= (.5 + .5 * pow(uv.y, 2.));
    dir *= cycle_width;
    dir -= t;

    float refr_r = refr;
    refr_r += .03 * bulge * noise;
    float refr_b = 1.3 * refr;

    refr_r += 5. * (smoothstep(-.1, .2, uv.y) * smoothstep(.5, .1, uv.y)) * (smoothstep(.4, .6, bulge) * smoothstep(1., .4, bulge));
    refr_r -= diagonal;

    refr_b += (smoothstep(0., .4, uv.y) * smoothstep(.8, .1, uv.y)) * (smoothstep(.4, .6, bulge) * smoothstep(.8, .4, bulge));
    refr_b -= .2 * edge;

    refr_r *= u_refraction;
    refr_b *= u_refraction;

    vec3 w = vec3(thin_strip_1_width, thin_strip_2_width, wide_strip_ratio);
    w[1] -= .02 * smoothstep(.0, 1., edge + bulge);
    float stripe_r = mod(dir + refr_r, 1.);
    float r = get_color_channel(color1.r, color2.r, stripe_r, w, 0.02 + .03 * u_refraction * bulge, bulge);
    float stripe_g = mod(dir, 1.);
    float g = get_color_channel(color1.g, color2.g, stripe_g, w, 0.01 / (1. - diagonal), bulge);
    float stripe_b = mod(dir - refr_b, 1.);
    float b = get_color_channel(color1.b, color2.b, stripe_b, w, .01, bulge);

    color = vec3(r, g, b);
    color *= opacity;

    fragColor = vec4(color, opacity);
}`;

/** Slider ranges from the original app. */
export const PARAM_RANGES = {
  refraction:   { min: 0, max: 0.06, step: 0.001, default: 0.015 },
  edge:         { min: 0, max: 1,    step: 0.01,  default: 0.4 },
  patternBlur:  { min: 0, max: 0.05, step: 0.001, default: 0.005 },
  liquid:       { min: 0, max: 1,    step: 0.01,  default: 0.07 },
  speed:        { min: 0, max: 1,    step: 0.01,  default: 0.3 },
  patternScale: { min: 1, max: 10,   step: 0.1,   default: 2 },
};

export const DEFAULT_PARAMS = Object.freeze({
  refraction: 0.015,
  edge: 0.4,
  patternBlur: 0.005,
  liquid: 0.07,
  speed: 0.3,
  patternScale: 2,
  /** Highlight colour, 0..1 RGB. Original: near white. */
  color1: [0.98, 0.98, 1.0],
  /** Shadow colour, 0..1 RGB. Original: near black. */
  color2: [0.1, 0.1, 0.1],
});

/**
 * Loads an image and turns it into the greyscale "bevel" mask the shader
 * expects: white outside the shape, dark in the middle, fading to white at
 * the edges (Poisson solve with u=0 on the boundary).
 *
 * Pixels that are pure white (255,255,255,255) or fully transparent count as
 * outside the shape. Everything else is inside.
 *
 * @param {string|File|Blob|HTMLImageElement} src
 * @param {{maxSize?:number,minSize?:number,iterations?:number,crossOrigin?:string}} [opts]
 * @returns {Promise<ImageData>}
 */
export async function parseLogoImage(src, opts = {}) {
  const { maxSize = 1000, minSize = 500, iterations = 300, crossOrigin = 'anonymous' } = opts;
  const img = await loadImage(src, crossOrigin);

  let width = img.naturalWidth || img.width || minSize;
  let height = img.naturalHeight || img.height || minSize;

  if (width > maxSize || height > maxSize || width < minSize || height < minSize) {
    if (width > height) {
      if (width > maxSize) { height = Math.round((height * maxSize) / width); width = maxSize; }
      else if (width < minSize) { height = Math.round((height * minSize) / width); width = minSize; }
    } else {
      if (height > maxSize) { width = Math.round((width * maxSize) / height); height = maxSize; }
      else if (height < minSize) { width = Math.round((width * minSize) / height); height = minSize; }
    }
  }
  width = Math.max(1, width);
  height = Math.max(1, height);

  const shapeCanvas = document.createElement('canvas');
  shapeCanvas.width = width;
  shapeCanvas.height = height;
  const shapeCtx = shapeCanvas.getContext('2d', { willReadFrequently: true });
  shapeCtx.drawImage(img, 0, 0, width, height);

  // 1) inside/outside mask
  const data = shapeCtx.getImageData(0, 0, width, height).data;
  const n = width * height;
  const shapeMask = new Uint8Array(n);
  for (let i = 0, p = 0; i < n; i++, p += 4) {
    const r = data[p], g = data[p + 1], b = data[p + 2], a = data[p + 3];
    shapeMask[i] = (a === 0 || (r === 255 && g === 255 && b === 255 && a === 255)) ? 0 : 1;
  }

  // 2) boundary pixels: inside with at least one outside (or off-canvas) neighbour
  const boundary = new Uint8Array(n);
  for (let y = 0; y < height; y++) {
    for (let x = 0; x < width; x++) {
      const i = y * width + x;
      if (!shapeMask[i]) continue;
      let isB = false;
      for (let ny = y - 1; ny <= y + 1 && !isB; ny++) {
        for (let nx = x - 1; nx <= x + 1 && !isB; nx++) {
          if (nx < 0 || nx >= width || ny < 0 || ny >= height || !shapeMask[ny * width + nx]) isB = true;
        }
      }
      if (isB) boundary[i] = 1;
    }
  }

  // 3) Poisson solve: u_xx + u_yy = C with u = 0 at the boundary
  let u = new Float32Array(n);
  let nu = new Float32Array(n);
  const C = 0.01;
  for (let iter = 0; iter < iterations; iter++) {
    for (let y = 0; y < height; y++) {
      const row = y * width;
      for (let x = 0; x < width; x++) {
        const i = row + x;
        if (!shapeMask[i] || boundary[i]) { nu[i] = 0; continue; }
        // neighbours outside the shape are 0 by construction (boundary pixels are 0 too)
        const l = x > 0 ? u[i - 1] : 0;
        const r = x < width - 1 ? u[i + 1] : 0;
        const t = y > 0 ? u[i - width] : 0;
        const b = y < height - 1 ? u[i + width] : 0;
        nu[i] = (C + l + r + t + b) / 4;
      }
    }
    const tmp = u; u = nu; nu = tmp;
  }

  // 4) normalise + contrast remap, write greyscale
  let maxVal = 0;
  for (let i = 0; i < n; i++) if (u[i] > maxVal) maxVal = u[i];
  if (maxVal === 0) maxVal = 1;
  const alpha = 2.0;
  const out = new ImageData(width, height);
  const od = out.data;
  for (let i = 0, p = 0; i < n; i++, p += 4) {
    let gray = 255;
    if (shapeMask[i]) {
      const raw = u[i] / maxVal;
      gray = 255 * (1 - Math.pow(raw, alpha));
    }
    od[p] = od[p + 1] = od[p + 2] = gray;
    od[p + 3] = 255;
  }
  return out;
}

function loadImage(src, crossOrigin) {
  if (typeof HTMLImageElement !== 'undefined' && src instanceof HTMLImageElement) {
    if (src.complete && src.naturalWidth) return Promise.resolve(src);
    return new Promise((res, rej) => { src.onload = () => res(src); src.onerror = () => rej(new Error('Failed to load image')); });
  }
  return new Promise((resolve, reject) => {
    const img = new Image();
    if (crossOrigin) img.crossOrigin = crossOrigin;
    let objectUrl = null;
    img.onload = () => {
      // SVGs without intrinsic size report 0 or 300x150; give them a clean square to rasterise into.
      if (isSvg(src) && (!img.naturalWidth || !img.naturalHeight || (img.naturalWidth === 300 && img.naturalHeight === 150))) {
        img.width = 1000;
        img.height = 1000;
      }
      if (objectUrl) URL.revokeObjectURL(objectUrl);
      resolve(img);
    };
    img.onerror = () => { if (objectUrl) URL.revokeObjectURL(objectUrl); reject(new Error('Failed to load image')); };
    if (typeof src === 'string') {
      img.src = src;
    } else {
      objectUrl = URL.createObjectURL(src);
      img.src = objectUrl;
    }
  });
}

function isSvg(src) {
  if (typeof src === 'string') return /\.svg(\?|#|$)/i.test(src) || src.startsWith('data:image/svg+xml');
  return !!src && src.type === 'image/svg+xml';
}

/**
 * Attach the shader to a canvas with an already-parsed mask.
 *
 * The canvas backing store is square (size × dpr); the logo is letterboxed
 * inside it and everything outside the shape is transparent. Size the canvas
 * with CSS and use `object-fit: contain`.
 *
 * @param {HTMLCanvasElement} canvas
 * @param {ImageData} imageData  from parseLogoImage()
 * @param {Partial<typeof DEFAULT_PARAMS> & {size?:number,maxDpr?:number,autoPause?:boolean,respectReducedMotion?:boolean}} [options]
 */
export function createLiquidLogo(canvas, imageData, options = {}) {
  const {
    size = 1000,
    maxDpr = 2,
    autoPause = true,
    respectReducedMotion = true,
    ...paramOverrides
  } = options;

  const gl = canvas.getContext('webgl2', { antialias: true, alpha: true, premultipliedAlpha: true });
  if (!gl) throw new Error('WebGL2 is not available in this browser');

  const program = buildProgram(gl, VERTEX_SHADER, FRAGMENT_SHADER);
  gl.useProgram(program);

  const uniforms = {};
  const count = gl.getProgramParameter(program, gl.ACTIVE_UNIFORMS);
  for (let i = 0; i < count; i++) {
    const info = gl.getActiveUniform(program, i);
    if (info) uniforms[info.name] = gl.getUniformLocation(program, info.name);
  }

  const buffer = gl.createBuffer();
  gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
  gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);
  const aPos = gl.getAttribLocation(program, 'a_position');
  gl.enableVertexAttribArray(aPos);
  gl.vertexAttribPointer(aPos, 2, gl.FLOAT, false, 0, 0);

  let params = { ...DEFAULT_PARAMS, ...paramOverrides };
  let texture = null;
  let raf = 0;
  let playing = false;
  let visible = true;
  let totalTime = 0;
  let lastTime = 0;

  function applyParams() {
    gl.uniform1f(uniforms.u_edge, params.edge);
    gl.uniform1f(uniforms.u_patternBlur, params.patternBlur);
    gl.uniform1f(uniforms.u_patternScale, params.patternScale);
    gl.uniform1f(uniforms.u_refraction, params.refraction);
    gl.uniform1f(uniforms.u_liquid, params.liquid);
    gl.uniform3fv(uniforms.u_color1, params.color1);
    gl.uniform3fv(uniforms.u_color2, params.color2);
  }

  function resize() {
    const dpr = Math.min(window.devicePixelRatio || 1, maxDpr);
    const px = Math.round(size * dpr);
    if (canvas.width !== px || canvas.height !== px) {
      canvas.width = px;
      canvas.height = px;
    }
    gl.viewport(0, 0, px, px);
    gl.uniform1f(uniforms.u_ratio, 1);
    gl.uniform1f(uniforms.u_img_ratio, imageData.width / imageData.height);
  }

  function upload(data) {
    imageData = data;
    if (texture) gl.deleteTexture(texture);
    texture = gl.createTexture();
    gl.activeTexture(gl.TEXTURE0);
    gl.bindTexture(gl.TEXTURE_2D, texture);
    gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
    gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
    gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
    gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
    gl.pixelStorei(gl.UNPACK_ALIGNMENT, 1);
    gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, data.width, data.height, 0, gl.RGBA, gl.UNSIGNED_BYTE, data.data);
    gl.uniform1i(uniforms.u_image_texture, 0);
    gl.uniform1f(uniforms.u_img_ratio, data.width / data.height);
  }

  function drawFrame() {
    gl.uniform1f(uniforms.u_time, totalTime);
    gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
  }

  function loop(now) {
    if (!playing) return;
    const dt = now - lastTime;
    lastTime = now;
    totalTime += dt * effectiveSpeed();
    drawFrame();
    raf = requestAnimationFrame(loop);
  }

  const reducedMotion = respectReducedMotion && typeof matchMedia === 'function'
    ? matchMedia('(prefers-reduced-motion: reduce)') : null;

  function effectiveSpeed() {
    return reducedMotion && reducedMotion.matches ? 0 : params.speed;
  }

  function play() {
    if (playing) return;
    playing = true;
    if (!visible) return; // the IntersectionObserver restarts the loop when it scrolls into view
    lastTime = performance.now();
    raf = requestAnimationFrame(loop);
  }

  function pause() {
    playing = false;
    cancelAnimationFrame(raf);
  }

  let io = null;
  if (autoPause && typeof IntersectionObserver === 'function') {
    io = new IntersectionObserver((entries) => {
      const wasVisible = visible;
      visible = entries.some((e) => e.isIntersecting);
      if (visible && !wasVisible && playing) {
        lastTime = performance.now();
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(loop);
      } else if (!visible) {
        cancelAnimationFrame(raf);
      }
    });
    io.observe(canvas);
  }

  const onResize = () => { resize(); if (!playing) drawFrame(); };
  window.addEventListener('resize', onResize);

  upload(imageData);
  resize();
  applyParams();
  drawFrame();
  playing = true;
  lastTime = performance.now();
  raf = requestAnimationFrame(loop);

  return {
    canvas,
    gl,
    /** Merge new shader params (see DEFAULT_PARAMS). */
    setParams(next) {
      params = { ...params, ...next };
      applyParams();
      if (!playing) drawFrame();
    },
    getParams() { return { ...params }; },
    /** Swap the logo for a new parsed mask. */
    setImage(data) { upload(data); resize(); if (!playing) drawFrame(); },
    play,
    pause,
    destroy() {
      pause();
      window.removeEventListener('resize', onResize);
      if (io) io.disconnect();
      if (texture) gl.deleteTexture(texture);
      gl.deleteBuffer(buffer);
      gl.deleteProgram(program);
      const lose = gl.getExtension('WEBGL_lose_context');
      if (lose) lose.loseContext();
    },
  };
}

/**
 * One-call helper: parse the image, then render it on the canvas.
 * @param {HTMLCanvasElement} canvas
 * @param {string|File|Blob|HTMLImageElement} src
 * @param {Parameters<typeof createLiquidLogo>[2] & {parse?: Parameters<typeof parseLogoImage>[1]}} [options]
 */
export async function mountLiquidLogo(canvas, src, options = {}) {
  const { parse, ...rest } = options;
  const imageData = await parseLogoImage(src, parse);
  return createLiquidLogo(canvas, imageData, rest);
}

function buildProgram(gl, vsSource, fsSource) {
  const compile = (type, source) => {
    const shader = gl.createShader(type);
    gl.shaderSource(shader, source);
    gl.compileShader(shader);
    if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
      const log = gl.getShaderInfoLog(shader);
      gl.deleteShader(shader);
      throw new Error('Shader compile failed: ' + log);
    }
    return shader;
  };
  const vs = compile(gl.VERTEX_SHADER, vsSource);
  const fs = compile(gl.FRAGMENT_SHADER, fsSource);
  const program = gl.createProgram();
  gl.attachShader(program, vs);
  gl.attachShader(program, fs);
  gl.linkProgram(program);
  gl.deleteShader(vs);
  gl.deleteShader(fs);
  if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
    const log = gl.getProgramInfoLog(program);
    gl.deleteProgram(program);
    throw new Error('Program link failed: ' + log);
  }
  return program;
}
