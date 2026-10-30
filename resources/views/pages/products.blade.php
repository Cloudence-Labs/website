@extends('layouts.v3')

@section('title', 'Products — Cloudence')
@section('description', 'Software products built and run by Cloudence: ready-made platforms for government, finance and revenue collection, configured to your organisation and supported after launch.')

@php
  $products = config('products');
  $groups   = collect($products)->map(fn ($p, $k) => $p + ['slug' => $k])->groupBy('category');
  $waBook   = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like a demo of your products.");
  $delivery = [
    ['bolt',          'Live in weeks',            'The core is already built and tested, so the project is configuration, migration and training — not development.'],
    ['tune',          'Configured, not generic',  'Your structure, approval chains, branding and reports are set up before the first user logs in.'],
    ['extension',     'Extended when needed',     'Where your process is different, we adapt the product rather than asking you to change how you work.'],
    ['support_agent', 'Supported by the authors', 'The people who answer your call are the people who wrote the software.'],
  ];
  $arrow = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
@endphp

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Products', '/products']]) !!}
  {!! \App\Support\Seo::page('CollectionPage', 'Products', '/products', 'Software products built and run by Cloudence.') !!}
  {!! \App\Support\Seo::itemList(array_map(fn ($k, $p) => [$p['name'], '/products/' . $k], array_keys($products), $products)) !!}
@endpush

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-16 pt-14 lg:pb-24 lg:pt-24">
  <div class="grid gap-12 lg:grid-cols-12 lg:items-end lg:gap-16">
    <div class="lg:col-span-7">
      <p class="v3-eyebrow">Products &nbsp;·&nbsp; {{ count($products) }} platforms</p>
      <h1 class="mt-4 max-w-4xl text-[2.6rem] font-black leading-[1.03] tracking-[-0.035em] sm:text-6xl lg:text-[min(4.5rem,5vw)]">
        Platforms we built, <span class="text-[var(--blue)]">ready for you to run.</span>
      </h1>
      <p class="mt-8 max-w-xl text-base leading-relaxed text-neutral-500 sm:text-lg">
        Not every problem needs a system built from scratch. These are products we designed,
        hardened in real use and now deploy for clients — configured to your organisation,
        with your people trained and our team on call afterwards.
      </p>
      <div class="mt-10 flex flex-wrap items-center gap-3">
        <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">Request a demo {!! $arrow !!}</a>
        <a href="{{ url('/services/enterprise-software') }}" class="v3-btn v3-btn-line">Need something custom? {!! $arrow !!}</a>
      </div>
    </div>

    {{-- Quick jump --}}
    <div class="lg:col-span-5">
      <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">On this page</p>
      <ul class="mt-4 border-t border-neutral-200">
        @foreach ($products as $slug => $p)
          <li class="border-b border-neutral-100">
            <a href="#{{ $slug }}" class="group flex items-center gap-4 py-4">
              <span class="v3-icon transition-colors group-hover:bg-[var(--blue)] group-hover:text-white"><span class="material-symbols-outlined">{{ $p['icon'] }}</span></span>
              <span class="min-w-0 flex-1">
                <span class="block text-[15px] font-bold tracking-tight group-hover:text-[var(--blue)]">{{ $p['name'] }}</span>
                <span class="block truncate text-[13px] text-neutral-500">{{ $p['blurb'] }}</span>
              </span>
              <span class="material-symbols-outlined text-[18px] text-neutral-400 transition-transform group-hover:translate-y-0.5 group-hover:text-[var(--ink)]">arrow_downward</span>
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>

{{-- ── Products by category ─────────────────────────────── --}}
@php $n = 0; @endphp
@foreach ($groups as $category => $items)
  <section class="border-t border-neutral-100">
    <div class="v3-wrap py-20 lg:py-28">
      <div class="flex flex-wrap items-end justify-between gap-6">
        <div class="max-w-2xl">
          <p class="v3-eyebrow">{{ $category }}</p>
          <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">Built for <span>{{ strtolower($category) }}.</span></h2>
        </div>
        <p class="text-sm text-neutral-400">{{ count($items) }} {{ Str::plural('product', count($items)) }}</p>
      </div>

      <div class="mt-14 space-y-6 lg:space-y-8">
        @foreach ($items as $p)
          @php $n++; $flip = $n % 2 === 0; $shot = $p['shots'][0] ?? null; @endphp
          <article id="{{ $p['slug'] }}" class="reveal scroll-mt-28 border border-neutral-100 p-5 transition-colors hover:border-neutral-300 sm:p-8 lg:p-10">
            <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
              <div class="lg:col-span-7 {{ $flip ? 'lg:order-2' : '' }}">
                @if ($shot)
                  <a href="{{ url('/products/' . $p['slug']) }}" class="group block" aria-label="Open {{ $p['name'] }}">
                    <div class="overflow-hidden border border-neutral-200 bg-white transition-transform duration-700 group-hover:-translate-y-1.5">
                      <div class="flex items-center gap-3 border-b border-neutral-200 bg-neutral-50 px-4 py-2.5">
                        <span class="flex shrink-0 gap-1.5" aria-hidden="true"><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i></span>
                        <span class="min-w-0 truncate text-[11.5px] text-neutral-500">{{ $p['address'] }}</span>
                      </div>
                      <img src="{{ asset('images/products/' . $p['slug'] . '/' . $shot['file']) }}" alt="{{ $p['name'] }} — {{ $shot['title'] }}" loading="{{ $n === 1 ? 'eager' : 'lazy' }}" decoding="async" class="aspect-[16/10] w-full object-cover object-top">
                    </div>
                  </a>
                @endif
              </div>

              <div class="lg:col-span-5 {{ $flip ? 'lg:order-1' : '' }}">
                <div class="flex flex-wrap items-center gap-3">
                  <span class="v3-icon"><span class="material-symbols-outlined">{{ $p['icon'] }}</span></span>
                  <span class="border border-neutral-200 px-2.5 py-1 text-[11px] font-medium uppercase tracking-wider text-neutral-500">{{ $p['category'] }}</span>
                  <span class="text-xs font-medium tabular-nums text-neutral-400">{{ sprintf('%02d', $n) }}</span>
                </div>
                <h3 class="mt-7 text-[clamp(1.9rem,3.2vw,2.6rem)] font-black leading-[1.05] tracking-[-0.03em]">{{ $p['name'] }}</h3>
                <p class="mt-2 text-lg font-medium leading-snug text-neutral-500">{{ $p['tagline'] }}</p>
                <p class="mt-5 text-[15px] leading-relaxed text-neutral-500">{{ $p['summary'] ?? $p['description'] }}</p>
                <ul class="mt-6 space-y-2.5">
                  @foreach (array_slice($p['features'], 0, 4) as $f)
                    <li class="flex items-start gap-3 text-[14.5px] leading-relaxed text-[var(--ink)]">
                      <span class="material-symbols-outlined mt-0.5 shrink-0 text-[19px] text-[var(--blue)]">task_alt</span>{{ $f[1] }}
                    </li>
                  @endforeach
                </ul>
                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3">
                  <a href="{{ url('/products/' . $p['slug']) }}" class="v3-btn v3-btn-dark">Explore {{ $p['name'] }} {!! $arrow !!}</a>
                  <a href="{{ config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like a demo of " . $p['name'] . '.') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">Request a demo {!! $arrow !!}</a>
                </div>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>
@endforeach

{{-- ── Product, plus the team ───────────────────────────── --}}
<section class="border-t border-neutral-100 bg-neutral-50">
  <div class="v3-wrap py-20 lg:py-28">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="lg:col-span-4">
        <p class="v3-eyebrow">Product, plus the team</p>
        <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">Faster than a build. <span>Still made to fit.</span></h2>
        <p class="mt-7 max-w-sm text-base leading-relaxed text-neutral-500 sm:text-lg">
          A product gets you live in weeks rather than months. Because we wrote it, we can also
          change it — so you are never stuck with software that almost fits.
        </p>
        <a href="{{ url('/contact') }}" class="mt-8 inline-flex items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">Talk to us about a rollout {!! $arrow !!}</a>
      </div>
      <div class="grid gap-px self-start border border-neutral-200 bg-neutral-200 sm:grid-cols-2 lg:col-span-8">
        @foreach ($delivery as $i => $c)
          <div class="reveal flex flex-col gap-6 bg-white p-7 lg:p-8" style="--d:{{ ($i % 2) * 0.06 }}s">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $c[0] }}</span></span>
            <div>
              <h3 class="text-lg font-bold leading-tight tracking-tight">{{ $c[1] }}</h3>
              <p class="mt-2 text-[14.5px] leading-relaxed text-neutral-500">{{ $c[2] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection
