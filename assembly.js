/**
 * Assembly: a dashboard screen lying on the desk, its widgets hovering apart
 * above it: a navigation rail, a top bar, four stat tiles, a bar chart and
 * a table. Each widget rides its own spring at its own rest height, over a
 * dashed slot on the screen. The pointer is projected onto the screen, and
 * each widget settles by its distance to it: the one under the pointer seats
 * flush and takes the bright edge, its neighbours come part of the way down,
 * and the far ones stay up. Leaving lets them all float back. The slider is
 * the reach, in screen units.
 *
 * The pattern: a continuous field, as Terrain. Springs, a falloff by
 * distance, a hit test on the screen plane (which never moves), and a rest
 * that is a composition: the widgets hang at uneven heights, the tallest bar
 * of the chart bright.
 */
const {
  Cam, clamp, facing, fit, open, poly, prism, proj, ringAt, rings, rrect, seg, unproj, spring, stepS,
  mk, pointer, put, register, disposer, solid,
} = HL;

const W = 150, D = 100, PT = 3, T = 3;              // the screen's width, depth and thickness; a widget's thickness
const BAR_H = [6, 10, 8, 14, 11, 16, 9];            // the chart's bars

/** The widgets: footprint, rest height, read-out name, and the marks each would really have. */
const WIDGETS = [
  { name: "nav",    x0: 0,   y0: 0,  x1: 30,  y1: 100, h: 14, r: 4 },
  { name: "bar",    x0: 34,  y0: 0,  x1: 150, y1: 14,  h: 8,  r: 3.5 },
  { name: "tile 1", x0: 34,  y0: 18, x1: 60,  y1: 42,  h: 10, r: 3 },
  { name: "tile 2", x0: 64,  y0: 18, x1: 90,  y1: 42,  h: 16, r: 3 },
  { name: "tile 3", x0: 94,  y0: 18, x1: 120, y1: 42,  h: 12, r: 3 },
  { name: "tile 4", x0: 124, y0: 18, x1: 150, y1: 42,  h: 18, r: 3 },
  { name: "chart",  x0: 34,  y0: 46, x1: 98,  y1: 100, h: 20, r: 4 },
  { name: "table",  x0: 102, y0: 46, x1: 150, y1: 100, h: 9,  r: 4 },
];
const SPARK = [[0, 6], [4, 2], [8, 4.5], [12, 1], [16, 3]];

/** The share of settling at u reaches from the pointer: 1 → .31 at 42% → .09 at the edge and beyond, as Terrain. */
const falloff = (u) =>
  u <= 0 ? 1 : u <= 0.417 ? 1 - (u / 0.417) * 0.6875 : u <= 1 ? 0.3125 - ((u - 0.417) / 0.583) * 0.2185 : 0.094;

function mount({ stage, svg, read }, value) {
  const bag = disposer();
  let R = value, over = null;

  // fitted to the screen with the chart at its rest height, so the hover never leaves the frame
  const C = Cam(45, 0.5, 1.5);
  fit(C, [[-4, -4, -PT], [W + 4, D + 4, -PT], [W + 4, -4, -PT], [-4, D + 4, -PT], [34, 46, 20 + T + 16], [150, 18, 18 + T]], 200, 166);
  const P = proj(C), front = facing(C);

  const g = mk("g", {}, svg);
  const [pr, pi] = rings(-4, -4, W + 4, D + 4, 7, 2);
  put(solid(g), prism(P, front, pr, pi, -PT, 0));

  // widgets back to front: the rail first, then across the top, then the chart and the table nearest
  const parts = WIDGETS.map((w) => {
    const [ring, inner] = rings(w.x0, w.y0, w.x1, w.y1, w.r, 1.1);
    mk("path", { d: poly(ringAt(P, ring, 0)), class: "dash nf" }, g);   // the slot it seats into, drawn before it
    const grp = mk("g", {}, g);
    const body = solid(grp);
    const marks = mk("path", { class: "nf lo" }, grp), line = mk("path", { class: "nf" }, grp);
    const bars = w.name === "chart" ? BAR_H.map(() => solid(grp)) : [];
    return { ...w, ring, inner, body, marks, line, bars, sp: spring(w.h, { eps: 0.04 }), drawn: NaN };
  });
  const chart = parts.find((p) => p.name === "chart"), tallest = BAR_H.indexOf(Math.max(...BAR_H));

  /** What a widget carries on its top, at height z: the lines its kind would really have. */
  function marksOf(p, z) {
    const top = z + T, lo = [], hi = [];
    if (p.name === "nav") {
      hi.push(seg(P(6, 9, top), P(24, 9, top)));
      for (let k = 0; k < 5; k++) lo.push(seg(P(6, 20 + k * 11, top), P(k === 2 ? 20 : 24, 20 + k * 11, top)));
    } else if (p.name === "bar") {
      lo.push(poly(ringAt(P, rrect(40, 4, 92, 10, 3, 4), top)));
      lo.push(seg(P(128, 7, top), P(144, 7, top)));
    } else if (p.name.startsWith("tile")) {
      lo.push(seg(P(p.x0 + 4, p.y0 + 5, top), P(p.x0 + 14, p.y0 + 5, top)));
      hi.push(open(SPARK.map(([u, v]) => P(p.x0 + 5 + u, p.y0 + 11 + v * 1.6, top))));
    } else if (p.name === "chart") {
      lo.push(seg(P(38, 51, top), P(58, 51, top)));
      lo.push(seg(P(38, 92, top), P(94, 92, top)));
    } else if (p.name === "table") {
      for (let k = 0; k < 5; k++) lo.push(seg(P(106, 53 + k * 10, top), P(k === 0 ? 130 : 146, 53 + k * 10, top)));
    }
    return { lo: lo.join(""), hi: hi.join("") };
  }

  function draw(p) {
    const z = p.sp.x;
    if (z === p.drawn) return;
    p.drawn = z;
    put(p.body, prism(P, front, p.ring, p.inner, z, z + T));
    const m = marksOf(p, z);
    p.marks.setAttribute("d", m.lo);
    p.line.setAttribute("d", m.hi);
    p.bars.forEach((b, k) => {
      const x = 39 + k * 8;
      const [ring, inner] = rings(x, 68, x + 5.5, 88, 1.6, 0.6);
      put(b, prism(P, front, ring, inner, z + T, z + T + BAR_H[k]));
    });
  }

  const B = register(stage, (dt) => {
    let m = false;
    for (const p of parts) { if (stepS(p.sp, dt)) m = true; draw(p); }
    return m;
  });
  bag.add(B.unregister);

  let act = null;
  /** The bright edge: the widget under the pointer, or at rest the chart with its tallest bar, one thing. */
  function light(p) {
    if (p === act) return;
    act = p;
    parts.forEach((q) => q.body.sil.classList.toggle("hi", q === (p || chart)));
    chart.bars[tallest].sil.classList.toggle("hi", !p);
  }
  light(null);

  function retarget() {
    let under = null;
    for (const p of parts) {
      if (!over) { p.sp.t = p.h; continue; }
      const dx = over[0] - clamp(over[0], p.x0, p.x1), dy = over[1] - clamp(over[1], p.y0, p.y1);
      const d = Math.hypot(dx, dy);
      if (d === 0) under = p;
      p.sp.t = p.h * (1 - falloff(d / R));
    }
    light(under);
    read.textContent = !over ? "rest" : under ? under.name : "screen";
    B.wake();
  }

  bag.add(pointer(stage, {
    move: (pt) => { over = unproj(C, pt[0], pt[1], 0); retarget(); },
    leave: () => { over = null; retarget(); },
  }));
  bag.add(() => svg.replaceChildren());

  return {
    set: (v) => { R = v; if (over) retarget(); },
    destroy: bag.dispose,
  };
}

hairline({
  name: "assembly",
  means: "A dashboard's widgets hover above its screen and settle into place as the pointer nears; the one under it seats flush.",
  rules: [1, 3, 5, 6, 9],
  range: [45, 80, 130],
  tour: [[223, 157], [166, 173], [136, 134], null],
  mount,
});
