@extends('layouts.v3')

@section('title', $service['label'] . ' — Cloudence')
@section('description', $service['description'])

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Services', '/services'], [$service['label'], '/services/' . $service['slug']]]) !!}
  {!! \App\Support\Seo::service($service, '/services/' . $service['slug']) !!}
  {!! \App\Support\Seo::faq($details['faqs']) !!}
@endpush

@php
  $all    = config('site.services');
  $index  = array_search($service['slug'], array_column($all, 'slug'));
  $n      = sprintf('%02d', $index + 1);
  $others = array_values(array_filter($all, fn ($s) => $s['slug'] !== $service['slug']));
  $wa     = config('site.whatsapp');
  $waAsk  = $wa . '?text=' . rawurlencode("Hello Cloudence, I'd like to talk about " . strtolower($service['label']) . ".");
  $words  = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six'];
  $arrow  = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
@endphp

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-12 pt-14 lg:pb-16 lg:pt-24">
  <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 text-sm font-medium text-neutral-500">
    <a href="{{ url('/services') }}" class="hover:text-[var(--blue)]">Services</a>
    <span aria-hidden="true" class="text-neutral-300">/</span>
    <span>Service {{ $n }}</span>
  </nav>
  <div class="mt-10 flex items-center gap-4">
    <span class="v3-icon"><span class="material-symbols-outlined">{{ $service['icon'] }}</span></span>
    <span class="v3-eyebrow">{{ $service['label'] }}</span>
  </div>
  <h1 class="v3-h1 mt-6 max-w-4xl">
    {{ $details['heading'] }} <span class="v3-accent">{{ $details['accent'] }}</span>
  </h1>
  <p class="v3-lead mt-8 max-w-2xl">{{ $details['lead'] }}</p>
  <div class="mt-10 flex flex-wrap items-center gap-3">
    <a href="{{ $waAsk }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">
      Talk to us about this {!! $arrow !!}
    </a>
    <a href="{{ url('/contact') }}" class="v3-btn v3-btn-line">Contact us</a>
  </div>
</section>

{{-- ── Photo ────────────────────────────────────────────── --}}
<div class="v3-wrap pb-20 lg:pb-28">
  <img src="{{ asset('images/services/' . $service['slug'] . '.jpg') }}" alt="{{ $service['label'] }}" decoding="async" class="aspect-[4/3] w-full bg-neutral-100 object-cover sm:aspect-[21/9]">
</div>

{{-- ── What's included ──────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">What's included</p>
        <h2 class="v3-h2 mt-4">Everything the engagement <span class="v3-accent">covers.</span></h2>
      </div>
      <p class="v3-muted max-w-sm text-[15px] leading-relaxed">{{ $service['description'] }}</p>
    </div>
    <div class="mt-14 grid gap-6 md:grid-cols-2 lg:mt-16 lg:grid-cols-3">
      @foreach ($details['includes'] as $i => $inc)
        <div class="v3-card reveal flex flex-col p-7 lg:p-8" style="--d:{{ ($i % 3) * 0.06 }}s">
          <div class="flex items-start justify-between">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $inc[0] }}</span></span>
            <span class="text-xs font-medium tabular-nums text-neutral-400">{{ sprintf('%02d', $i + 1) }}</span>
          </div>
          <h3 class="v3-h3 mt-8">{{ $inc[1] }}</h3>
          <p class="mt-3 text-[15px] leading-relaxed text-neutral-500">{{ $inc[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── Who it's for / outcomes ──────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-16 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">Who it's for</p>
        <h2 class="v3-h2 mt-4">Typically <span class="v3-accent">commissioned by</span></h2>
        <ul class="mt-10 border-t border-neutral-200">
          @foreach ($details['for'] as $i => $f)
            <li class="flex items-start gap-5 border-b border-neutral-100 py-5">
              <span class="pt-1 text-xs font-medium tabular-nums text-neutral-400">0{{ $i + 1 }}</span>
              <span class="text-base font-bold leading-snug tracking-tight">{{ $f }}</span>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="reveal lg:col-span-7" style="--d:.1s">
        <p class="v3-eyebrow">What you walk away with</p>
        <h2 class="v3-h2 mt-4">The <span class="v3-accent">outcomes.</span></h2>
        <div class="mt-10 grid gap-4 sm:grid-cols-2">
          @foreach ($details['outcomes'] as $o)
            <div class="v3-card flex items-start gap-4 p-6 lg:p-7">
              <span class="material-symbols-outlined shrink-0 text-[24px] text-[var(--blue)]">task_alt</span>
              <p class="text-base font-bold leading-snug tracking-tight">{{ $o }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── Process ──────────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">How it works</p>
        <h2 class="v3-h2 mt-4">{{ $words[count($details['process'])] ?? count($details['process']) }} stages, <span class="v3-accent">no surprises.</span></h2>
        <p class="v3-lead mt-7 max-w-md">A written scope, visible progress, and support that does not end at handover.</p>
      </div>
      <div class="reveal lg:col-span-7" style="--d:.1s">
        <ol class="border-t border-neutral-200">
          @foreach ($details['process'] as $i => $step)
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

{{-- ── FAQ ──────────────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">Common questions</p>
        <h2 class="v3-h2 mt-4">Before you <span class="v3-accent">ask.</span></h2>
        <p class="mt-7 max-w-sm text-[15px] leading-relaxed text-neutral-500">
          Anything else, <a href="{{ $waAsk }}" target="_blank" rel="noopener" class="font-medium text-[var(--ink)] underline decoration-neutral-300 underline-offset-4 hover:text-neutral-500 hover:decoration-[var(--blue)]">message us on WhatsApp</a> and a person will reply.
        </p>
      </div>
      <div class="reveal lg:col-span-7" style="--d:.1s">
        <div class="border-t border-neutral-200">
          @foreach ($details['faqs'] as $f)
            <details class="group border-b border-neutral-100">
              <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-6 text-[17px] font-bold tracking-tight hover:text-neutral-500 [&::-webkit-details-marker]:hidden">
                {{ $f[0] }}
                <span class="material-symbols-outlined shrink-0 text-[22px] text-neutral-400 transition-transform duration-300 group-open:rotate-180">expand_more</span>
              </summary>
              <p class="max-w-2xl pb-6 text-[15px] leading-relaxed text-neutral-500">{{ $f[1] }}</p>
            </details>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── Other services ───────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">Other services</p>
        <h2 class="v3-h2 mt-4">Usually paired <span class="v3-accent">with this.</span></h2>
      </div>
      <a href="{{ url('/services') }}" class="inline-flex shrink-0 items-center gap-2 self-start border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500 lg:self-auto">
        All services {!! $arrow !!}
      </a>
    </div>
    <div class="mt-12 border-t border-neutral-200">
      @foreach ($others as $o)
        <a href="{{ url('/services/' . $o['slug']) }}" class="group grid grid-cols-[auto_1fr_auto] items-center gap-4 border-b border-neutral-100 py-5 sm:gap-6 lg:grid-cols-[2.5rem_6rem_1fr_1fr_auto]">
          <span class="hidden text-xs font-medium tabular-nums text-neutral-400 lg:block">{{ sprintf('%02d', $loop->iteration) }}</span>
          <span class="relative block h-12 w-16 overflow-hidden bg-neutral-100 sm:h-14 sm:w-20 lg:h-16 lg:w-24">
            <img src="{{ asset('images/services/' . $o['slug'] . '.jpg') }}" alt="" loading="lazy" decoding="async" class="v3-photo absolute inset-0 h-full w-full object-cover">
          </span>
          <span class="min-w-0">
            <span class="flex items-center gap-2.5 text-[17px] font-bold leading-snug tracking-tight group-hover:text-neutral-500 sm:text-[19px]">
              <span class="material-symbols-outlined hidden text-[22px] text-[var(--blue)] sm:inline">{{ $o['icon'] }}</span>{{ $o['label'] }}
            </span>
            <span class="mt-0.5 block text-[13.5px] leading-snug text-neutral-500 lg:hidden">{{ $o['blurb'] }}</span>
          </span>
          <span class="hidden text-sm leading-snug text-neutral-500 lg:block">{{ $o['blurb'] }}</span>
          <span class="flex h-8 w-8 items-center justify-center border border-neutral-200 transition-colors group-hover:border-neutral-500 group-hover:bg-[var(--blue)] group-hover:text-white">{!! $arrow !!}</span>
        </a>
      @endforeach
    </div>
  </div>
</section>

@endsection
