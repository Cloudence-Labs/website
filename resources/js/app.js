/**
 * Cloudence site behaviours. Everything here is small and synchronous; the
 * heavy pieces (3D hero, liquid-metal wordmark, glass) are loaded on demand
 * only when the page contains their mount points.
 */
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const $ = (s, r = document) => r.querySelector(s);
const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));

/* ── Page loader ─────────────────────────────────────────── */
/* The counter eases toward 90 while the page loads, runs to 100 on window load,
   then the columns lift away and `cloudence:ready` starts each page's intro. */
(function loader() {
  const el = $('#pageLoader');
  const html = document.documentElement;
  if (!el) { html.classList.remove('is-loading'); return; }
  const num = $('.pl-count b', el);
  const started = performance.now();
  const MIN = 900, MAX = 4000;
  let shown = 0, loaded = false, done = false;
  function finish() {
    if (done) return; done = true;
    if (num) num.textContent = '100';
    el.classList.add('is-done');
    html.classList.remove('is-loading');
    document.dispatchEvent(new CustomEvent('cloudence:ready'));
    setTimeout(() => el.remove(), 1400);
  }
  function tick() {
    if (done) return;
    const t = performance.now() - started;
    const target = loaded ? 100 : 90 * (1 - Math.exp(-t / 1100));
    shown += (target - shown) * (loaded ? 0.16 : 0.08);
    if (loaded && shown > 99.4) { finish(); return; }
    if (num) num.textContent = String(Math.floor(shown));
    requestAnimationFrame(tick);
  }
  const markLoaded = () => {
    if (reduceMotion) { finish(); return; }
    setTimeout(() => { loaded = true; }, Math.max(0, MIN - (performance.now() - started)));
  };
  if (document.readyState === 'complete') markLoaded(); else window.addEventListener('load', markLoaded);
  setTimeout(() => { loaded = true; if (reduceMotion) finish(); }, MAX);
  window.addEventListener('pageshow', (e) => { if (e.persisted) finish(); });
  if (!reduceMotion) requestAnimationFrame(tick);
})();

/* ── Header ──────────────────────────────────────────────── */
(function header() {
  // Shared header scroll states (pages with their own header skip this; the mobile menu below still wires up)
  const header = $('#siteHeader');
  if (header) {
    let last = 0;
    const onScroll = () => {
      const y = window.scrollY;
      header.classList.toggle('is-scrolled', y > 24);
      header.classList.toggle('is-hidden', y > 320 && y > last + 4);
      if (y < last - 4) header.classList.remove('is-hidden');
      last = y;
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // Mobile menu
  const menu = $('#mobileMenu');
  if (menu) {
    const open = () => { menu.classList.add('is-open'); document.body.style.overflow = 'hidden'; $('#menuBtn').setAttribute('aria-expanded', 'true'); };
    const close = () => { menu.classList.remove('is-open'); document.body.style.overflow = ''; $('#menuBtn').setAttribute('aria-expanded', 'false'); };
    $('#menuBtn')?.addEventListener('click', open);
    $('#menuClose')?.addEventListener('click', close);
    $$('.mobile-link', menu).forEach((a) => a.addEventListener('click', close));
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
    $$('[data-sub-toggle]', menu).forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = document.getElementById(btn.getAttribute('aria-controls'));
        const isOpen = panel.classList.toggle('is-open');
        btn.setAttribute('aria-expanded', String(isOpen));
      });
    });
  }
})();

/* ── Scroll reveal ───────────────────────────────────────── */
(function reveal() {
  // Split marked headings into words for staggered rise
  $$('.reveal-words').forEach((el) => {
    if (el.dataset.split) return;
    el.dataset.split = '1';
    const walk = (node) => {
      Array.from(node.childNodes).forEach((n) => {
        if (n.nodeType === 3) {
          const frag = document.createDocumentFragment();
          n.textContent.split(/(\s+)/).forEach((part) => {
            if (!part) return;
            if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(' ')); return; }
            const w = document.createElement('span'); w.className = 'w';
            const s = document.createElement('span'); s.textContent = part;
            w.appendChild(s); frag.appendChild(w);
          });
          n.replaceWith(frag);
        } else if (n.nodeType === 1 && n.tagName !== 'BR') {
          walk(n);
          // Lift the wrapped words (and the spaces between them) out of the inline element so each
          // word is a direct child of the heading; the element's classes move onto the words.
          Array.from(n.querySelectorAll(':scope > .w > span')).forEach((span) => span.classList.add(...n.classList));
          while (n.firstChild) n.parentNode.insertBefore(n.firstChild, n);
          n.remove();
        }
      });
    };
    walk(el);
    $$('.w > span', el).forEach((s, i) => s.style.setProperty('--i', i));
  });

  const items = $$('.reveal, .reveal-words');
  const start = () => {
    if (!('IntersectionObserver' in window) || reduceMotion) { items.forEach((el) => el.classList.add('in')); return; }
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    // Anything already on screen reveals at once; do not wait for the observer's first frame
    const vh = window.innerHeight;
    items.forEach((el) => {
      const r = el.getBoundingClientRect();
      if (r.top < vh * 0.92 && r.bottom > 0) el.classList.add('in'); else io.observe(el);
    });
  };
  if (document.documentElement.classList.contains('is-loading')) document.addEventListener('cloudence:ready', start, { once: true });
  else start();
})();

/* ── Counters ────────────────────────────────────────────── */
(function counters() {
  const els = $$('.counter');
  if (!els.length) return;
  const run = (el) => {
    const target = parseFloat(el.dataset.target) || 0;
    const decimals = (String(el.dataset.target).split('.')[1] || '').length;
    if (reduceMotion) { el.textContent = target.toFixed(decimals); return; }
    let start = null; const dur = 1500;
    const step = (now) => {
      if (!start) start = now;
      const p = Math.min((now - start) / dur, 1);
      el.textContent = (target * (1 - Math.pow(1 - p, 3))).toFixed(decimals);
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => { if (e.isIntersecting) { run(e.target); io.unobserve(e.target); } });
  }, { threshold: 0.5 });
  els.forEach((el) => io.observe(el));
})();

/* ── Tabs (data-tabs) ────────────────────────────────────── */
(function tabs() {
  $$('[data-tabs]').forEach((root) => {
    const tabs = $$('[role=tab]', root);
    const panels = $$('[role=tabpanel]', root);
    tabs.forEach((tab) => tab.addEventListener('click', () => {
      tabs.forEach((t) => { const on = t === tab; t.setAttribute('aria-selected', String(on)); t.classList.toggle('is-active', on); });
      panels.forEach((p) => p.hidden = p.id !== tab.getAttribute('aria-controls'));
    }));
  });
})();

/* ── Horizontal carousels (data-carousel) ────────────────── */
(function carousels() {
  $$('[data-carousel]').forEach((root) => {
    const track = $('[data-track]', root), prev = $('[data-prev]', root), next = $('[data-next]', root), bar = $('[data-progress]', root);
    if (!track) return;
    const step = () => { const c = track.firstElementChild; const gap = parseFloat(getComputedStyle(track).columnGap) || 0; return c ? c.getBoundingClientRect().width + gap : track.clientWidth; };
    const update = () => {
      const max = track.scrollWidth - track.clientWidth;
      if (prev) prev.disabled = track.scrollLeft <= 2;
      if (next) next.disabled = track.scrollLeft >= max - 2;
      if (bar) { const ratio = max > 0 ? track.clientWidth / track.scrollWidth : 1; bar.style.width = ratio * 100 + '%'; bar.style.transform = `translateX(${max > 0 ? (track.scrollLeft / max) * (100 / ratio - 100) : 0}%)`; }
    };
    prev?.addEventListener('click', () => track.scrollBy({ left: -step(), behavior: 'smooth' }));
    next?.addEventListener('click', () => track.scrollBy({ left: step(), behavior: 'smooth' }));
    track.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
  });
})();

/* ── Card spotlight (mouse-follow glow) ──────────────────── */
(function spotlight() {
  if (reduceMotion || !window.matchMedia('(hover: hover)').matches) return;
  $$('.card-glow').forEach((card) => card.addEventListener('pointermove', (e) => {
    const r = card.getBoundingClientRect();
    card.style.setProperty('--mx', `${e.clientX - r.left}px`);
    card.style.setProperty('--my', `${e.clientY - r.top}px`);
  }));
})();

/* ── Brief → WhatsApp ────────────────────────────────────── */
(function brief() {
  $$('[data-brief-form]').forEach((form) => form.addEventListener('submit', (e) => {
    e.preventDefault();
    const input = $('input[name=brief]', form);
    const text = input?.value.trim();
    if (!text) return;
    window.open(`${form.dataset.wa}?text=${encodeURIComponent('Hello Cloudence, I would like a consultation about: ' + text)}`, '_blank', 'noopener');
  }));
})();

/* ── Liquid glass (liquid-web) ───────────────────────────── */
(function glass() {
  const targets = $$('[data-liquid]');
  if (!targets.length || reduceMotion) return;
  // Skip on Firefox: the library disables the displacement there; the CSS .glass fallback already looks right.
  if (/firefox/i.test(navigator.userAgent)) return;
  import('liquid-web').then((m) => {
    const LiquidWeb = m.default || m.LiquidWeb;
    const raf = window.requestAnimationFrame; // the library replaces rAF with a setTimeout shim; restore it
    try {
      new LiquidWeb('[data-liquid]', { scale: 10, blur: 8, saturation: 150, aberration: 20, mode: 'standard' });
    } catch (err) { console.warn('liquid-web', err); }
    window.requestAnimationFrame = raf;
  });
})();

/* ── 3D hero (react-three-fiber) ─────────────────────────── */
(function hero() {
  const el = $('#hero-scene');
  if (!el) return;
  const canUseWebGL = (() => { try { const c = document.createElement('canvas'); return !!(c.getContext('webgl2') || c.getContext('webgl')); } catch { return false; } })();
  if (!canUseWebGL) return;
  const mount = () => import('./hero/mount.jsx').then((m) => m.mountHero(el, { reduceMotion }));
  if ('requestIdleCallback' in window) requestIdleCallback(mount, { timeout: 1200 }); else setTimeout(mount, 200);
})();

/* ── Liquid-metal wordmark (liquid-logo) ─────────────────── */
(function liquid() {
  const canvases = $$('canvas[data-liquid-logo]');
  if (!canvases.length) return;
  let imageData = null;
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (!e.isIntersecting) return;
      io.unobserve(e.target);
      import('./vendor/liquid-logo.js').then(async ({ parseLogoImage, createLiquidLogo }) => {
        try {
          imageData = imageData || await parseLogoImage(e.target.dataset.liquidLogo, { maxSize: 900, iterations: 220 });
          createLiquidLogo(e.target, imageData, {
            size: 1400, maxDpr: 1.5, speed: 0.22, liquid: 0.06, refraction: 0.012, edge: 0.45, patternScale: 2.4, patternBlur: 0.006,
            color1: [0.98, 0.97, 0.95], color2: [0.09, 0.09, 0.1],
          });
          e.target.classList.add('is-ready');
        } catch (err) { console.warn('liquid-logo', err); }
      });
    });
  }, { rootMargin: '300px' });
  canvases.forEach((c) => io.observe(c));
})();

/* ── Mega menus (desktop) ────────────────────────────────── */
(function mega() {
  const triggers = $$('[data-menu-trigger]');
  if (!triggers.length) return;
  let openKey = null, timer = 0;
  const panelFor = (k) => $(`[data-menu-panel="${k}"]`);
  const close = () => {
    if (!openKey) return;
    panelFor(openKey)?.classList.remove('is-open');
    $(`[data-menu-trigger="${openKey}"]`)?.setAttribute('aria-expanded', 'false');
    openKey = null;
  };
  const open = (k) => {
    clearTimeout(timer);
    if (openKey === k) return;
    close();
    openKey = k;
    panelFor(k)?.classList.add('is-open');
    $(`[data-menu-trigger="${k}"]`)?.setAttribute('aria-expanded', 'true');
  };
  const scheduleClose = () => { clearTimeout(timer); timer = setTimeout(close, 160); };
  triggers.forEach((t) => {
    const k = t.dataset.menuTrigger;
    t.addEventListener('pointerenter', () => open(k));
    t.addEventListener('focus', () => open(k));
    t.addEventListener('pointerleave', scheduleClose);
    t.addEventListener('click', (e) => {
      // Touch / keyboard: first activation opens, second follows the link
      if (!window.matchMedia('(hover: hover)').matches && openKey !== k) { e.preventDefault(); open(k); }
    });
    const p = panelFor(k);
    p?.addEventListener('pointerenter', () => open(k));
    p?.addEventListener('pointerleave', scheduleClose);
    p?.addEventListener('focusout', (e) => { if (!p.contains(e.relatedTarget)) scheduleClose(); });
  });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
  document.addEventListener('pointerdown', (e) => { if (!e.target.closest('[data-menu-root]')) close(); });
  window.addEventListener('scroll', () => { if (openKey) close(); }, { passive: true });
})();

/* ── Stack chapters (home) ───────────────────────────────── */
(function stack() {
  const stack = $('[data-stack]');
  const chapters = $$('[data-chapter]');
  if (!stack || !chapters.length) return;
  const layers = $$('.stack-layer', stack);
  const activate = (key) => {
    layers.forEach((l) => l.classList.toggle('is-active', l.dataset.layer === key));
    stack.dataset.active = key;
  };
  activate(chapters[0].dataset.chapter);
  if (!('IntersectionObserver' in window)) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => { if (e.isIntersecting) activate(e.target.dataset.chapter); });
  }, { rootMargin: '-45% 0px -45% 0px', threshold: 0 });
  chapters.forEach((c) => io.observe(c));
})();

/* ── Fill-in-the-blanks brief → WhatsApp ─────────────────── */
(function madlib() {
  $$('[data-madlib]').forEach((form) => {
    const fit = (el) => { if (el.tagName === 'INPUT') el.style.width = Math.max(6, (el.value || el.placeholder || '').length + 1) + 'ch'; };
    $$('input.madlib-field', form).forEach((el) => { fit(el); el.addEventListener('input', () => fit(el)); });
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const need = $('[name=need]', form)?.value, org = $('[name=org]', form)?.value.trim(), where = $('[name=where]', form)?.value;
      const text = `Hello Cloudence, I need ${need || 'help with a project'} for ${org || 'my organisation'} in ${where || 'Nigeria'}. Can we talk?`;
      window.open(`${form.dataset.wa}?text=${encodeURIComponent(text)}`, '_blank', 'noopener');
    });
  });
})();
