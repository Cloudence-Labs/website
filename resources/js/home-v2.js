/**
 * Home v2 "Playground" motion. Loaded only on /v2 (its own Vite entry).
 * Every animation here does one job: introduce the hero in reading order,
 * acknowledge a choice (method steps), or reveal a section as it arrives.
 * The rail controls (data-carousel) and mobile menu come from app.js.
 */
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';
import 'lenis/dist/lenis.css';
import '../css/home-v2.css';

gsap.registerPlugin(ScrollTrigger);

const root = document.getElementById('v2');
if (root) {
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));

  /* ── Smooth scroll ───────────────────────────────────────── */
  if (!reduce) {
    const lenis = new Lenis({ lerp: 0.1, smoothWheel: true, anchors: true });
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((t) => lenis.raf(t * 1000));
    gsap.ticker.lagSmoothing(0);
    const menu = $('#mobileMenu');
    if (menu) new MutationObserver(() => (menu.classList.contains('is-open') ? lenis.stop() : lenis.start()))
      .observe(menu, { attributes: true, attributeFilter: ['class'] });
  }

  /* ── Nav: solid once the page moves, tucks away while reading down ── */
  const nav = $('#v2Nav');
  if (nav) {
    ScrollTrigger.create({
      start: 0, end: 'max',
      onUpdate: (self) => {
        const y = self.scroll();
        nav.classList.toggle('is-scrolled', y > 16);
        nav.classList.toggle('is-hidden', y > 480 && self.direction === 1);
      },
    });
  }

  /* ── Hero intro: headline, then copy, then the service cards ── */
  const intro = () => {
    if (reduce) { root.classList.remove('v2-pre'); return; }
    const tl = gsap.timeline({ defaults: { ease: 'expo.out' }, onStart: () => root.classList.remove('v2-pre') });
    tl.fromTo('.v2-display .line > span', { yPercent: 105, y: 0 }, { yPercent: 0, y: 0, duration: 1.1, stagger: 0.08 }, 0.05)
      .fromTo('[data-hero-fade]', { opacity: 0, y: 14 }, { opacity: 1, y: 0, duration: 0.9, stagger: 0.08 }, 0.4)
      .fromTo('[data-hero-card]', { opacity: 0, x: 70 }, { opacity: 1, x: 0, duration: 1.1, stagger: 0.07 }, 0.25);
  };
  // Play the intro as the loader's columns lift away
  if (document.documentElement.classList.contains('is-loading')) document.addEventListener('cloudence:ready', intro, { once: true });
  else intro();

  /* ── Method: a step choice swaps the stage scene and colour ── */
  $$('[data-steps]').forEach((wrap) => {
    const tabs = $$('[data-step]', wrap), stage = $('.v2-stage', wrap), scenes = $$('[data-scene]', wrap);
    const select = (i, focus = false) => {
      tabs.forEach((t, k) => { t.classList.toggle('is-active', k === i); t.setAttribute('aria-selected', k === i ? 'true' : 'false'); t.tabIndex = k === i ? 0 : -1; });
      scenes.forEach((s, k) => s.classList.toggle('is-active', k === i));
      stage.style.background = tabs[i].dataset.tone;
      stage.setAttribute('aria-labelledby', tabs[i].id);
      if (focus) tabs[i].focus();
    };
    tabs.forEach((t, i) => {
      t.addEventListener('click', () => select(i));
      t.addEventListener('keydown', (e) => {
        const d = { ArrowDown: 1, ArrowRight: 1, ArrowUp: -1, ArrowLeft: -1 }[e.key];
        if (d) { e.preventDefault(); select((i + d + tabs.length) % tabs.length, true); }
      });
    });
    select(0);
  });

  if (!reduce) {
    /* Sections rise in as they arrive */
    ScrollTrigger.batch('[data-rise]', {
      start: 'top 88%', once: true,
      onEnter: (els) => gsap.fromTo(els, { opacity: 0, y: 36 }, { opacity: 1, y: 0, duration: 1, ease: 'expo.out', stagger: 0.08 }),
    });
    gsap.set('[data-rise]', { opacity: 0 });

    ScrollTrigger.batch('[data-work-card]', {
      start: 'top 90%', once: true,
      onEnter: (els) => gsap.fromTo(els, { opacity: 0, y: 44 }, { opacity: 1, y: 0, duration: 1.05, ease: 'expo.out', stagger: 0.08 }),
    });
    gsap.set('[data-work-card]', { opacity: 0 });

    /* Company stack assembles from the ground up */
    const build = $('[data-stack-build]');
    if (build) {
      const layers = $$('[data-layer]', build).reverse();
      gsap.fromTo(layers, { opacity: 0, y: 28 }, {
        opacity: 1, y: 0, duration: 0.9, ease: 'expo.out', stagger: 0.1,
        scrollTrigger: { trigger: build, start: 'top 75%', once: true },
      });
    }

    /* Sector chips rise in one after another */
    gsap.fromTo('[data-chip]', { opacity: 0, y: 16 }, {
      opacity: 1, y: 0, duration: 0.8, ease: 'expo.out', stagger: 0.05, clearProps: 'transform',
      scrollTrigger: { trigger: '#v2-sectors', start: 'top 75%', once: true },
    });

  }

  /* ── Lead form opens WhatsApp with the email attached ───── */
  $$('[data-lead-form]').forEach((form) => form.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = $('input[name=email]', form)?.value.trim();
    if (!email) return;
    const text = `Hello Cloudence, please reach me on ${email}. I'd like to talk about a project.`;
    window.open(`${form.dataset.wa}?text=${encodeURIComponent(text)}`, '_blank', 'noopener');
  }));

  window.addEventListener('load', () => ScrollTrigger.refresh());
}
