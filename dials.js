/**
 * Dials: a console with five round gauges in a row and a key under each.
 * The gauge under the pointer rises out of the panel, swings its needle to
 * its peak and tilts its key up; the neighbours follow part of the way,
 * staggered outwards on the 700ms lift curve, and settle back when the
 * pointer leaves. Each dial has its own rest reading, and one channel is
 * live at rest, its key up and its gauge bright, so the console is composed
 * before anyone touches it. The slider is the stagger, in ms.
 *
 * The pattern: discrete items, as Riffle. Tweens, a stagger by distance, a
 * hit test against the resting tops of the gauges and the keys, and one
 * bright stroke that moves from the live channel to the chosen one.
 */
const {
  Cam, circ, clamp, facing, fit, hull, lerp, open, poly, proj, rad, ringAt, rings, prism, rrect, run, seg, unproj,
  tdone, tset, tval, tween, disposer, mk, place, pointer, reflect, register, solid, put,
} = HL;

const N = 5, GAP = 34, R = 12.5, CY = 21;                     // five gauges, their spacing, radius, and the row they sit on
const PX0 = 0, PX1 = (N - 1) * GAP + 34, PY0 = 0, PY1 = 42;   // the panel
const BX0 = -8, BX1 = PX1 + 8, BY0 = -8, BY1 = 74;            // the base slab
const BZ = 6, PZ = 16, GZ = 21, LIFT = 8;                     // base top, panel top, gauge top, and how far a chosen gauge rises
const KY0 = 52, KY1 = 66, KW = 10, KH = 5, TILT = 24;         // keys: their band, half width, height, and the tilt when chosen
const REST = [28, 64, 46, 82, 37], PEAK = [86, 72, 94, 58, 91]; // each dial's rest reading and its peak
const LIVE = 3;                                               // the channel that is live at rest: key up, gauge bright
const A0 = -210, SWEEP = 240;                                 // the dial's arc, in degrees, reading 0 to 100
const TICKS = 9;

const cx = (i) => 17 + i * GAP;
const angle = (reading) => rad(A0 + (SWEEP * clamp(reading, 0, 100)) / 100);

/** How far a neighbour d dials away follows the chosen one, down to a floor. */
const falloff = (d) => (d === 0 ? 1 : d === 1 ? 0.5 : d === 2 ? 0.22 : 0.1);

const ringAround = (i, r) => circ(r, 20).map((q) => ({ ...q, u: q.u + cx(i), v: q.v + CY }));

/** Gauge i risen by z: its bezel, grown out of the panel, with the tick marks a dial would really have, on its top. */
function gauge(P, front, rings_, i, z) {
  const bezel = prism(P, front, rings_.ring, rings_.inner, PZ, GZ + z);
  let ticks = "";
  for (let k = 0; k < TICKS; k++) {
    const a = rad(A0 + (SWEEP * k) / (TICKS - 1)), long = k % 4 === 0;
    const r0 = R - 3.2, r1 = long ? R - 6.2 : R - 4.8;
    ticks += seg(P(cx(i) + r0 * Math.cos(a), CY + r0 * Math.sin(a), GZ + z), P(cx(i) + r1 * Math.cos(a), CY + r1 * Math.sin(a), GZ + z));
  }
  return { bezel, ticks };
}

/** The needle of dial i at a reading, risen by z: a stroke from the hub to the arc, with a short counterweight behind. */
function needle(P, i, reading, z) {
  const a = angle(reading), len = R - 3.6, tail = 3.2;
  return seg(P(cx(i) - tail * Math.cos(a), CY - tail * Math.sin(a), GZ + z), P(cx(i) + len * Math.cos(a), CY + len * Math.sin(a), GZ + z));
}

/** Key i tilted th degrees up about its back edge, foot and top together, as a lid lifts: a silhouette and one crease. */
function key(P, front, i, th) {
  const x0 = cx(i) - KW, x1 = cx(i) + KW, s = Math.sin(rad(th)), c = Math.cos(rad(th));
  const foot = rrect(x0, KY0, x1, KY1, 3, 4), inner = rrect(x0 + 1.4, KY0 + 1.4, x1 - 1.4, KY1 - 1.4, 1.6, 4);
  const at = (h) => (q) => P(q.u, KY0 + (q.v - KY0) * c - h * s, BZ + (q.v - KY0) * s + h * c);
  return {
    sil: poly(hull(foot.map(at(0)).concat(foot.map(at(KH))))),
    crease: open(run(inner, front).map(at(KH))),
  };
}

function mount({ stage, svg, read }, value) {
  const bag = disposer();
  let stag = value;

  // fitted to the console with a gauge risen and a key up, so nothing leaves the frame in any pose
  const C = Cam(45, 0.5, 1.5);
  fit(C, [[BX0, BY0, 0], [BX1, BY1, 0], [BX1, BY0, 0], [BX0, BY1, 0], [BX0, BY0, GZ + LIFT], [BX1, BY1, BZ + KH + 14]], 200, 166);
  const P = proj(C), front = facing(C);

  const g = mk("g", {}, svg);
  const [base, baseIn] = rings(BX0, BY0, BX1, BY1, 6, 1.8);
  reflect(svg, g, P, front, base, 0, 12);
  put(solid(g), prism(P, front, base, baseIn, 0, BZ));
  const [panel, panelIn] = rings(PX0, PY0, PX1, PY1, 5, 1.6);
  put(solid(g), prism(P, front, panel, panelIn, BZ, PZ));

  // gauges, left to right: they share a y, so ascending x is back to front
  const dials = [];
  for (let i = 0; i < N; i++) {
    const sd = solid(g);
    const ticks = mk("path", { class: "nf lo" }, sd.g);
    const nd = mk("path", { class: "nf sil" }, sd.g);
    const hub = mk("circle", { r: 1.3, class: "dot m" }, sd.g);
    dials.push({ s: sd, ticks, nd, hub, rings: { ring: ringAround(i, R), inner: ringAround(i, R - 2.2) }, r: tween(REST[i]), z: tween(i === LIVE ? 0 : 0), lastR: NaN, lastZ: NaN });
  }

  // keys, nearer than the panel, left to right
  const keys = [];
  for (let i = 0; i < N; i++) keys.push({ s: solid(g), t: tween(i === LIVE ? TILT : 0), last: NaN });

  function draw(now) {
    let moving = false;
    dials.forEach((d, i) => {
      const r = tval(d.r, now), z = tval(d.z, now);
      if (z !== d.lastZ) {
        const q = gauge(P, front, d.rings, i, z);
        put(d.s, q.bezel);
        d.ticks.setAttribute("d", q.ticks);
        place(d.hub, P(cx(i), CY, GZ + z));
      }
      if (r !== d.lastR || z !== d.lastZ) d.nd.setAttribute("d", needle(P, i, r, z));
      d.lastR = r; d.lastZ = z;
      if (!tdone(d.r, now) || !tdone(d.z, now)) moving = true;
    });
    keys.forEach((k, i) => {
      const th = tval(k.t, now);
      if (th !== k.last) { put(k.s, key(P, front, i, th)); k.last = th; }
      if (!tdone(k.t, now)) moving = true;
    });
    return moving;
  }
  const B = register(stage, (_dt, now) => draw(now));
  bag.add(B.unregister);
  draw(performance.now());

  // the hit test reads rest poses only: the gauge tops where they sit in the panel, then the key tops lying flat
  function hit([sx, sy]) {
    const [gx, gy] = unproj(C, sx, sy, GZ);
    if (gx >= PX0 - 4 && gx <= PX1 + 4 && gy >= CY - R - 4 && gy <= CY + R + 4) return clamp(Math.round((gx - 17) / GAP), 0, N - 1);
    const [kx, ky] = unproj(C, sx, sy, BZ + KH);
    if (kx >= PX0 - 4 && kx <= PX1 + 4 && ky >= KY0 - 3 && ky <= KY1 + 3) return clamp(Math.round((kx - 17) / GAP), 0, N - 1);
    return -1;
  }

  let act = -1;
  /** Marks one channel bright: its gauge, its needle and its key, one thing. */
  function light(a) {
    dials.forEach((d, i) => { d.s.sil.classList.toggle("hi", i === a); d.nd.classList.toggle("hi", i === a); keys[i].s.sil.classList.toggle("hi", i === a); });
  }
  light(LIVE);

  /** Chooses dial a (-1 lets them all settle). The stagger spreads from the dial chosen, or the one let go. */
  function setActive(a) {
    if (a === act) return;
    const now = performance.now(), from = a >= 0 ? a : act;
    act = a;
    dials.forEach((d, i) => {
      const delay = Math.abs(i - from) * stag, f = a < 0 ? 0 : falloff(Math.abs(i - a));
      tset(d.r, lerp(REST[i], PEAK[i], f), now, delay);
      tset(d.z, LIFT * f, now, delay);
      tset(keys[i].t, i === a || (a < 0 && i === LIVE) ? TILT : 0, now, delay);
    });
    light(a < 0 ? LIVE : a);
    read.textContent = a < 0 ? "rest" : `dial ${a + 1} · ${PEAK[a]}`;
    B.wake();
  }

  bag.add(pointer(stage, { move: (p) => setActive(hit(p)), leave: () => setActive(-1) }));
  bag.add(() => svg.replaceChildren());

  return {
    set: (v) => { stag = v; },
    destroy: bag.dispose,
  };
}

hairline({
  name: "dials",
  means: "Five gauges on a console: the one under the pointer rises, swings to its peak and lifts its key; its neighbours follow part way.",
  rules: [1, 2, 4, 5, 8],
  range: [0, 45, 90],
  tour: [[141, 110], [285, 182], [172, 179], null],
  mount,
});
