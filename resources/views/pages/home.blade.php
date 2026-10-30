@extends('layouts.v3')

@section('title', 'Cloudence | Software, Networks & ICT Solutions in Nigeria')
@section('description', 'Cloudence builds enterprise software, networks and ICT infrastructure for businesses and government institutions across Nigeria. Offices in Abuja and Calabar.')

@push('head')
  {!! \App\Support\Seo::offices() !!}
@endpush

@php
  $services = config('site.services');
  $news     = \App\Support\News::all()->take(3);
  // About section: the four things every engagement is measured against (same list as /about)
  $values = [
    ['01', 'Innovation',   'Solutions designed for the problem in front of us, not last year\'s template. We choose the technology after we understand the need, never before.'],
    ['02', 'Reliability',  'Systems that hold up in production, with support that continues after launch. If it is running your operation, it has to keep running.'],
    ['03', 'Transparency', 'Honest scope, honest pricing, and progress you can see rather than hear about. We say when a thing will be hard, and when you do not need it.'],
    ['04', 'Partnership',  'One accountable team across software and infrastructure, for the long term. Our best clients are the ones we have worked with for years.'],
  ];
  // Random order on every page load, so no client is always first.
  $clients = collect([
    ['uee-akamkpa.png',   'University of Education & Entrepreneurship, Akamkpa'],
    ['crsubeb.png',       'Cross River State Universal Basic Education Board'],
    ['ncaa.png',          'Nigerian Civil Aviation Authority'],
    ['topratemfbank.png', 'Toprate Microfinance Bank'],
    ['billerhub.png',     'Billerhub'],
    ['bulwark.png',       'Bulwark Intelligence'],
    ['hskoncepts.png',    'HS Konceptz International'],
  ])->shuffle()->all();
  $cities = implode(' · ', array_column(config('site.offices'), 'city'));
@endphp

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-16 pt-14 lg:pb-24 lg:pt-28">
  <div class="grid grid-cols-1 lg:grid-cols-12">
    <div class="lg:col-span-12">
      <h1 class="text-5xl font-black leading-[1.03] tracking-[-0.035em] text-[var(--ink)] sm:text-6xl md:text-[72px]">
        Empowering growth through<br>smart technology
      </h1>
      <p class="mt-8 max-w-xl text-base leading-relaxed text-neutral-500 sm:mt-10 sm:text-lg">
        Cloudence designs, deploys and maintains the software and infrastructure that businesses and government institutions run on — from enterprise systems to the cabling behind them.
      </p>
      <div class="mt-10 flex flex-wrap gap-3">
        <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 bg-[var(--ink)] px-6 py-3.5 text-sm font-medium text-white transition-colors hover:bg-neutral-800">
          Explore our services
          <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
        </a>
        <a href="{{ url('/news') }}" class="inline-flex items-center gap-2 border border-neutral-200 px-6 py-3.5 text-sm font-medium transition-colors hover:border-neutral-950">Latest news</a>
      </div>
    </div>
  </div>
</section>

{{-- ── Service strip: one photo per service ─────────────── --}}
<section aria-label="Our services" class="w-full overflow-hidden border-t border-neutral-900 bg-neutral-950">
  <div class="v3-strip flex h-[240px] overflow-x-auto [scrollbar-width:none] lg:h-[300px]" data-v3-strip>
    @foreach ($services as $i => $s)
      <a href="{{ url('/services/' . $s['slug']) }}" data-tile
         class="v3-tile group relative flex h-full flex-col justify-end overflow-hidden border-r border-neutral-800 {{ $i === 0 ? 'is-active' : '' }}">
        <img src="{{ asset('images/services/' . $s['slug'] . '.jpg') }}" alt="" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover">
        <span class="v3-tag relative z-10 flex items-center justify-between gap-3 bg-[var(--blue)] p-4 text-white">
          <span class="min-w-0">
            <span class="block truncate text-sm font-bold leading-tight">{{ $s['short'] }}</span>
            <span class="block truncate text-[11px] text-white/80">{{ $s['blurb'] }}</span>
          </span>
          <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20 transition-colors group-hover:bg-white group-hover:text-[var(--blue)]">
            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
          </span>
        </span>
        <span class="sr-only">{{ $s['label'] }}</span>
      </a>
    @endforeach
    <a href="{{ url('/services') }}" class="group flex w-[260px] shrink-0 flex-col justify-between bg-black p-6 text-white transition-colors hover:bg-neutral-900 lg:w-[320px] xl:flex-[0_0_300px]">
      <span class="flex justify-end">
        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-black transition-transform group-hover:-translate-y-1 group-hover:translate-x-1">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
        </span>
      </span>
      <span class="text-2xl font-bold leading-tight tracking-tight">Explore all<br>our services</span>
    </a>
  </div>
</section>

{{-- ── About ────────────────────────────────────────────── --}}
<section class="v3-wrap border-b border-neutral-100 py-20 lg:py-28" aria-labelledby="aboutTitle">
  {{-- Intro: headline left, statement right --}}
  <div class="grid gap-10 lg:grid-cols-12 lg:gap-16">
    <div class="lg:col-span-6">
      <p class="text-xs font-medium uppercase tracking-wider text-neutral-500">About Cloudence</p>
      <h2 id="aboutTitle" class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">
        Your partner in digital transformation.
      </h2>
    </div>
    <div class="flex flex-col justify-end gap-8 lg:col-span-6">
      <p class="max-w-xl text-base leading-relaxed text-neutral-500 sm:text-lg">
        We deliver innovative, reliable ICT solutions that let government and organisations scale with confidence. From infrastructure to enterprise software, we work closely with each client to understand what they actually need, then build technology around it — efficient, productive, and sustainable well past handover.
      </p>
      <a href="{{ url('/about') }}" class="inline-flex items-center gap-2 self-start border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">
        More about us
        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
      </a>
    </div>
  </div>

  {{-- Photo + the four things we are measured against --}}
  <div class="mt-16 grid gap-10 lg:mt-24 lg:grid-cols-12 lg:gap-16">
    <figure class="relative aspect-[4/5] overflow-hidden bg-neutral-900 sm:aspect-[4/3] lg:col-span-5 lg:aspect-auto">
      <img src="{{ asset('images/main/about-team.jpg') }}" alt="A Cloudence team meeting with a client" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover">
      <figcaption class="absolute bottom-0 left-0 bg-[var(--blue)] px-5 py-4 text-white">
        <span class="block text-[11px] font-medium uppercase tracking-wider text-white/70">Offices</span>
        <span class="mt-0.5 block text-sm font-bold">{{ $cities }}</span>
      </figcaption>
    </figure>
    <div class="lg:col-span-7">
      <p class="max-w-md text-sm leading-relaxed text-neutral-500">
        Four things we are measured against on every engagement, whether the client is a two-person business or a federal agency.
      </p>
      <ol class="mt-8 border-t border-neutral-200">
        @foreach ($values as [$n, $title, $body])
          <li class="grid gap-2 border-b border-neutral-100 py-6 sm:grid-cols-12 sm:gap-6">
            <span class="text-xs font-medium tabular-nums text-neutral-400 sm:col-span-1 sm:pt-1">{{ $n }}</span>
            <h3 class="text-lg font-bold leading-tight tracking-tight sm:col-span-3">{{ $title }}</h3>
            <p class="text-[15px] leading-relaxed text-neutral-500 sm:col-span-8">{{ $body }}</p>
          </li>
        @endforeach
      </ol>
    </div>
  </div>

  {{-- Clients --}}
  <div class="mt-16 lg:mt-20">
    <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">Trusted by</p>
    <ul class="mt-6 grid grid-cols-2 items-center gap-x-8 gap-y-8 sm:grid-cols-4 lg:grid-cols-7">
      @foreach ($clients as [$file, $name])
        <li class="flex h-10 items-center justify-center sm:justify-start">
          <img src="{{ asset('images/clients/' . $file) }}" alt="{{ $name }}" loading="lazy" decoding="async" class="max-h-10 w-auto max-w-full object-contain">
        </li>
      @endforeach
    </ul>
  </div>
</section>

{{-- ── News ─────────────────────────────────────────────── --}}
<section class="v3-wrap py-20 lg:py-28" aria-labelledby="newsTitle">
  <div class="flex flex-wrap items-end justify-between gap-6">
    <div>
      <h2 id="newsTitle" class="text-4xl font-black tracking-[-0.03em] sm:text-5xl">News &amp; Events</h2>
    </div>
    <a href="{{ url('/news') }}" class="inline-flex items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">
      All news
      <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
    </a>
  </div>
  <div class="mt-12 grid gap-x-8 gap-y-14 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($news as $post)
      @include('partials.v3.news-card', ['post' => $post])
    @endforeach
  </div>
</section>

@endsection

@push('scripts')
<script>
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Service strip: hovered or focused tile becomes the featured one
  const strip = document.querySelector('[data-v3-strip]');
  if (strip) {
    const tiles = [...strip.querySelectorAll('[data-tile]')];
    const activate = (t) => tiles.forEach((x) => x.classList.toggle('is-active', x === t));
    tiles.forEach((t) => { t.addEventListener('mouseenter', () => activate(t)); t.addEventListener('focus', () => activate(t)); });
  }
})();
</script>
@endpush
