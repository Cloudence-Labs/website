<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@php
  $seoTitle       = trim($__env->yieldContent('title', config('site.name') . ' — ICT solutions for business and government'));
  $seoDescription = trim($__env->yieldContent('description', 'Cloudence builds enterprise software, networks and ICT infrastructure for businesses and government institutions across Nigeria. Offices in Abuja and Calabar.'));
  $seoImage       = trim($__env->yieldContent('og_image', asset('images/og-default.png')));
  $seoCanonical   = trim($__env->yieldContent('canonical', url()->current()));
  $seoRobots      = trim($__env->yieldContent('robots', 'index, follow, max-image-preview:large'));
@endphp
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="{{ $seoRobots }}">
<link rel="canonical" href="{{ $seoCanonical }}">
<meta name="theme-color" content="#FAFAF8">
<meta name="author" content="{{ config('site.legal') }}">

<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ config('site.name') }}">
<meta property="og:locale" content="en_NG">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ config('site.name') }} — {{ config('site.tagline') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

<link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
<link rel="icon" href="{{ asset('favicon-32.png') }}" sizes="32x32" type="image/png">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">

{!! \App\Support\Seo::jsonLd(\App\Support\Seo::organization()) !!}
{!! \App\Support\Seo::jsonLd(\App\Support\Seo::website()) !!}
@stack('head')

<link rel="stylesheet" href="{{ asset('fonts/satoshi/satoshi.css') }}">
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Outfit:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<script>document.documentElement.classList.add('is-loading');</script>
<style>
  /* ── Page loader ── plain CSS so it renders before Tailwind arrives */
  html.is-loading { overflow: hidden; }
  #pageLoader {
    position: fixed; inset: 0; z-index: 100; display: flex; align-items: center; justify-content: center;
    background: #FAFAF8; color: #141414;
    transition: transform .85s cubic-bezier(.76, 0, .24, 1), visibility 0s linear .85s;
  }
  #pageLoader::before {
    content: ''; position: absolute; inset: 0; pointer-events: none;
    background-image: radial-gradient(#141414 0.5px, transparent 0.5px); background-size: 22px 22px; opacity: .035;
  }
  #pageLoader.is-done { transform: translateY(-100%); visibility: hidden; }
  #pageLoader .pl-inner { position: relative; display: flex; flex-direction: column; align-items: center; transition: opacity .3s ease, transform .3s ease; }
  #pageLoader.is-done .pl-inner { opacity: 0; transform: translateY(-10px); }
  #pageLoader .pl-mark { width: 168px; clip-path: inset(0 100% 0 0); animation: pl-wipe .9s cubic-bezier(.16, 1, .3, 1) .1s forwards; }
  #pageLoader .pl-mark img { display: block; width: 100%; height: auto; }
  #pageLoader .pl-line { position: relative; width: 168px; height: 1px; background: #E6E4DF; margin-top: 26px; overflow: hidden; }
  #pageLoader .pl-line span {
    position: absolute; left: 0; top: 0; height: 100%; width: 0; background: #F08033;
    animation: pl-fill 1.6s cubic-bezier(.22, 1, .36, 1) .2s forwards; transition: width .25s ease;
  }
  #pageLoader .pl-label {
    margin-top: 16px; font-family: 'Satoshi', ui-sans-serif, system-ui, sans-serif; font-size: 10.5px; font-weight: 700;
    letter-spacing: .2em; text-transform: uppercase; color: #5F6168; opacity: 0; animation: pl-fade .6s ease .5s forwards;
  }
  @keyframes pl-wipe { to { clip-path: inset(0 0 0 0); } }
  @keyframes pl-fill { to { width: 72%; } }
  @keyframes pl-fade { to { opacity: 1; } }
  @media (prefers-reduced-motion: reduce) {
    #pageLoader { transition: none; }
    #pageLoader .pl-mark, #pageLoader .pl-line span, #pageLoader .pl-label { animation: none; clip-path: none; width: 100%; opacity: 1; }
  }
</style>
<noscript><style>#pageLoader { display: none; } html.is-loading { overflow: auto; }</style></noscript>
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ivory: '#FAFAF8',
          paper: '#FFFFFF',
          ink: '#141414',
          graphite: '#5F6168',
          mist: '#E6E4DF',
          accent: '#F08033',
          ember: '#D9641C',
        },
        fontFamily: {
          sans: ['Satoshi', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          serif: ['"Instrument Serif"', 'Georgia', 'serif'],
        },
        letterSpacing: { tightest: '-0.045em' },
      },
    },
  }
</script>
<style>
  body { font-family: 'Satoshi', sans-serif; background: #FAFAF8; color: #141414; -webkit-font-smoothing: antialiased; }
  html, body { overflow-x: clip; }
  .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; display: inline-block; line-height: 1; }
  .serif-it { font-family: 'Instrument Serif', Georgia, serif; font-style: italic; font-weight: 400; letter-spacing: -0.01em; }
  .eyebrow { font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; font-weight: 700; }
  .rule { height: 1px; background: #E6E4DF; }
  .grain::before {
    content: ''; position: absolute; inset: 0; pointer-events: none;
    background-image: radial-gradient(#141414 0.5px, transparent 0.5px);
    background-size: 22px 22px; opacity: .035;
  }
  .reveal { opacity: 0; transform: translateY(18px); transition: opacity .9s cubic-bezier(.16,1,.3,1), transform .9s cubic-bezier(.16,1,.3,1); }
  .reveal.in { opacity: 1; transform: none; }
  .reveal.reveal-fade { transform: none; }
  .link-underline { background-image: linear-gradient(currentColor, currentColor); background-size: 0% 1px; background-repeat: no-repeat; background-position: 0 100%; transition: background-size .4s cubic-bezier(.16,1,.3,1); }
  .link-underline:hover { background-size: 100% 1px; }
  .marquee { animation: slide 34s linear infinite; }
  .marquee:hover { animation-play-state: paused; }
  @keyframes slide { from { transform: translateX(0); } to { transform: translateX(-50%); } }
  .edge-fade {
    -webkit-mask-image: linear-gradient(to right, transparent, #000 7%, #000 93%, transparent);
    mask-image: linear-gradient(to right, transparent, #000 7%, #000 93%, transparent);
  }
  .no-scrollbar::-webkit-scrollbar { display: none; }
  .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  @media (prefers-reduced-motion: reduce) { .reveal { opacity: 1; transform: none; transition: none; } .marquee { animation: none; } }
</style>
@stack('styles')
</head>
<body class="bg-ivory text-ink antialiased selection:bg-ink selection:text-ivory">

<!-- Page loader -->
<div id="pageLoader" aria-hidden="true">
  <div class="pl-inner">
    <div class="pl-mark"><img src="{{ asset('images/main/logo.png') }}" alt="" width="2115" height="401" decoding="async"></div>
    <div class="pl-line"><span></span></div>
    <div class="pl-label">Loading</div>
  </div>
</div>

@include('partials.header')

<main id="top">
  @yield('content')
</main>

@include('partials.footer')

<!-- Floating WhatsApp -->
<a href="{{ config('site.whatsapp') }}" target="_blank" rel="noopener" aria-label="Message {{ config('site.name') }} on WhatsApp"
   class="fixed bottom-6 right-6 z-40 p-3.5 rounded-full bg-[#25D366] text-white shadow-[0_18px_40px_-12px_rgba(37,211,102,.7)] hover:scale-105 active:scale-95 transition-transform">
  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
</a>

<script>
  // Header: condense on scroll
  (function () {
    var header = document.getElementById('siteHeader'), bar = document.getElementById('headerBar');
    if (!header) return;
    function onScroll() {
      if (window.scrollY > 24) {
        header.classList.add('bg-ivory/85', 'backdrop-blur-xl', 'border-b', 'border-mist');
        bar.classList.replace('py-5', 'py-3.5');
      } else {
        header.classList.remove('bg-ivory/85', 'backdrop-blur-xl', 'border-b', 'border-mist');
        bar.classList.replace('py-3.5', 'py-5');
      }
    }
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  })();

  // Mobile menu
  (function () {
    var menu = document.getElementById('mobileMenu');
    if (!menu) return;
    function open() { menu.classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
    function close() { menu.classList.add('hidden'); document.body.style.overflow = ''; }
    document.getElementById('menuBtn').addEventListener('click', open);
    document.getElementById('menuClose').addEventListener('click', close);
    document.querySelectorAll('.mobile-link').forEach(function (a) { a.addEventListener('click', close); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });

    // Expandable sub-menus (e.g. Services)
    document.querySelectorAll('[data-sub-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var panel = document.getElementById(btn.getAttribute('aria-controls'));
        var isOpen = !panel.classList.toggle('hidden');
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        btn.firstElementChild.style.transform = isOpen ? 'rotate(180deg)' : '';
      });
    });
  })();

  // Stat counters
  (function () {
    var counters = document.querySelectorAll('.counter');
    if (!counters.length) return;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function run(el) {
      var target = parseInt(el.getAttribute('data-target'), 10) || 0;
      if (reduce || !('requestAnimationFrame' in window)) { el.textContent = target; return; }
      var start = null, duration = 1400;
      function step(now) {
        if (!start) start = now;
        var p = Math.min((now - start) / duration, 1);
        el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));
        if (p < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    }

    if (!('IntersectionObserver' in window)) { counters.forEach(run); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) { run(entry.target); io.unobserve(entry.target); }
      });
    }, { threshold: 0.5 });
    counters.forEach(function (el) { io.observe(el); });
  })();

  // Page loader: hold for a beat, complete the line, then lift the curtain
  (function () {
    var loader = document.getElementById('pageLoader'), html = document.documentElement;
    if (!loader) { html.classList.remove('is-loading'); return; }
    var bar = loader.querySelector('.pl-line span');
    var started = performance.now(), MIN = 750, MAX = 4000, done = false;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function finish() {
      if (done) return; done = true;
      if (bar) bar.style.width = '100%';
      setTimeout(function () {
        loader.classList.add('is-done');
        html.classList.remove('is-loading');
        document.dispatchEvent(new CustomEvent('cloudence:ready'));
        var cleanup = function () { if (loader.parentNode) loader.parentNode.removeChild(loader); };
        loader.addEventListener('transitionend', cleanup, { once: true });
        setTimeout(cleanup, 1200);
      }, reduce ? 0 : 200);
    }
    function onLoad() { setTimeout(finish, reduce ? 0 : Math.max(0, MIN - (performance.now() - started))); }

    if (document.readyState === 'complete') onLoad(); else window.addEventListener('load', onLoad);
    setTimeout(finish, MAX);                                     // never trap the visitor
    window.addEventListener('pageshow', function (e) { if (e.persisted) finish(); }); // back/forward cache
  })();

  // Scroll reveal (starts once the loader has lifted)
  (function () {
    var items = document.querySelectorAll('.reveal');
    function start() {
      if (!('IntersectionObserver' in window)) { items.forEach(function (el) { el.classList.add('in'); }); return; }
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) { entry.target.classList.add('in'); io.unobserve(entry.target); }
        });
      }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
      items.forEach(function (el) { io.observe(el); });
    }
    if (document.documentElement.classList.contains('is-loading')) {
      document.addEventListener('cloudence:ready', start, { once: true });
    } else {
      start();
    }
  })();
</script>
@stack('scripts')
</body>
</html>
