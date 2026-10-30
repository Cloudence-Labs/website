# Cloudence design system — "Paper & Ember" (2026 redesign)

Read this before editing any Blade view. The home page (`resources/views/pages/home.blade.php`)
is the reference implementation; the layout, header, footer and `partials/cta.blade.php` are shared.

## Stack
- Laravel Blade + Vite + Tailwind CSS 4. Tokens and component classes live in `resources/css/app.css`.
  No Tailwind CDN, no inline `<style>` blocks unless truly page-specific (use `@push('styles')`).
- Behaviours in `resources/js/app.js` (reveal, counters, tabs, carousels, brief form, glass, 3D hero, liquid wordmark).
  Page-specific JS goes in `@push('scripts')` and must be small and vanilla.
- Icons: Material Symbols Outlined via `<span class="material-symbols-outlined text-[20px]">icon_name</span>`.
  Icon names come from the config files.

## Palette (light)
The site is light. Semantic colours come from CSS variables; `.band` gives an ivory section for rhythm.
`.theme-dark` exists but is not used on pages (the client asked for no dark theme).

| Token (Tailwind) | Value | Use |
|---|---|---|
| `bg-bg` | #fbfaf7 warm off-white | page background |
| `bg-bg-2` | #ffffff | cards, frames, inputs |
| `bg-bg-3` / `.band` | #f1efe8 ivory | quieter section bands |
| `text-fg` | #111111 | headings, primary text |
| `text-fg-2` | #5a5b60 | body copy |
| `text-fg-3` | #8a8b92 | eyebrows, meta |
| `border-line` / `border-line-2` | 10% / 22% ink | hairlines |
| `text-accent` / `bg-accent` | #f08033 | brand orange, sparingly |

Rhythm: white sections separated by `border-t border-line`; one or two `.band` sections per page.

## Type
- `.display` hero headline (clamp 2.75–6.25rem), `.display-sm` section heroes, `.h2` section titles, `.h3` card titles, `.lead` intro copy.
- Accent word inside a heading: `<span class="accent-word">that lasts.</span>` (Satoshi italic, orange).
  Use `.serif-it` for the italic without the colour. The whole site is Satoshi (italics self-hosted in public/fonts/satoshi); /v2 adds Kumbh Sans for its hero subtext only.
- Eyebrow above a heading: `<span class="eyebrow eyebrow-rule text-fg-3">Label</span>` then `<h2 class="h2 mt-7">`.
- Headline word-by-word rise: add `reveal-words` to the heading (only for h1/h2, not body).

## Layout
- `.wrap` (1280px) for everything; `.wrap-wide` (1480px) for full-bleed stages.
- `.section` (py-24 / lg:py-36) and `.section-tight` (py-16 / lg:py-24).
- Page hero (inner pages): `pt-40 lg:pt-52` so it clears the floating header, eyebrow + `.display-sm` + `.lead`, optional glow:
  `<div class="glow-orb -top-40 right-[-10%] h-[32rem] w-[32rem]"></div>` inside a `relative overflow-hidden` section.
- 12-column grids: `grid lg:grid-cols-12 gap-10`; copy in `lg:col-span-5`, content in `lg:col-span-7`.

## Components
- Buttons: `.btn .btn-primary` (ink, the default CTA), `.btn .btn-accent` (orange gradient, for the single strongest CTA on a page), `.btn .btn-ghost` (outline), `.btn-sm`.
  Arrow: `<span class="material-symbols-outlined arrow text-[18px]">arrow_forward</span>` inside the button.
- Text links: `<a class="link"><span class="link-underline">Label</span><span class="material-symbols-outlined text-[18px] text-fg-3">arrow_forward</span></a>`.
- Cards: `.card` (+ `.card-hover` lift, + `.card-glow` mouse-follow orange rim). Padding `p-7 lg:p-8`.
- Glass: `.glass` (frosted white). Keep for the header, floating elements and "door" rows over imagery; not on every card.
- Ticker: `.marquee-track` with `.ticker-word` spans alternating `font-bold` and `serif-it` (see home).
- Sticky explainer: `[data-stack]` layer list + `[data-chapter]` articles (home "stack" section) — reuse for any step-by-step story.
- Fill-in-the-blanks form: `[data-madlib]` with `.madlib-field` inputs/selects (home contact).
- Icon tile: `<span class="icon-tile"><span class="material-symbols-outlined text-[21px]">icon</span></span>`.
- Pills: `<span class="pill">Laravel</span>`.
- Numbered rows for lists of services/industries: `.row-link` (grid: number, title, blurb, arrow).
- Product screenshot frame: `.frame` > `.frame-bar` (three `<i>` dots + `.frame-url`) + `<img>`.
- Forms: `.field` on inputs/selects/textareas, `.field-error` when invalid, `.select-wrap` around selects.
- Stat: `<div class="text-[clamp(2.6rem,5vw,4rem)] font-bold leading-none tracking-tightest"><span class="counter" data-target="40">0</span>+</div>` + `<div class="mt-3 text-[13.5px] text-fg-2">label</div>`.
- Closing CTA: `@include('partials.cta')` as the last section of every inner page.

## Motion
- Add `.reveal` to blocks that should rise in; stagger siblings with `style="--d:.08s"`.
- Keep hover transitions 300–500ms using `transition-all duration-500`.
- Everything respects `prefers-reduced-motion` already through the stylesheet.

## Content rules
- All copy, labels and icons come from `config/site.php`, `config/services.php`, `config/service-details.php`,
  `config/industries.php`, `config/products.php`. Never invent client names, figures or quotes;
  placeholder content must stay marked as placeholder in a Blade comment.
- Keep every `@section('title')`, `@section('description')`, `Seo::` helper call and form field name from the
  previous version of a page. Preserve `@csrf`, honeypot and `old()` / `@error` handling on the contact form.
- Do not link to routes that do not exist. Valid routes: `/`, `/about`, `/services`, `/services/{slug}`,
  `/industries`, `/industries/{slug}`, `/products`, `/products/{slug}`, `/contact`.
- Product screenshots show demo data only.
