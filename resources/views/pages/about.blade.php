@extends('layouts.v3')

@section('title', 'About Cloudence | ICT Company in Abuja & Calabar')
@section('description', 'Cloudence is an ICT company in Abuja and Calabar delivering enterprise software, networks and infrastructure for businesses and government across Nigeria.')

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['About', '/about']]) !!}
  {!! \App\Support\Seo::page('AboutPage', 'About Cloudence', '/about', 'Who Cloudence is, what we hold ourselves to, and where we work.') !!}
@endpush

@php
  $wa     = config('site.whatsapp');
  $waBook = $wa . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");
  $mail   = config('site.mail');

  /* ────────────────────────────────────────────────────────────────
   | PLACEHOLDER CONTENT — figures and dates below are not verified.
   | Replace before launch. All other copy is real Cloudence content.
   ──────────────────────────────────────────────────────────────── */

  // PLACEHOLDER: stat counters (kept in step with the home page)
  $stats = [
    ['value' => 8,   'suffix' => '+', 'label' => 'Years delivering ICT'],
    ['value' => 25,  'suffix' => '+', 'label' => 'Engineers & technicians'],
    ['value' => 40,  'suffix' => '+', 'label' => 'Projects delivered'],
    ['value' => 6,   'suffix' => '',  'label' => 'Industries served'],
  ];

  /* ──────────────── End of placeholder content ──────────────── */

  $values = [
    ['01', 'lightbulb',      'Innovation',   'Solutions designed for the problem in front of us, not last year\'s template. We choose the technology after we understand the need, never before.'],
    ['02', 'verified',       'Reliability',  'Systems that hold up in production, with support that continues after launch. If it is running your operation, it has to keep running.'],
    ['03', 'visibility',     'Transparency', 'Honest scope, honest pricing, and progress you can see rather than hear about. We say when a thing will be hard, and when you do not need it.'],
    ['04', 'handshake',      'Partnership',  'One accountable team across software and infrastructure, for the long term. Our best clients are the ones we have worked with for years.'],
  ];

  $differences = [
    ['device_hub',    'One vendor, whole stack',      'Software and the infrastructure it runs on, from the same team. No finger-pointing between suppliers when something needs fixing.'],
    ['fact_check',    'Built for procurement',        'Documentation, scope control and reporting that stand up to public-sector audit, delivered to a fixed scope and price.'],
    ['support_agent', 'Support after handover',       'We train your people, stay on for maintenance, and remain the number you call when the system needs to change.'],
  ];
@endphp

@section('page')

@php
  $arrow = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
@endphp

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-14 pt-14 lg:pb-20 lg:pt-24">
  <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs font-medium uppercase tracking-wider text-neutral-400">
    <a href="{{ url('/') }}" class="transition-colors hover:text-[var(--ink)]">Home</a>
    <span aria-hidden="true">/</span>
    <span class="text-[var(--blue)]">About Cloudence</span>
  </nav>
  <h1 class="v3-h1 reveal mt-6 max-w-5xl">
    Your digital partner to <span class="v3-accent">business growth.</span>
  </h1>
  <div class="mt-10 grid gap-10 lg:mt-14 lg:grid-cols-12 lg:gap-16">
    <p class="v3-lead reveal max-w-2xl lg:col-span-8" style="--d:.2s">
      Cloudence delivers innovative, reliable ICT solutions that let businesses and government
      institutions scale with confidence. From infrastructure to enterprise software, we work
      closely with each client to understand what they actually need, then build technology
      around it — efficient, productive, and sustainable well past handover.
    </p>
    <div class="reveal flex flex-wrap items-end gap-3 lg:col-span-4 lg:justify-end" style="--d:.3s">
      <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">
        Book a consultation {!! $arrow !!}
      </a>
      <a href="{{ url('/services') }}" class="v3-btn v3-btn-line">Explore our services</a>
    </div>
  </div>
</section>

{{-- ── Photo ────────────────────────────────────────────── --}}
<section class="v3-wrap">
  <figure class="group relative aspect-[4/3] overflow-hidden bg-neutral-900 sm:aspect-[16/9] lg:aspect-[21/9]">
    <img src="{{ asset('images/main/about-team.jpg') }}" alt="A Cloudence team meeting with a client" loading="eager" decoding="async"
         class="v3-photo absolute inset-0 h-full w-full object-cover">
    <figcaption class="absolute bottom-0 left-0 bg-[var(--blue)] px-5 py-4 text-white">
      <span class="block text-[11px] font-medium uppercase tracking-wider text-white/70">{{ config('site.name') }}</span>
      <span class="mt-0.5 block text-sm font-bold">{{ collect(config('site.offices'))->pluck('city')->join(' & ') }}</span>
    </figcaption>
  </figure>
</section>

{{-- ── Stats (PLACEHOLDER figures, see top of file) ─────── --}}
<section class="v3-wrap py-14 lg:py-20">
  <div class="reveal grid grid-cols-2 border-t border-neutral-200 lg:grid-cols-4">
    @foreach ($stats as $i => $s)
      <div class="border-b border-[#f0f0f2] py-8 pr-4 {{ $i % 2 ? 'pl-6 border-l' : '' }} lg:border-b-0 lg:px-8 {{ $i ? 'lg:border-l lg:pl-8' : 'lg:pl-0' }}">
        <div class="v3-num text-[clamp(2.4rem,5vw,3.75rem)] leading-none">
          <span class="counter" data-target="{{ $s['value'] }}">0</span><span>{{ $s['suffix'] }}</span>
        </div>
        <div class="mt-3 max-w-[10rem] text-sm leading-relaxed text-neutral-500">{{ $s['label'] }}</div>
      </div>
    @endforeach
  </div>
</section>

{{-- ── Mission & vision ─────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">Mission &amp; vision</p>
        <h2 class="v3-h2 mt-4">More than a service provider.</h2>
        <p class="v3-lead mt-6 max-w-md">
          With a focus on trust, excellence and innovation, we set out to be a strategic partner in
          digital transformation — not just the vendor on the last purchase order.
        </p>
      </div>

      <div class="grid gap-px bg-[#f0f0f2] md:grid-cols-2 lg:col-span-7 border border-[#f0f0f2]">
        <div class="reveal flex flex-col bg-white p-8 lg:p-10">
          <span class="v3-icon"><span class="material-symbols-outlined">flag</span></span>
          <p class="v3-eyebrow mt-8">Our mission</p>
          <p class="mt-3 text-xl font-bold leading-snug tracking-tight">
            To deliver innovative, reliable ICT solutions that let businesses and government
            institutions scale with confidence.
          </p>
          <p class="mt-4 text-[15px] leading-relaxed text-neutral-500">
            Technology that drives efficiency, productivity and sustainable growth — specified
            honestly, built properly, and supported for as long as it is in use.
          </p>
        </div>
        <div class="reveal flex flex-col bg-white p-8 lg:p-10" style="--d:.08s">
          <span class="v3-icon"><span class="material-symbols-outlined">visibility</span></span>
          <p class="v3-eyebrow mt-8">Our vision</p>
          <p class="mt-3 text-xl font-bold leading-snug tracking-tight">
            To be the technology partner that institutions across Nigeria trust to build and run
            the systems they depend on.
          </p>
          <p class="mt-4 text-[15px] leading-relaxed text-neutral-500">
            One accountable team for software and infrastructure, known for work that survives
            procurement, audit and the years after launch.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── Values ───────────────────────────────────────────── --}}
<section id="values" class="v3-rule scroll-mt-24">
  <div class="v3-wrap v3-section">
    <div class="reveal grid items-end gap-8 lg:grid-cols-12 lg:gap-16">
      <div class="lg:col-span-7">
        <p class="v3-eyebrow">Our values</p>
        <h2 class="v3-h2 mt-4">What we hold ourselves to.</h2>
      </div>
      <div class="lg:col-span-5">
        <p class="max-w-md text-[15px] leading-relaxed text-neutral-500">Four things we are measured against on every engagement, whether the client is a two-person business or a federal agency.</p>
      </div>
    </div>

    <ol class="reveal mt-14 border-t border-neutral-200" style="--d:.1s">
      @foreach ($values as $v)
        <li class="grid gap-3 border-b border-[#f0f0f2] py-8 sm:grid-cols-12 sm:gap-6">
          <span class="text-xs font-medium tabular-nums text-neutral-400 sm:col-span-1 sm:pt-2">{{ $v[0] }}</span>
          <div class="flex items-center gap-4 sm:col-span-4">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $v[1] }}</span></span>
            <h3 class="v3-h3">{{ $v[2] }}</h3>
          </div>
          <p class="text-[15px] leading-relaxed text-neutral-500 sm:col-span-7 sm:pt-1">{{ $v[3] }}</p>
        </li>
      @endforeach
    </ol>
  </div>
</section>

{{-- ── Why Cloudence ────────────────────────────────────── --}}
<section class="v3-rule bg-neutral-50">
  <div class="v3-wrap v3-section">
    <div class="grid items-start gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:sticky lg:top-32 lg:col-span-5">
        <p class="v3-eyebrow">Why Cloudence</p>
        <h2 class="v3-h2 mt-4">One team, accountable.</h2>
        <p class="v3-lead mt-6 max-w-md">
          Most ICT projects fail in the gaps between suppliers. We removed the gaps. The people who
          design your software are the same people who specify the network it runs on and answer
          the phone after launch.
        </p>
        <a href="{{ url('/services') }}" class="mt-8 inline-flex items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">
          Explore our services {!! $arrow !!}
        </a>
      </div>

      <div class="grid gap-4 lg:col-span-7">
        @foreach ($differences as $i => $d)
          <div class="v3-card reveal flex items-start gap-6 p-7 lg:p-8" style="--d:{{ $i * 0.08 }}s">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $d[0] }}</span></span>
            <div>
              <h3 class="v3-h3 text-lg">{{ $d[1] }}</h3>
              <p class="mt-2 text-[15px] leading-relaxed text-neutral-500">{{ $d[2] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ── Offices ──────────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="reveal flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">Where we are</p>
        <h2 class="v3-h2 mt-4">Two offices, one team.</h2>
      </div>
      <a href="{{ url('/contact') }}" class="inline-flex shrink-0 items-center gap-2 self-start border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500 lg:self-auto">
        Get in touch {!! $arrow !!}
      </a>
    </div>

    <div class="mt-14 grid gap-4 md:grid-cols-2">
      @foreach (config('site.offices') as $i => $o)
        <div class="v3-card reveal flex flex-col p-8 lg:p-10" style="--d:{{ $i * 0.08 }}s">
          <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
              <span class="v3-icon"><span class="material-symbols-outlined">location_on</span></span>
              <span class="text-2xl font-black tracking-[-0.02em]">{{ $o['city'] }}</span>
            </div>
            <span class="text-xs font-medium uppercase tracking-wider text-neutral-400">{{ $i === 0 ? 'Head office' : 'Regional office' }}</span>
          </div>
          <p class="mt-6 flex-1 text-base leading-relaxed text-neutral-500">{{ $o['address'] }}</p>
          <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-[#f0f0f2] pt-6 text-sm">
            <a href="tel:{{ str_replace(' ', '', $o['phone']) }}" class="inline-flex items-center gap-2 font-medium transition-colors hover:text-neutral-500">
              <span class="material-symbols-outlined text-[18px] text-neutral-400">call</span>
              {{ $o['phone'] }}
            </a>
            <a href="mailto:{{ $mail }}" class="inline-flex min-w-0 items-center gap-2 font-medium transition-colors hover:text-neutral-500">
              <span class="material-symbols-outlined text-[18px] text-neutral-400">mail</span>
              <span class="break-all">{{ $mail }}</span>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
