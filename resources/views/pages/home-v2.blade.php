@extends('layouts.app')

@section('title', 'Cloudence — Build smart. Run steady. Grow bold.')
@section('description', 'Enterprise software, networks and ICT infrastructure for businesses and government institutions across Nigeria — designed, deployed and kept running by one accountable team.')
@section('robots', 'noindex, nofollow')
{{-- Own header and footer, no orange: see partials/v2 --}}
@section('bare', true)
@section('body_class', 'v2-body')

@push('head')
{{-- Kumbh Sans is used only for the hero subtext; everything else is Satoshi --}}
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;500&display=swap" rel="stylesheet">
@endpush

@push('styles')
  @vite('resources/js/home-v2.js')
@endpush

@php
  $wa     = config('site.whatsapp');
  $mail   = config('site.mail');
  $waBook = $wa . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a call.");

  $services   = config('site.services');
  $products   = config('products');
  $industries = config('industries');

  // Pastel panels, in rail order. No orange anywhere on this page.
  $pastels = ['#c9cef6', '#efe993', '#a08bab', '#c4e8d3', '#c3def4', '#f7d3dc', '#ddd2f7'];

  $cards = [
    'enterprise-software'    => ['Software',       'Payments, records and reporting platforms built around how your institution works.'],
    'web-development'        => ['Software',       'Fast corporate sites, portals and web apps your own team can maintain.'],
    'mobile-development'     => ['Software',       'Android and iOS apps for customers and field staff, released and supported.'],
    'cctv-installation'      => ['Security',       'Cameras, recording and remote viewing for offices, estates and public sites.'],
    'network-implementation' => ['Infrastructure', 'Structured cabling, wireless, switching and routing, installed and documented.'],
    'installation-supplies'  => ['Infrastructure', 'The equipment behind it all, sourced and installed by a single vendor.'],
    'training'               => ['People',         'Hands-on courses for end users, administrators and ICT teams, on site or online.'],
    'it-consulting'          => ['Advisory',       'Assessment, strategy and procurement advice before you build, buy or replace.'],
  ];

  $productTones = ['e-memo' => '#c9cef6', 'accountra' => '#c4e8d3', 'chatlify' => '#efe993'];

  $method = [
    ['listen', 'Listen first',  'We start with the problem, the people and the rules you work under: procurement, audit and uptime.', '#efe993'],
    ['scope',  'Fixed scope',   'A scope, a timeline and a price you can take to a board or a tender committee.',                     '#c4e8d3'],
    ['team',   'One team',      'Software and infrastructure from the same in-house engineers, so nobody passes the blame.',            '#c9cef6'],
    ['stay',   'We stay',       'Documentation, training and support that carry on well after handover. Most clients keep us on.',     '#ddd2f7'],
  ];

  $clients = [
    ['uee-akamkpa.png',   'University of Education & Entrepreneurship, Akamkpa'],
    ['crsubeb.png',       'Cross River State Universal Basic Education Board'],
    ['ncaa.png',          'Nigerian Civil Aviation Authority'],
    ['topratemfbank.png', 'Toprate Microfinance Bank'],
    ['billerhub.png',     'Billerhub'],
    ['bulwark.png',       'Bulwark Intelligence'],
    ['hskoncepts.png',    'HS Konceptz International'],
  ];
  $projects = [
    ['uee.png',            'University of Education & Entrepreneurship, Akamkpa', 'Portals and campus systems',     'Education'],
    ['topratepay.png',     'Toprate Pay',                                         'Consumer payments platform',     'Fintech'],
    ['billerhub.png',      'Billerhub',                                           'Bill payments and distribution', 'Payments'],
    ['toprate-bank.png',   'Toprate Microfinance Bank',                           'Banking systems and channels',   'Banking'],
    ['rechargefusion.png', 'Recharge Fusion',                                     'Airtime and data distribution',  'Payments'],
    ['ehs.png',            'Emmanuel Haulage Services',                           'Operations and fleet systems',   'Logistics'],
  ];
  // Company section: copy from the main landing page (opener + "one stack" chapters)
  $layers = [
    ['People',      'The team that keeps it running.', 'cast_for_education', '#ddd2f7'],
    ['Software',    'Systems people actually use.',    'terminal',           '#c9cef6'],
    ['Protection',  'Eyes on every entrance.',         'videocam',           '#c4e8d3'],
    ['Foundations', 'The cable beneath it all.',       'lan',                '#efe993'],
  ];
  $facts = [
    [count($services), 'service lines, one accountable team'],
    [count($products), 'products built and run by us'],
    [count(config('site.offices')), 'offices, in Abuja and Calabar'],
  ];
  $workTones   = ['#c9cef6', '#c4e8d3', '#efe993', '#f7d3dc', '#c3def4', '#ddd2f7'];
  $sectorIcons = ['Education' => 'school', 'Fintech' => 'account_balance_wallet', 'Payments' => 'payments', 'Banking' => 'account_balance', 'Logistics' => 'local_shipping'];
  $sectorTones = ['#c9cef6', '#efe993', '#c4e8d3', '#f7d3dc', '#c3def4', '#ddd2f7'];
@endphp

@section('content')
@include('partials.v2.nav')

<div id="v2" class="v2-pre">

  {{-- ═══════════════ HERO: copy left, service rail bleeding off the right edge ═══════════════ --}}
  <section id="v2-hero" class="v2-hero" data-carousel>
    <div class="v2-hero-grid">
      <div class="v2-hero-copy">
        <h1 class="v2-display">
          <span class="line"><span>Empowering growth</span></span>
          <span class="line"><span>through</span></span>
          <span class="line"><span>smart technology.</span></span>
        </h1>
        <p class="v2-sub mt-7 max-w-[26rem] text-[16.5px] leading-[1.6] text-[var(--k-ink-2)]" data-hero-fade>
          Software, networks and security systems for Nigerian businesses and government.
          Designed, installed and supported by one team.
        </p>
        <form data-lead-form data-wa="{{ $wa }}" class="mt-10 max-w-[22rem]" data-hero-fade>
          <label for="v2-email" class="text-[13px] font-medium text-[var(--k-ink-2)]">Work email</label>
          <input id="v2-email" name="email" type="email" required autocomplete="email" placeholder="you@organisation.ng" class="v2-input">
          <div class="mt-5 flex gap-3">
            <button type="submit" class="v2-btn v2-btn-ink flex-1" title="Opens WhatsApp with your email attached">Request a callback</button>
            <a href="mailto:{{ $mail }}" class="v2-btn v2-btn-soft !px-0 w-[52px]" aria-label="Email {{ $mail }}"><span class="material-symbols-outlined text-[20px]">mail</span></a>
          </div>
        </form>
      </div>

      <div class="v2-hero-rail" data-hero-rail>
        <div data-track class="v2-rail no-scrollbar">
          @foreach ($services as $i => $s)
            @php [$tag, $copy] = $cards[$s['slug']] ?? ['Service', $s['blurb']]; $tone = $pastels[$i % count($pastels)]; @endphp
            <a href="{{ url('/services/' . $s['slug']) }}" class="v2-card group" data-hero-card>
              <div class="flex items-center justify-between">
                <span class="v2-tag">{{ $tag }}</span>
                <span class="v2-arrow"><span class="material-symbols-outlined text-[18px]">arrow_outward</span></span>
              </div>
              <h3 class="v2-card-title">{{ $s['short'] }}</h3>
              <p class="mt-3 min-h-[3lh] text-[14px] leading-[1.55] text-[var(--k-ink-2)]">{{ $copy }}</p>
              <div class="v2-panel" style="background: {{ $tone }}">
                @include('partials.v2.scene', ['scene' => $s['slug'], 'bg' => $tone])
              </div>
            </a>
          @endforeach
        </div>
        <div class="v2-rail-controls" data-hero-fade>
          <div class="relative h-[3px] flex-1 overflow-hidden rounded-full bg-[var(--k-shell)]" aria-hidden="true"><span data-progress class="absolute left-0 top-0 h-full rounded-full bg-[var(--k-ink)] transition-transform duration-300 ease-out"></span></div>
          <button type="button" data-prev aria-label="Previous service" class="v2-iconbtn v2-iconbtn-line"><span class="material-symbols-outlined text-[20px]">arrow_back</span></button>
          <button type="button" data-next aria-label="Next service" class="v2-iconbtn v2-iconbtn-line"><span class="material-symbols-outlined text-[20px]">arrow_forward</span></button>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══════════════ CLIENT LOGOS ═══════════════ --}}
  <section class="v2-wrap pb-4 pt-6 lg:pt-4" aria-label="Clients">
    <p class="text-center text-[14px] text-[var(--k-ink-3)]" data-rise>Trusted by universities, regulators, banks and operators</p>
    <div class="mt-8 grid grid-cols-2 items-center gap-x-10 gap-y-8 sm:grid-cols-3 lg:grid-cols-6" data-rise>
      @foreach ($clients as $c)
        <img src="{{ asset('images/clients/' . $c[0]) }}" alt="{{ $c[1] }}" loading="lazy" class="v2-logo-mark mx-auto h-10 w-auto max-w-[140px] object-contain">
      @endforeach
    </div>
  </section>

  {{-- ═══════════════ COMPANY: who we are, with the "one stack" built from the ground up ═══════════════ --}}
  <section class="v2-wrap v2-section" id="v2-about">
    <div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-16">
      <div class="lg:col-span-6">
        <h2 class="v2-h2 max-w-[14ch]" data-rise>Technology that institutions run on.</h2>
        <p class="mt-6 max-w-[34rem] text-[17px] leading-[1.6] text-[var(--k-ink-2)]" data-rise>
          From the cabling beneath the floor to the software on every desk, Cloudence designs, deploys and keeps running
          the systems that businesses and government across Nigeria depend on.
        </p>
        <p class="mt-4 max-w-[34rem] text-[17px] leading-[1.6] text-[var(--k-ink-2)]" data-rise>
          Each layer is planned, built and supported by the same in-house team. Start anywhere; most clients end up with the whole stack.
        </p>
        <dl class="mt-10 grid max-w-[34rem] grid-cols-3 gap-4" data-rise>
          @foreach ($facts as [$n, $label])
            <div class="v2-fact">
              <dt class="sr-only">{{ $label }}</dt>
              <dd class="text-[clamp(2rem,3vw,2.6rem)] font-bold leading-none tracking-[-0.05em]">{{ $n }}</dd>
              <dd class="mt-2 text-[13.5px] leading-snug text-[var(--k-ink-2)]" aria-hidden="true">{{ $label }}</dd>
            </div>
          @endforeach
        </dl>
        <a href="{{ url('/about') }}" class="v2-btn v2-btn-line mt-10" data-rise>More about us <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>
      </div>
      <div class="lg:col-span-6">
        <div class="v2-stack" data-stack-build>
          @foreach ($layers as $i => [$title, $line, $icon, $tone])
            <div class="v2-layer" style="background: {{ $tone }}; --i: {{ $i }}" data-layer>
              <span class="v2-layer-icon"><span class="material-symbols-outlined text-[22px]">{{ $icon }}</span></span>
              <span class="min-w-0">
                <span class="block text-[19px] font-bold tracking-[-0.03em]">{{ $title }}</span>
                <span class="block text-[14px] text-[var(--k-ink)]/70">{{ $line }}</span>
              </span>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- ═══════════════ PRODUCTS: bento of three ═══════════════ --}}
  <section class="v2-wrap v2-section">
    <h2 class="v2-h2 max-w-[16ch]" data-rise>Software we run as products.</h2>
    <p class="mt-5 max-w-[34rem] text-[17px] leading-[1.6] text-[var(--k-ink-2)]" data-rise>Three platforms built for problems we kept meeting, hosted on our infrastructure and rolled out by our team.</p>
    <div class="v2-bento mt-14">
      @foreach ($products as $slug => $p)
        <a href="{{ url('/products/' . $slug) }}" class="v2-product group {{ $loop->first ? 'is-lead' : '' }}" style="background: {{ $productTones[$slug] ?? '#c9cef6' }}" data-rise>
          <div class="flex items-start justify-between gap-4">
            <div>
              <span class="v2-tag v2-tag-light">{{ $p['category'] }}</span>
              <h3 class="mt-5 text-[clamp(1.9rem,3vw,2.6rem)] font-bold leading-none tracking-[-0.045em]">{{ $p['name'] }}</h3>
              <p class="mt-3 max-w-[22rem] text-[15.5px] leading-[1.5] text-[var(--k-ink)]/75">{{ $p['tagline'] }}</p>
            </div>
            <span class="v2-arrow v2-arrow-light"><span class="material-symbols-outlined text-[18px]">arrow_outward</span></span>
          </div>
          <div class="v2-shot">
            <img src="{{ asset('images/products/' . $slug . '/' . $p['shots'][0]['file']) }}" alt="{{ $p['name'] }}, {{ $p['shots'][0]['title'] }}" loading="lazy" decoding="async">
          </div>
        </a>
      @endforeach
    </div>
  </section>

  {{-- ═══════════════ METHOD: step list driving an illustrated stage ═══════════════ --}}
  <section class="v2-wrap v2-section pt-0" data-steps>
    <div class="grid gap-10 lg:grid-cols-12 lg:gap-16">
      <div class="lg:col-span-5">
        <h2 class="v2-h2" data-rise>How a project runs.</h2>
        <div class="mt-10 flex flex-col gap-2" role="tablist" aria-label="How we work">
          @foreach ($method as $i => $m)
            <button type="button" role="tab" id="step-tab-{{ $i }}" aria-controls="step-panel" aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                    class="v2-step {{ $i === 0 ? 'is-active' : '' }}" data-step="{{ $i }}" data-tone="{{ $m[3] }}">
              <span class="v2-step-num">{{ $i + 1 }}</span>
              <span class="min-w-0 flex-1 text-left">
                <span class="block text-[clamp(1.35rem,2vw,1.7rem)] font-bold tracking-[-0.035em]">{{ $m[1] }}</span>
                <span class="v2-step-body"><span>{{ $m[2] }}</span></span>
              </span>
            </button>
          @endforeach
        </div>
      </div>
      <div class="lg:col-span-7" data-rise>
        <div id="step-panel" role="tabpanel" aria-labelledby="step-tab-0" class="v2-stage" style="background: {{ $method[0][3] }}">
          @foreach ($method as $i => $m)
            <div class="v2-stage-scene {{ $i === 0 ? 'is-active' : '' }}" data-scene="{{ $i }}">
              @include('partials.v2.scene', ['scene' => $m[0], 'bg' => $m[3]])
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- ═══════════════ WORK: two large, four small ═══════════════ --}}
  <section class="v2-band">
    <div class="v2-wrap v2-section">
      <h2 class="v2-h2 max-w-[18ch]" data-rise>Built by us. Still running.</h2>
      <div class="v2-work mt-14">
        @foreach ($projects as $i => $p)
          <article class="v2-work-item" data-work-card>
            <div class="flex items-center justify-between">
              <span class="v2-work-icon" style="background: {{ $workTones[$i % count($workTones)] }}"><span class="material-symbols-outlined text-[22px]">{{ $sectorIcons[$p[3]] ?? 'apartment' }}</span></span>
              <span class="v2-tag">{{ $p[3] }}</span>
            </div>
            <h3 class="mt-10 text-[clamp(1.35rem,1.9vw,1.6rem)] font-bold leading-[1.15] tracking-[-0.035em]">{{ $p[1] }}</h3>
            <p class="mt-2 text-[15px] leading-snug text-[var(--k-ink-2)]">{{ $p[2] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══════════════ SECTORS: chip cloud ═══════════════ --}}
  <section class="v2-wrap v2-section" id="v2-sectors">
    <h2 class="v2-h2 max-w-[20ch]" data-rise>We know the rules your sector runs on.</h2>
    <div class="mt-12 flex flex-wrap gap-3 lg:gap-4">
      @foreach ($industries as $slug => $ind)
        <a href="{{ url('/industries/' . $slug) }}" class="v2-chip" style="--tone: {{ $sectorTones[$loop->index % count($sectorTones)] }}" data-chip>
          <span class="v2-chip-icon"><span class="material-symbols-outlined text-[22px]">{{ $ind['icon'] ?? 'domain' }}</span></span>
          {{ $ind['label'] }}
          <span class="material-symbols-outlined v2-chip-arrow text-[20px]">arrow_outward</span>
        </a>
      @endforeach
    </div>
  </section>

  {{-- ═══════════════ CLOSING CTA ═══════════════ --}}
  <section class="v2-wrap pb-20 lg:pb-28">
    <div class="v2-cta" data-cta>
      <div class="grid gap-12 lg:grid-cols-12 lg:items-end">
        <div class="lg:col-span-7">
          <h2 class="v2-h2 max-w-[16ch]">Tell us what you are trying to fix.</h2>
          <p class="mt-5 max-w-[30rem] text-[17px] leading-[1.6] text-[var(--k-ink)]/75">We will come back with an honest view of scope, timeline and cost, including when the answer is that you don't need us.</p>
          <div class="mt-9 flex flex-wrap gap-3">
            <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v2-btn v2-btn-ink"><span class="material-symbols-outlined text-[18px]">calendar_month</span>Book a call</a>
            <a href="mailto:{{ $mail }}" class="v2-btn v2-btn-white">Email us</a>
          </div>
        </div>
        <div class="lg:col-span-5">
          <div class="v2-contact-card">
            <div class="v2-contact-row">
              <span class="v2-contact-icon"><span class="material-symbols-outlined text-[20px]">call</span></span>
              <span><span class="v2-contact-label">Phone</span>
                <a href="tel:{{ str_replace(' ', '', config('site.phone1')) }}" class="block font-bold">{{ config('site.phone1') }}</a>
                <a href="tel:{{ str_replace(' ', '', config('site.phone2')) }}" class="block font-bold">{{ config('site.phone2') }}</a></span>
            </div>
            <div class="v2-contact-row">
              <span class="v2-contact-icon"><span class="material-symbols-outlined text-[20px]">mail</span></span>
              <span><span class="v2-contact-label">Email</span>
                <a href="mailto:{{ $mail }}" class="block font-bold">{{ $mail }}</a>
                @if (config('site.mail2'))<a href="mailto:{{ config('site.mail2') }}" class="block text-[var(--k-ink-2)]">{{ config('site.mail2') }}</a>@endif</span>
            </div>
            <div class="v2-contact-row">
              <span class="v2-contact-icon"><span class="material-symbols-outlined text-[20px]">location_on</span></span>
              <span><span class="v2-contact-label">Offices</span>
                <span class="block font-bold">{{ collect(config('site.offices'))->pluck('city')->join(' and ') }}</span>
                <span class="block text-[var(--k-ink-2)]">We reply within one working day.</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

@include('partials.v2.footer')
@endsection
