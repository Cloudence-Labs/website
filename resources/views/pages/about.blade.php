@extends('layouts.app')

@section('title', 'About Cloudence — Your digital partner to business growth')
@section('description', 'Cloudence is an ICT company with offices in Abuja and Calabar, delivering enterprise software, networks and infrastructure for businesses and government institutions across Nigeria.')

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

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">About Cloudence</span>
          </div>

          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.5rem)] leading-[1.02] tracking-tightest font-bold">
            Your digital partner to<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">business growth.</span>
          </h1>

          <p class="mt-7 max-w-xl text-[17px] leading-relaxed text-graphite">
            Cloudence delivers innovative, reliable ICT solutions that let businesses and government
            institutions scale with confidence. From infrastructure to enterprise software, we work
            closely with each client to understand what they actually need, then build technology
            around it — efficient, productive, and sustainable well past handover.
          </p>

          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ $waBook }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Book a consultation
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
            <a href="{{ url('/work') }}"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              See our work
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════ STATS ═══════════════ -->
  <section class="py-20 lg:py-24 border-y border-mist bg-paper">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal grid grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 divide-mist lg:divide-x">
        @foreach ($stats as $s)
          <div class="lg:px-10 lg:first:pl-0">
            <div class="text-[clamp(2.6rem,5vw,3.75rem)] leading-none font-bold tracking-tightest">
              <span class="counter" data-target="{{ $s['value'] }}">0</span>{{ $s['suffix'] }}
            </div>
            <div class="mt-4 text-[13.5px] leading-relaxed text-graphite max-w-[10rem]">{{ $s['label'] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ MISSION & VISION ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Mission &amp; vision</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            More than a <span class="serif-it font-normal text-[1.06em] text-accent">service provider.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-sm">
            With a focus on trust, excellence and innovation, we set out to be a strategic partner in
            digital transformation — not just the vendor on the last purchase order.
          </p>
        </div>

        <div class="lg:col-span-8 grid md:grid-cols-2 gap-5">
          <div class="reveal rounded-[22px] bg-ink text-ivory p-8 lg:p-9 relative overflow-hidden grain">
            <div class="relative">
              <span class="w-11 h-11 rounded-full bg-ivory/10 border border-ivory/15 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">flag</span>
              </span>
              <div class="mt-7 eyebrow text-ivory/45">Our mission</div>
              <p class="mt-3 text-[20px] leading-snug font-semibold tracking-tight">
                To deliver innovative, reliable ICT solutions that let businesses and government
                institutions scale with confidence.
              </p>
              <p class="mt-4 text-[14.5px] leading-relaxed text-ivory/60">
                Technology that drives efficiency, productivity and sustainable growth — specified
                honestly, built properly, and supported for as long as it is in use.
              </p>
            </div>
          </div>
          <div class="reveal rounded-[22px] border border-mist bg-paper p-8 lg:p-9" style="transition-delay:.08s">
            <span class="w-11 h-11 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink">
              <span class="material-symbols-outlined text-[20px]">visibility</span>
            </span>
            <div class="mt-7 eyebrow text-graphite">Our vision</div>
            <p class="mt-3 text-[20px] leading-snug font-semibold tracking-tight">
              To be the technology partner that institutions across Nigeria trust to build and run
              the systems they depend on.
            </p>
            <p class="mt-4 text-[14.5px] leading-relaxed text-graphite">
              One accountable team for software and infrastructure, known for work that survives
              procurement, audit and the years after launch.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ VALUES ═══════════════ -->
  <section id="values" class="py-24 lg:py-32 bg-paper border-y border-mist scroll-mt-24">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal max-w-2xl">
        <div class="flex items-center gap-3 text-graphite">
          <span class="w-9 rule"></span><span class="eyebrow">Our values</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          What we hold <span class="serif-it font-normal text-[1.06em] text-accent">ourselves to.</span>
        </h2>
      </div>

      <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach ($values as $i => $v)
          <div class="reveal group rounded-[22px] border border-mist bg-ivory p-8 flex flex-col transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
               style="transition-delay:{{ $i * 0.07 }}s">
            <div class="flex items-center justify-between">
              <span class="text-[2.2rem] leading-none font-bold tracking-tightest text-accent">{{ $v[0] }}</span>
              <span class="w-11 h-11 rounded-full bg-paper border border-mist flex items-center justify-center text-ink transition-colors group-hover:bg-ink group-hover:text-ivory group-hover:border-ink">
                <span class="material-symbols-outlined text-[20px]">{{ $v[1] }}</span>
              </span>
            </div>
            <h3 class="mt-8 text-[19px] font-bold tracking-tight">{{ $v[2] }}</h3>
            <p class="mt-3 text-[14.5px] leading-relaxed text-graphite">{{ $v[3] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ WHY CLOUDENCE ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-start">
        <div class="lg:col-span-5 reveal lg:sticky lg:top-32">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Why Cloudence</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            One team, <span class="serif-it font-normal text-[1.06em] text-accent">accountable.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-md">
            Most ICT projects fail in the gaps between suppliers. We removed the gaps. The people who
            design your software are the same people who specify the network it runs on and answer
            the phone after launch.
          </p>
          <a href="{{ url('/services') }}" class="group mt-8 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
            <span class="link-underline">Explore our services</span>
            <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
          </a>
        </div>

        <div class="lg:col-span-7 grid gap-4">
          @foreach ($differences as $i => $d)
            <div class="reveal flex items-start gap-6 rounded-[22px] border border-mist bg-paper p-7 lg:p-8" style="transition-delay:{{ $i * 0.07 }}s">
              <span class="w-12 h-12 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink">
                <span class="material-symbols-outlined text-[22px]">{{ $d[0] }}</span>
              </span>
              <div>
                <h3 class="text-[18px] font-bold tracking-tight">{{ $d[1] }}</h3>
                <p class="mt-2 text-[15px] leading-relaxed text-graphite">{{ $d[2] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ OFFICES ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Where we are</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Two offices, <span class="serif-it font-normal text-[1.06em] text-accent">one team.</span>
          </h2>
        </div>
        <a href="{{ url('/contact') }}" class="group shrink-0 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
          <span class="link-underline">Get in touch</span>
          <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
        </a>
      </div>

      <div class="mt-16 grid md:grid-cols-2 gap-5">
        @foreach (config('site.offices') as $i => $o)
          <div class="reveal rounded-[22px] border border-mist bg-paper p-8 lg:p-9 flex flex-col" style="transition-delay:{{ $i * 0.08 }}s">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2 text-accent">
                <span class="material-symbols-outlined text-[20px]">location_on</span>
                <span class="text-[22px] font-bold tracking-tight text-ink">{{ $o['city'] }}</span>
              </div>
              <span class="eyebrow text-graphite/60">{{ $i === 0 ? 'Head office' : 'Regional office' }}</span>
            </div>
            <p class="mt-5 text-[16px] leading-relaxed text-graphite">{{ $o['address'] }}</p>
            <div class="mt-7 pt-6 border-t border-mist flex flex-wrap items-center gap-x-6 gap-y-3 text-[14px]">
              <a href="tel:{{ str_replace(' ', '', $o['phone']) }}" class="inline-flex items-center gap-2 font-semibold text-ink">
                <span class="material-symbols-outlined text-[18px] text-graphite">call</span>
                <span class="link-underline">{{ $o['phone'] }}</span>
              </a>
              <a href="mailto:{{ $mail }}" class="inline-flex items-center gap-2 font-semibold text-ink">
                <span class="material-symbols-outlined text-[18px] text-graphite">mail</span>
                <span class="link-underline">{{ $mail }}</span>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  @include('partials.cta')

@endsection
