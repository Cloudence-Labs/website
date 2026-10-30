<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
@php
  // Sections arrive already HTML-escaped; decode once so the {{ }} below escapes exactly once.
  $seoTitle       = html_entity_decode(trim($__env->yieldContent('title', config('site.name') . ' — ICT solutions for business and government')), ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $seoDescription = html_entity_decode(trim($__env->yieldContent('description', 'Cloudence builds enterprise software, networks and ICT infrastructure for businesses and government institutions across Nigeria. Offices in Abuja and Calabar.')), ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $seoImage       = trim($__env->yieldContent('og_image', asset('images/og-default.png')));
  $seoCanonical   = trim($__env->yieldContent('canonical', url()->current()));
  $seoRobots      = trim($__env->yieldContent('robots', 'index, follow, max-image-preview:large'));
  $seoType        = trim($__env->yieldContent('og_type', 'website'));
  $seoImageAlt    = html_entity_decode(trim($__env->yieldContent('og_image_alt', config('site.name') . ' — ' . config('site.tagline'))), ENT_QUOTES | ENT_HTML5, 'UTF-8');
  // The default card is drawn at 1200x630; page images have their own sizes, so only state them for the default.
  $seoImageIsDefault = $seoImage === asset('images/og-default.png');
@endphp
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="{{ $seoRobots }}">
<link rel="canonical" href="{{ $seoCanonical }}">
<meta name="theme-color" content="#ffffff">
<meta name="author" content="{{ config('site.legal') }}">

<meta property="og:type" content="{{ $seoType }}">
<meta property="og:site_name" content="{{ config('site.name') }}">
<meta property="og:locale" content="en_NG">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $seoImage }}">
@if ($seoImageIsDefault)
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endif
<meta property="og:image:alt" content="{{ $seoImageAlt }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
<meta name="twitter:image:alt" content="{{ $seoImageAlt }}">

<link rel="icon" href="{{ asset('favicon-32.png') }}" sizes="32x32" type="image/png">
<link rel="icon" href="{{ asset('icon-192.png') }}" sizes="192x192" type="image/png">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">

{!! \App\Support\Seo::jsonLd(\App\Support\Seo::organization()) !!}
{!! \App\Support\Seo::jsonLd(\App\Support\Seo::website()) !!}
@stack('head')

<link rel="preload" href="{{ asset('fonts/satoshi/satoshi-700.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('fonts/satoshi/satoshi-400.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="{{ asset('fonts/satoshi/satoshi.css') }}">
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
{{-- Pages that bring their own chrome (@section('bare')) skip the shared header and footer; every page gets the loader --}}
<script>document.documentElement.classList.add('is-loading');</script>
<style>
  /* Page loader, inline so it paints before the stylesheets arrive. No logo:
     four blocks pulse in turn, a counter runs to 100, then four columns lift away. */
  html.is-loading { overflow: hidden; }
  #pageLoader { position: fixed; inset: 0; z-index: 100; --pl-bg: #fbfaf7; --pl-ink: #111111; --pl-1: #111111; --pl-2: #5f6168; --pl-3: #9a9aa3; --pl-4: #f08033; }
  .v2-body #pageLoader { --pl-bg: #ffffff; --pl-ink: #141416; --pl-1: #6f80f4; --pl-2: #f38aa8; --pl-3: #f5e36b; --pl-4: #5fc48e; }
  .v3-body #pageLoader { --pl-bg: #ffffff; --pl-ink: #0e0e10; --pl-1: #0e0e10; --pl-2: #3d86f6; --pl-3: #9cc3fb; --pl-4: #d6e6fd; }
  #pageLoader .pl-cols { position: absolute; inset: 0; display: grid; grid-template-columns: repeat(4, 1fr); }
  #pageLoader .pl-cols i { background: var(--pl-bg); margin-right: -1px; transition: transform 0.9s cubic-bezier(0.76, 0, 0.24, 1) calc(var(--i) * 70ms); }
  #pageLoader .pl-core { position: absolute; inset: 0; display: grid; place-items: center; transition: opacity 0.35s ease, transform 0.6s cubic-bezier(0.76, 0, 0.24, 1); }
  #pageLoader .pl-dots { display: flex; gap: 10px; }
  #pageLoader .pl-dots i { width: 14px; height: 14px; border-radius: 4px; background: var(--c); opacity: 0.25; animation: pl-pulse 1.4s ease-in-out calc(var(--i) * 0.18s) infinite; }
  #pageLoader .pl-count { position: absolute; left: clamp(20px, 4vw, 48px); bottom: clamp(14px, 3vw, 32px); color: var(--pl-ink); font: 700 clamp(3.5rem, 9vw, 8rem)/0.9 Satoshi, ui-sans-serif, system-ui, sans-serif; letter-spacing: -0.05em; font-variant-numeric: tabular-nums; }
  #pageLoader .pl-count small { font-size: 0.32em; vertical-align: top; margin-left: 0.1em; opacity: 0.45; letter-spacing: 0; }
  #pageLoader.is-done { pointer-events: none; }
  #pageLoader.is-done .pl-core { opacity: 0; transform: translateY(-24px); }
  #pageLoader.is-done .pl-cols i { transform: translateY(-101%); }
  @keyframes pl-pulse { 0%, 100% { opacity: 0.25; transform: scale(0.85); } 35% { opacity: 1; transform: scale(1); } }
  @media (prefers-reduced-motion: reduce) {
    #pageLoader .pl-dots i { animation: none; opacity: 1; }
    #pageLoader, #pageLoader .pl-cols i, #pageLoader .pl-core { transition: opacity 0.3s ease; }
    #pageLoader.is-done { opacity: 0; }
    #pageLoader.is-done .pl-cols i, #pageLoader.is-done .pl-core { transform: none; }
  }
</style>
<noscript><style>#pageLoader { display: none; } html.is-loading { overflow: auto; }</style></noscript>
@viteReactRefresh
@vite(['resources/css/app.css', 'resources/js/app.js'])
@stack('styles')
</head>
<body class="min-h-screen @yield('body_class')">

<div id="pageLoader" aria-hidden="true">
  <div class="pl-cols">@for ($i = 0; $i < 4; $i++)<i style="--i: {{ $i }}"></i>@endfor</div>
  <div class="pl-core">
    <div class="pl-dots">@for ($i = 0; $i < 4; $i++)<i style="--i: {{ $i }}; --c: var(--pl-{{ $i + 1 }})"></i>@endfor</div>
    <div class="pl-count"><b>0</b><small>%</small></div>
  </div>
</div>

@sectionMissing('bare')
@include('partials.header')
@endif

<main id="top">
  @yield('content')
</main>

@sectionMissing('bare')
@include('partials.footer')
@endif

<a href="{{ config('site.whatsapp') }}" target="_blank" rel="noopener" aria-label="Message {{ config('site.name') }} on WhatsApp"
   class="glass fixed bottom-5 right-5 z-40 flex h-13 w-13 items-center justify-center rounded-full text-[#25D366] transition-transform hover:scale-105 active:scale-95 sm:bottom-7 sm:right-7">
  <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
</a>

@stack('scripts')
</body>
</html>
