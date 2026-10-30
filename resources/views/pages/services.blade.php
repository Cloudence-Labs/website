@extends('layouts.v3')

@section('title', 'ICT Services in Nigeria: Software, Networks & CCTV | Cloudence')
@section('description', 'Enterprise software, web and mobile development, networks, CCTV, hardware supply and training — delivered in-house by one accountable team across Nigeria.')

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Services', '/services']]) !!}
  {!! \App\Support\Seo::page('CollectionPage', 'Services', '/services', 'Every service line Cloudence delivers in-house.') !!}
  {!! \App\Support\Seo::itemList(array_map(fn ($s) => [$s['label'], '/services/' . $s['slug']], config('site.services'))) !!}
@endpush

@php
  $services = config('site.services');
  $wa       = config('site.whatsapp');
  $waBook   = $wa . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");
  $count    = count($services);
  $words    = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'];
  // Desktop (3 columns): the first card spans two; if the rest leave a gap at the end, the last spans two as well.
  $lastWide = $count > 1 && (($count - 2) % 3) === 2;
  // Tablet (2 columns): the first card is single width, so an odd count leaves the last one alone; let it span both.
  $lastWideMd = $count % 2 === 1;
  $process  = [
    ['Consultation & planning', 'We start by understanding your goals and constraints, then set out a clear plan that ties the technology to the outcome you are paying for.'],
    ['Delivery & testing',      'We build or install against the agreed scope and test as we go, with checkpoints where you see progress rather than hear about it.'],
    ['Launch & support',        'We handle deployment, train your people, and stay on for updates and maintenance so the system keeps earning its keep.'],
  ];
  $arrow = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
@endphp

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-16 pt-14 lg:pb-24 lg:pt-24">
  <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm font-medium text-neutral-500">
    <a href="{{ url('/') }}" class="hover:text-[var(--blue)]">Home</a>
    <span aria-hidden="true" class="text-neutral-300">/</span>
    <span class="text-[var(--ink)]">Services</span>
  </nav>
  <p class="v3-eyebrow mt-10">What we do</p>
  <h1 class="v3-h1 mt-4 max-w-4xl">
    {{ $words[$count] ?? $count }} service lines. <span class="v3-accent">One accountable team.</span>
  </h1>
  <p class="v3-lead mt-8 max-w-xl">
    Most clients start with one engagement and keep us on for the rest. Everything below is
    delivered in-house, by the same people who planned it — software, the infrastructure it
    runs on, and the people who will use it.
  </p>
  <div class="mt-10 flex flex-wrap items-center gap-3">
    <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">
      Book a consultation {!! $arrow !!}
    </a>
    <a href="{{ url('/contact') }}" class="v3-btn v3-btn-line">Contact us</a>
  </div>
</section>

{{-- ── Service grid ─────────────────────────────────────── --}}
<section id="services" class="v3-rule scroll-mt-24">
  <div class="v3-wrap v3-section">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">Service lines</p>
        <h2 class="v3-h2 mt-4">Everything we deliver, <span class="v3-accent whitespace-nowrap">in-house.</span></h2>
      </div>
      <p class="v3-muted max-w-sm text-[15px] leading-relaxed">Each line links to a page covering what is included, who it is for and the questions clients usually ask first.</p>
    </div>

    <div class="mt-14 grid gap-6 md:grid-cols-2 lg:mt-16 lg:grid-cols-3">
      @foreach ($services as $i => $s)
        @php
          $d      = config('service-details.' . $s['slug']);
          $n      = sprintf('%02d', $i + 1);
          $isLast = $i === $count - 1;
          $wideLg = $i === 0 || ($lastWide && $isLast);
          $wideMd = $lastWideMd && $isLast;
          $span   = trim(($wideMd ? 'md:col-span-2 ' : '') . ($wideLg ? 'lg:col-span-2' : ($wideMd ? 'lg:col-span-1' : '')));
          // Wide cards sit photo-left / text-right at the breakpoint where they span two columns.
          $split  = $wideMd ? 'md:grid md:grid-cols-2' : '';
          if ($wideLg) { $split .= ' lg:grid lg:grid-cols-2'; }
          if ($wideMd && !$wideLg) { $split .= ' lg:flex'; }
          $photoAuto = ($wideMd ? 'md:aspect-auto md:min-h-[360px] ' : '') . ($wideLg ? 'lg:aspect-auto lg:min-h-[360px]' : ($wideMd ? 'lg:aspect-[16/10] lg:min-h-0' : ''));
        @endphp
        <a href="{{ url('/services/' . $s['slug']) }}" class="v3-card reveal group flex flex-col overflow-hidden {{ $span }} {{ $split }}" style="--d:{{ ($i % 3) * 0.06 }}s">
          <div class="relative aspect-[16/10] overflow-hidden bg-neutral-100 {{ $photoAuto }}">
            <img src="{{ asset('images/services/' . $s['slug'] . '.jpg') }}" alt="" loading="lazy" decoding="async" class="v3-photo absolute inset-0 h-full w-full object-cover group-hover:scale-[1.03]">
            <span class="absolute left-0 top-0 bg-white px-3 py-2 text-xs font-medium tabular-nums text-neutral-400">{{ $n }}</span>
          </div>
          <div class="flex flex-1 flex-col p-7 lg:p-8">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $s['icon'] }}</span></span>
            <h3 class="v3-h3 mt-6 group-hover:text-neutral-500 {{ $wideLg ? 'lg:text-[1.6rem] lg:font-black lg:tracking-[-0.02em]' : '' }}">{{ $s['label'] }}</h3>
            <p class="mt-3 text-[15px] leading-relaxed text-neutral-500">{{ $s['description'] }}</p>
            @if ($d)
              <ul class="mt-6 flex flex-wrap gap-2">
                @foreach (array_slice($d['includes'], 0, $wideLg || $wideMd ? 4 : 3) as $inc)
                  <li class="border border-neutral-200 px-2.5 py-1 text-xs font-medium text-neutral-600">{{ $inc[1] }}</li>
                @endforeach
              </ul>
              <div class="mt-6 border-t border-neutral-100 pt-5">
                <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">Typically for</p>
                @if ($wideLg || $wideMd)
                  <ul class="mt-3 space-y-2">
                    @foreach ($d['for'] as $f)
                      <li class="flex items-start gap-2.5 text-sm leading-snug text-neutral-600"><span class="mt-[7px] h-1.5 w-1.5 shrink-0 bg-[var(--blue)]"></span>{{ $f }}</li>
                    @endforeach
                  </ul>
                @else
                  <p class="mt-2 text-sm leading-snug text-neutral-600">{{ $d['for'][0] }}</p>
                @endif
              </div>
            @endif
            <span class="mt-auto inline-flex items-center gap-2 pt-7 text-sm font-medium group-hover:text-neutral-500">Learn more {!! $arrow !!}</span>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- ── How we work ──────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">How we work</p>
        <h2 class="v3-h2 mt-4">{{ $words[count($process)] }} stages, <span class="v3-accent">no surprises.</span></h2>
        <p class="v3-lead mt-7 max-w-md">
          Whatever the service, the shape of the engagement is the same: a written scope, visible
          progress, and support that does not end at handover.
        </p>
      </div>
      <div class="reveal lg:col-span-7" style="--d:.1s">
        <ol class="border-t border-neutral-200">
          @foreach ($process as $i => $step)
            <li class="grid gap-2 border-b border-neutral-100 py-7 sm:grid-cols-12 sm:gap-6 lg:py-8">
              <span class="text-xs font-medium tabular-nums text-neutral-400 sm:col-span-1 sm:pt-1.5">0{{ $i + 1 }}</span>
              <div class="sm:col-span-11">
                <h3 class="text-xl font-bold leading-tight tracking-tight sm:text-[22px]">{{ $step[0] }}</h3>
                <p class="mt-2.5 max-w-xl text-[15px] leading-relaxed text-neutral-500">{{ $step[1] }}</p>
              </div>
            </li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>
</section>

@endsection
