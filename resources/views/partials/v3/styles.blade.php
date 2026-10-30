{{--
  Rebrand tokens (Stitch "cloudence rebranded"). One accent: the logo blue,
  used where the reference used amber. Everything else is black, white and grey.
  Layout is Tailwind utilities in the views; only what utilities can't say lives here.
--}}
<style>
  /* Same layer order as app.css; these sit in "components" so Tailwind utilities can override them. */
  @layer properties, theme, base, components, utilities;
  @layer components {
  .v3-body {
    --blue: #3d86f6;
    --blue-hover: #2c74e6;
    --blue-soft: #e8f1fe;
    --ink: #0e0e10;
    --color-accent: var(--blue);
    --bg: #ffffff;
    --fg: var(--ink);
    background: #fff;
    color: var(--ink);
    font-family: 'Satoshi', ui-sans-serif, system-ui, sans-serif;
    -webkit-font-smoothing: antialiased;
  }
  .v3-body ::selection { background: var(--blue); color: #fff; }
  .v3-body :focus-visible { outline: 2px solid var(--blue); outline-offset: 3px; }
  /* Content column: 70% of the screen on desktop. The service strip is the only full-bleed band. */
  .v3-wrap { width: 100%; margin-inline: auto; padding-inline: 24px; }
  @media (min-width: 1024px) { .v3-wrap { width: 70%; padding-inline: 0; } }

  /* ── Shared pieces for every v3 page. Square corners, black/white/grey, one blue. ── */
  .v3-section { padding-block: 80px; }
  @media (min-width: 1024px) { .v3-section { padding-block: 112px; } }
  .v3-rule { border-top: 1px solid #f0f0f2; }
  .v3-eyebrow { display: inline-block; font-size: 12px; font-weight: 500; letter-spacing: .08em; text-transform: uppercase; color: #6b6c72; }
  .v3-hero .v3-eyebrow { color: var(--blue); }
  .v3-h1 { font-weight: 900; font-size: clamp(2.8rem, 6vw, 5.4rem); line-height: 1.03; letter-spacing: -0.035em; }
  .v3-h2 { font-weight: 900; font-size: clamp(2.1rem, 3.6vw, 3.25rem); line-height: 1.06; letter-spacing: -0.03em; }
  .v3-h3 { font-weight: 700; font-size: 1.25rem; line-height: 1.3; letter-spacing: -0.01em; }
  .v3-lead { font-size: 1.125rem; line-height: 1.7; color: #6b6c72; }
  .v3-muted { color: #6b6c72; }
  .v3-accent { color: inherit; }
  .v3-hero .v3-accent { color: var(--blue); }   /* blue text lives in hero sections only */

  .v3-btn { display: inline-flex; align-items: center; gap: .5rem; padding: .9rem 1.5rem; font-size: .875rem; font-weight: 500; line-height: 1.2; transition: background-color .2s, border-color .2s, color .2s; }
  .v3-btn svg, .v3-btn .material-symbols-outlined { transition: transform .25s cubic-bezier(.16,1,.3,1); }
  .v3-btn:hover svg { transform: translate(2px, -2px); }
  .v3-btn-dark { background: var(--ink); color: #fff; }
  .v3-btn-dark:hover { background: #2a2a2e; }
  .v3-btn-blue { background: var(--blue); color: #fff; }
  .v3-btn-blue:hover { background: var(--blue-hover); }
  .v3-btn-line { border: 1px solid #e4e4e7; color: var(--ink); }
  .v3-btn-line:hover { border-color: var(--ink); }

  .v3-card { border: 1px solid #f0f0f2; background: #fff; transition: border-color .25s; }
  a.v3-card:hover, .v3-card.is-link:hover { border-color: var(--ink); }
  .v3-icon { display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; flex-shrink: 0; background: var(--blue-soft); color: var(--blue); }
  .v3-icon .material-symbols-outlined { font-size: 22px; }
  .v3-num { font-weight: 900; letter-spacing: -0.03em; }
  .v3-photo { filter: grayscale(1); transition: filter .6s ease, transform .6s ease; }
  .group:hover .v3-photo, .v3-photo.is-colour { filter: none; }

  /* Form fields */
  .v3-field { width: 100%; border: 1px solid #e4e4e7; background: #fff; padding: .85rem 1rem; font-size: .95rem; color: var(--ink); transition: border-color .2s; }
  .v3-field:focus { outline: none; border-color: var(--blue); }
  .v3-label { display: block; margin-bottom: .5rem; font-size: .8rem; font-weight: 500; color: #3a3b40; }


  /* Service strip: the active tile widens and takes its colour back */
  .v3-tile { flex: 0 0 auto; width: 200px; transition: width .6s cubic-bezier(.16,1,.3,1); }
  .v3-tile img { filter: grayscale(1) brightness(.95); transition: filter .6s ease, transform .6s ease; }
  .v3-tile .v3-tag { transform: translateY(100%); transition: transform .45s cubic-bezier(.16,1,.3,1); }
  .v3-tile.is-active { width: 320px; }
  .v3-tile.is-active img { filter: none; }
  .v3-tile.is-active .v3-tag { transform: none; }
  .v3-tile:hover img { transform: scale(1.04); }
  @media (min-width: 1280px) {
    .v3-strip { display: flex; }
    .v3-tile { width: auto; flex: 1 1 0; min-width: 0; }
    .v3-tile.is-active { flex-grow: 1.7; }
  }

  /* Article body */
  .v3-prose p { margin-top: 1.25em; line-height: 1.75; color: #3a3b40; }
  .v3-prose strong { color: var(--ink); font-weight: 700; }
  .v3-prose a { color: var(--blue); text-decoration: underline; text-underline-offset: 3px; }
  .v3-prose h2 { margin-top: 2em; font-size: 1.5rem; font-weight: 700; letter-spacing: -0.02em; }
  .v3-prose ul { margin-top: 1.25em; padding-left: 1.2em; list-style: disc; }
  .v3-prose li { margin-top: .4em; line-height: 1.7; color: #3a3b40; }

  /* Header dropdowns: opened by app.js adding .is-open */
  .v3-drop {
    position: absolute; top: 100%; left: 50%; z-index: 60;
    padding: 12px; background: #fff; border: 1px solid #f0f0f2; box-shadow: 0 24px 48px -16px rgba(14,14,16,.18);
    opacity: 0; visibility: hidden; transform: translate(-50%, 8px);
    transition: opacity .2s ease, transform .3s cubic-bezier(.16,1,.3,1), visibility 0s linear .3s;
  }
  .v3-drop.is-open { opacity: 1; visibility: visible; transform: translate(-50%, 0); transition-delay: 0s; }
  .v3-chev { transition: transform .25s ease; }
  [aria-expanded="true"] > .v3-chev { transform: rotate(180deg); }

  @media (prefers-reduced-motion: reduce) {
    .v3-tile, .v3-tile img, .v3-tile .v3-tag { transition: none; }
  }
  }
</style>
