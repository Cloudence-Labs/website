@extends('layouts.v3')

@section('title', $industry['label'] . ' — Industries — Cloudence')
@section('description', $industry['description'])

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Industries', '/industries'], [$industry['label'], '/industries/' . $slug]]) !!}
  {!! \App\Support\Seo::page('WebPage', $industry['label'] . ' ICT solutions', '/industries/' . $slug, $industry['description']) !!}
  {!! \App\Support\Seo::faq($industry['faqs']) !!}
@endpush

@php
  $all            = config('industries');
  $services       = collect(config('site.services'))->keyBy('slug');
  $others         = array_filter($all, fn ($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);
  $n              = sprintf('%02d', array_search($slug, array_keys($all)) + 1);
  $sectorProducts = array_filter(config('products', []), fn ($p) => ($p['industry'] ?? null) === $slug);
  $sectorServices = array_values(array_filter(array_map(fn ($s) => $services[$s] ?? null, $industry['services'])));
  $waAsk          = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to talk about ICT solutions for " . strtolower($industry['label']) . ".");
  $arrow          = '<svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
  $textLink       = 'inline-flex items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500';
@endphp

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-16 pt-14 lg:pb-24 lg:pt-24">
  <nav aria-label="Breadcrumb" class="reveal flex flex-wrap items-center gap-2 text-xs font-medium uppercase tracking-wider text-neutral-400">
    <a href="{{ url('/industries') }}" class="text-[var(--blue)] hover:text-[var(--ink)]">Industries</a>
    <span aria-hidden="true">/</span>
    <span>Industry {{ $n }}</span>
  </nav>
  <div class="reveal mt-8 flex items-center gap-4" style="--d:.05s">
    <span class="v3-icon !h-12 !w-12 !bg-[var(--blue)] !text-white"><span class="material-symbols-outlined">{{ $industry['icon'] }}</span></span>
    <span class="text-[15px] font-medium text-neutral-600">{{ $industry['label'] }}</span>
  </div>
  <h1 class="v3-h1 reveal mt-6 max-w-5xl" style="--d:.1s">{{ $industry['heading'] }} <span class="v3-accent">{{ $industry['accent'] }}</span></h1>
  <p class="v3-lead reveal mt-8 max-w-2xl" style="--d:.15s">{{ $industry['lead'] }}</p>
  <div class="reveal mt-10 flex flex-wrap gap-3" style="--d:.2s">
    <a href="{{ $waAsk }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">Talk to us about your sector {!! $arrow !!}</a>
    <a href="{{ url('/contact') }}" class="v3-btn v3-btn-line">Contact us</a>
  </div>
</section>

{{-- ── Challenges ───────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">What's different here</p>
        <h2 class="v3-h2 mt-3">The constraints we design around.</h2>
      </div>
      <ol class="border-t border-neutral-200 lg:col-span-7">
        @foreach ($industry['challenges'] as $i => $c)
          <li class="reveal flex items-start gap-5 border-b border-neutral-100 py-7" style="--d:{{ $i * 0.06 }}s">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $c[0] }}</span></span>
            <div class="min-w-0">
              <h3 class="text-lg font-bold leading-tight tracking-tight">{{ $c[1] }}</h3>
              <p class="mt-2 text-[15px] leading-relaxed text-neutral-500">{{ $c[2] }}</p>
            </div>
          </li>
        @endforeach
      </ol>
    </div>
  </div>
</section>

{{-- ── Solutions ────────────────────────────────────────── --}}
<section id="solutions" class="v3-rule scroll-mt-24">
  <div class="v3-wrap v3-section">
    <div class="reveal flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">What we build for {{ strtolower($industry['short']) }}</p>
        <h2 class="v3-h2 mt-3">Systems and apps we provide, or can.</h2>
      </div>
      <p class="max-w-sm text-[15px] leading-relaxed text-neutral-500">
        Some of these are live with clients today. Others we have the team and the track record
        to build. Each links to the service line behind it.
      </p>
    </div>

    <div class="mt-12 grid gap-px border border-neutral-100 bg-neutral-100 md:grid-cols-2 lg:mt-16">
      @foreach ($industry['solutions'] as $i => $sol)
        @php $svc = $services[$sol[3]] ?? null; @endphp
        <div class="reveal group flex items-start gap-5 bg-white p-7 lg:p-8" style="--d:{{ ($i % 2) * 0.06 }}s">
          <span class="v3-icon transition-colors group-hover:!bg-[var(--blue)] group-hover:!text-white"><span class="material-symbols-outlined">{{ $sol[0] }}</span></span>
          <div class="min-w-0 flex-1">
            <h3 class="text-lg font-bold leading-snug tracking-tight">{{ $sol[1] }}</h3>
            <p class="mt-2 text-[15px] leading-relaxed text-neutral-500">{{ $sol[2] }}</p>
            @if ($svc)
              <a href="{{ url('/services/' . $svc['slug']) }}" class="mt-5 inline-flex items-center gap-2 text-[13px] font-medium text-neutral-600 hover:text-neutral-500">
                <span class="material-symbols-outlined text-[16px] text-neutral-400">{{ $svc['icon'] }}</span>
                {{ $svc['short'] }} {!! $arrow !!}
              </a>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── Ready-made products ──────────────────────────────── --}}
@if ($sectorProducts)
  <section class="v3-rule">
    <div class="v3-wrap v3-section">
      <div class="reveal flex flex-wrap items-end justify-between gap-6">
        <div class="max-w-2xl">
          <p class="v3-eyebrow">Ready-made for {{ strtolower($industry['short']) }}</p>
          <h2 class="v3-h2 mt-3">Products you can run this quarter.</h2>
        </div>
        <a href="{{ url('/products') }}" class="{{ $textLink }}">All products {!! $arrow !!}</a>
      </div>
      <div class="mt-12 grid gap-x-8 gap-y-14 md:grid-cols-2 lg:mt-16">
        @foreach ($sectorProducts as $k => $p)
          <a href="{{ url('/products/' . $k) }}" class="reveal group flex flex-col" style="--d:{{ $loop->index * 0.08 }}s">
            @if (!empty($p['shots'][0]['file']))
              <div class="overflow-hidden border border-neutral-200 bg-neutral-50">
                <div class="flex items-center gap-1.5 border-b border-neutral-200 bg-white px-4 py-2.5">
                  <i class="block h-2 w-2 rounded-full bg-neutral-200"></i><i class="block h-2 w-2 rounded-full bg-neutral-200"></i><i class="block h-2 w-2 rounded-full bg-neutral-200"></i>
                  <span class="ml-3 truncate text-[11px] text-neutral-400">{{ $p['address'] }}</span>
                </div>
                <img src="{{ asset('images/products/' . $k . '/' . $p['shots'][0]['file']) }}" alt="{{ $p['name'] }} — {{ $p['shots'][0]['title'] ?? $p['blurb'] }}" loading="lazy" decoding="async" class="v3-photo aspect-[16/10] w-full object-cover object-top">
              </div>
            @endif
            <div class="mt-6 flex items-start justify-between gap-4">
              <div class="min-w-0">
                <p class="text-xs font-medium uppercase tracking-wider text-neutral-500">{{ $p['category'] }}</p>
                <h3 class="mt-2 text-2xl font-black tracking-[-0.02em] group-hover:text-neutral-500">{{ $p['name'] }}</h3>
                <p class="mt-2 text-[15px] leading-relaxed text-neutral-500">{{ $p['summary'] }}</p>
                <span class="mt-5 inline-flex items-center gap-2 text-sm font-medium">Explore {{ $p['name'] }} {!! $arrow !!}</span>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endif

{{-- ── Service lines / outcomes ─────────────────────────── --}}
<section class="v3-rule bg-neutral-50">
  <div class="v3-wrap v3-section">
    <div class="grid gap-16 lg:grid-cols-12">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">Service lines involved</p>
        <h2 class="v3-h2 mt-3">Delivered by one team.</h2>
        <div class="mt-10 border-t border-neutral-200">
          @foreach ($sectorServices as $svc)
            <a href="{{ url('/services/' . $svc['slug']) }}" class="group flex items-center gap-4 border-b border-neutral-200 py-4 transition-colors hover:text-neutral-500">
              <span class="v3-icon !h-10 !w-10 transition-colors group-hover:!bg-[var(--blue)] group-hover:!text-white"><span class="material-symbols-outlined">{{ $svc['icon'] }}</span></span>
              <span class="min-w-0 text-[15.5px] font-semibold leading-snug tracking-tight">{{ $svc['label'] }}</span>
              <span class="ml-auto text-neutral-400 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-neutral-500">{!! $arrow !!}</span>
            </a>
          @endforeach
        </div>
      </div>
      <div class="reveal lg:col-span-7" style="--d:.1s">
        <p class="v3-eyebrow">What you walk away with</p>
        <h2 class="v3-h2 mt-3">The outcomes.</h2>
        <div class="mt-10 grid gap-px border border-neutral-200 bg-neutral-200 sm:grid-cols-2">
          @foreach ($industry['outcomes'] as $o)
            <div class="flex items-start gap-4 bg-white p-6 lg:p-7">
              <span class="material-symbols-outlined shrink-0 text-[22px] text-[var(--blue)]">task_alt</span>
              <p class="text-base font-semibold leading-snug tracking-tight">{{ $o }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── FAQ ──────────────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">Common questions</p>
        <h2 class="v3-h2 mt-3">Before you ask.</h2>
        <p class="mt-7 max-w-sm text-[15.5px] leading-relaxed text-neutral-500">
          Anything else, <a href="{{ $waAsk }}" target="_blank" rel="noopener" class="font-semibold text-[var(--ink)] underline underline-offset-4 hover:text-neutral-500">message us on WhatsApp</a> and a person will reply.
        </p>
      </div>
      <div class="reveal lg:col-span-7" style="--d:.1s">
        <div class="border-t border-neutral-200">
          @foreach ($industry['faqs'] as $f)
            <details class="group border-b border-neutral-100">
              <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-6 text-[17px] font-bold tracking-tight hover:text-neutral-500 [&::-webkit-details-marker]:hidden">
                {{ $f[0] }}
                <span class="material-symbols-outlined shrink-0 text-[22px] text-neutral-400 transition-transform duration-300 group-open:rotate-45">add</span>
              </summary>
              <p class="max-w-2xl pb-6 text-[15px] leading-relaxed text-neutral-500">{{ $f[1] }}</p>
            </details>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── Other industries ─────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="reveal flex flex-wrap items-end justify-between gap-6">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">Other industries</p>
        <h2 class="v3-h2 mt-3">Also working in.</h2>
      </div>
      <a href="{{ url('/industries') }}" class="{{ $textLink }}">All industries {!! $arrow !!}</a>
    </div>
    <ol class="reveal mt-12 border-t border-neutral-200" style="--d:.1s">
      @foreach ($others as $k => $o)
        <li>
          <a href="{{ url('/industries/' . $k) }}" class="group grid grid-cols-[auto_1fr_auto] items-center gap-5 border-b border-neutral-100 py-5 transition-colors hover:bg-neutral-50 sm:grid-cols-[3rem_auto_1fr_auto] sm:gap-6">
            <span class="hidden text-xs font-medium tabular-nums text-neutral-400 sm:block">{{ sprintf('%02d', $loop->iteration) }}</span>
            <span class="v3-icon !h-10 !w-10"><span class="material-symbols-outlined">{{ $o['icon'] }}</span></span>
            <span class="min-w-0">
              <span class="block text-[17px] font-bold leading-snug tracking-tight group-hover:text-neutral-500 sm:text-[19px]">{{ $o['label'] }}</span>
              <span class="mt-0.5 hidden text-[13.5px] leading-snug text-neutral-500 sm:block">{{ $o['blurb'] }}</span>
            </span>
            <span class="text-neutral-400 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[var(--ink)]">{!! $arrow !!}</span>
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</section>

@endsection
