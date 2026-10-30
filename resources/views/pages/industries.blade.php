@extends('layouts.v3')

@section('title', 'Industries — Cloudence')
@section('description', 'ICT solutions for government, education, healthcare, financial services, hospitality and media across Nigeria — software, networks and infrastructure shaped by the rules of each sector.')

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Industries', '/industries']]) !!}
  {!! \App\Support\Seo::page('CollectionPage', 'Industries', '/industries', 'Sectors Cloudence builds software and infrastructure for.') !!}
  {!! \App\Support\Seo::itemList(array_map(fn ($k, $i) => [$i['label'], '/industries/' . $k], array_keys(config('industries')), config('industries'))) !!}
@endpush

@php
  $industries = config('industries');
  $waBook     = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");
  $why = [
    ['gavel',       'Procurement fit',  'Fixed scope, fixed price and the documentation your procurement unit needs.'],
    ['fact_check',  'Audit-ready',      'Reports and trails that satisfy oversight bodies, regulators and boards.'],
    ['schedule',    'Uptime by design', 'Redundancy, power protection and response times matched to how you operate.'],
    ['device_hub',  'Whole stack',      'Software and the network, servers and security it runs on, from one team.'],
  ];
  $arrow = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
@endphp

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-16 pt-14 lg:pb-24 lg:pt-24">
  <p class="v3-eyebrow reveal">Industries</p>
  <h1 class="v3-h1 reveal mt-4 max-w-4xl">We know the sector <span class="v3-accent">you work in.</span></h1>
  <p class="v3-lead reveal mt-8 max-w-xl" style="--d:.1s">
    Procurement rules, audit requirements, uptime obligations — the constraints differ by
    sector, and they shape the solution more than the technology does. Pick your sector to
    see the systems and apps we build for it.
  </p>
  <div class="reveal mt-10 flex flex-wrap gap-3" style="--d:.2s">
    <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">Book a consultation {!! $arrow !!}</a>
    <a href="{{ url('/contact') }}" class="v3-btn v3-btn-line">Contact us</a>
  </div>
</section>

{{-- ── Industry list ────────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="reveal flex flex-wrap items-end justify-between gap-6">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">{{ count($industries) }} sectors</p>
        <h2 class="v3-h2 mt-3">Pick your sector.</h2>
      </div>
      <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">
        Browse by service instead {!! $arrow !!}
      </a>
    </div>

    <ol class="mt-12 border-t border-neutral-200 lg:mt-16">
      @foreach ($industries as $slug => $ind)
        <li class="reveal" style="--d:{{ ($loop->index % 2) * 0.06 }}s">
          <a href="{{ url('/industries/' . $slug) }}" class="group grid grid-cols-[auto_1fr_auto] gap-x-5 gap-y-5 border-b border-neutral-100 py-8 transition-colors hover:bg-neutral-50 sm:gap-x-6 lg:grid-cols-12 lg:gap-x-8 lg:py-10">
            <span class="pt-1 text-xs font-medium tabular-nums text-neutral-400 lg:col-span-1">{{ sprintf('%02d', $loop->iteration) }}</span>
            <span class="min-w-0 lg:col-span-4">
              <span class="v3-icon"><span class="material-symbols-outlined">{{ $ind['icon'] }}</span></span>
              <span class="mt-5 block text-2xl font-black leading-[1.08] tracking-[-0.02em] transition-colors group-hover:text-neutral-500 sm:text-3xl">{{ $ind['label'] }}</span>
              <span class="mt-2 block text-sm text-neutral-400">{{ $ind['blurb'] }}</span>
            </span>
            <span class="flex h-9 w-9 items-center justify-center border border-neutral-200 transition-colors group-hover:border-[var(--ink)] group-hover:bg-[var(--ink)] group-hover:text-white lg:order-last lg:col-span-1 lg:justify-self-end">{!! $arrow !!}</span>
            <span class="col-span-full min-w-0 lg:col-span-6 lg:pt-1">
              <span class="block max-w-xl text-[15px] leading-relaxed text-neutral-500">{{ $ind['description'] }}</span>
              <span class="mt-5 flex flex-wrap gap-2">
                @foreach (array_slice($ind['solutions'], 0, 4) as $sol)<span class="border border-neutral-200 px-2.5 py-1 text-xs font-medium text-neutral-600">{{ $sol[1] }}</span>@endforeach
                @if (count($ind['solutions']) > 4)<span class="inline-flex items-center px-1 text-xs font-medium text-neutral-400">+{{ count($ind['solutions']) - 4 }} more</span>@endif
              </span>
              <span class="mt-6 inline-flex items-center gap-2 text-sm font-medium text-[var(--ink)] group-hover:text-neutral-500">See how we work in {{ strtolower($ind['short']) }} {!! $arrow !!}</span>
            </span>
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</section>

{{-- ── Why sector matters ───────────────────────────────── --}}
<section class="v3-rule bg-neutral-50">
  <div class="v3-wrap v3-section">
    <div class="grid items-start gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-5">
        <p class="v3-eyebrow">Why sector matters</p>
        <h2 class="v3-h2 mt-3">Same team, different rules.</h2>
        <p class="mt-7 max-w-md text-base leading-relaxed text-neutral-500 sm:text-lg">
          A payment platform for a bank and a fee portal for a university share most of their
          code. What differs is who signs off, what the auditor asks for, and what happens when
          it goes down at 2am. We plan for those differences before we build.
        </p>
      </div>
      <div class="grid gap-px border border-neutral-200 bg-neutral-200 sm:grid-cols-2 lg:col-span-7">
        @foreach ($why as $i => $c)
          <div class="reveal bg-white p-7 lg:p-8" style="--d:{{ $i * 0.06 }}s">
            <span class="v3-icon"><span class="material-symbols-outlined">{{ $c[0] }}</span></span>
            <h3 class="mt-6 text-lg font-bold leading-tight tracking-tight">{{ $c[1] }}</h3>
            <p class="mt-2 text-[15px] leading-relaxed text-neutral-500">{{ $c[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection
