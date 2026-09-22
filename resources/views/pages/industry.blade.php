@extends('layouts.app')

@section('title', $industry['label'] . ' — Industries — Cloudence')
@section('description', $industry['description'])

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Industries', '/industries'], [$industry['label'], '/industries/' . $slug]]) !!}
  {!! \App\Support\Seo::page('WebPage', $industry['label'] . ' ICT solutions', '/industries/' . $slug, $industry['description']) !!}
  {!! \App\Support\Seo::faq($industry['faqs']) !!}
@endpush

@php
  $all      = config('industries');
  $services = collect(config('site.services'))->keyBy('slug');
  $others   = array_filter($all, fn ($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);
  $n        = str_pad(array_search($slug, array_keys($all)) + 1, 2, '0', STR_PAD_LEFT);
  $waAsk    = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to talk about ICT solutions for " . strtolower($industry['label']) . ".");
@endphp

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <nav class="reveal flex items-center gap-2 text-[13px] text-graphite" aria-label="Breadcrumb">
        <a href="{{ url('/industries') }}" class="link-underline hover:text-ink transition-colors">Industries</a>
        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
        <span class="text-ink font-medium">{{ $industry['short'] }}</span>
      </nav>

      <div class="mt-10 grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-4">
            <span class="w-12 h-12 rounded-xl bg-accent flex items-center justify-center text-ivory">
              <span class="material-symbols-outlined text-[22px]">{{ $industry['icon'] }}</span>
            </span>
            <span class="eyebrow text-graphite">Industry {{ $n }} &nbsp;·&nbsp; {{ $industry['label'] }}</span>
          </div>
          <h1 class="mt-7 text-[clamp(2.2rem,5.2vw,4.1rem)] leading-[1.04] tracking-tightest font-bold">
            {{ $industry['heading'] }}<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">{{ $industry['accent'] }}</span>
          </h1>
          <p class="mt-7 max-w-2xl text-[17px] leading-relaxed text-graphite">{{ $industry['lead'] }}</p>
          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ $waAsk }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Talk to us about your sector
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
            <a href="#solutions"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              What we build
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-y-0.5">arrow_downward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ CHALLENGES ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">What's different here</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            The constraints we <span class="serif-it font-normal text-[1.06em] text-accent">design around.</span>
          </h2>
        </div>
        <div class="lg:col-span-8 grid sm:grid-cols-2 gap-4">
          @foreach ($industry['challenges'] as $i => $c)
            <div class="reveal flex items-start gap-5 rounded-[22px] border border-mist bg-ivory p-7" style="transition-delay:{{ $i * 0.06 }}s">
              <span class="w-11 h-11 shrink-0 rounded-full bg-paper border border-mist flex items-center justify-center text-ink">
                <span class="material-symbols-outlined text-[20px]">{{ $c[0] }}</span>
              </span>
              <div>
                <h3 class="text-[16.5px] font-bold tracking-tight">{{ $c[1] }}</h3>
                <p class="mt-2 text-[14px] leading-relaxed text-graphite">{{ $c[2] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ SOLUTIONS ═══════════════ -->
  <section id="solutions" class="py-24 lg:py-32 scroll-mt-24">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">What we build for {{ strtolower($industry['short']) }}</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Systems and apps we provide, <span class="serif-it font-normal text-[1.06em] text-accent">or can.</span>
          </h2>
        </div>
        <p class="lg:max-w-sm text-[15px] leading-relaxed text-graphite">
          Some of these are live with clients today. Others we have the team and the track record
          to build. Each links to the service line behind it.
        </p>
      </div>

      <div class="mt-16 grid md:grid-cols-2 gap-4">
        @foreach ($industry['solutions'] as $i => $sol)
          @php $svc = $services[$sol[3]] ?? null; @endphp
          <div class="reveal group flex items-start gap-5 rounded-[22px] border border-mist bg-paper p-7 transition-all duration-500 hover:border-ink/25 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
               style="transition-delay:{{ ($i % 2) * 0.06 }}s">
            <span class="w-12 h-12 shrink-0 rounded-xl bg-accent/10 flex items-center justify-center text-accent transition-colors group-hover:bg-accent group-hover:text-ivory">
              <span class="material-symbols-outlined text-[22px]">{{ $sol[0] }}</span>
            </span>
            <div class="min-w-0 flex-1">
              <h3 class="text-[17px] font-bold tracking-tight">{{ $sol[1] }}</h3>
              <p class="mt-2 text-[14.5px] leading-relaxed text-graphite">{{ $sol[2] }}</p>
              @if ($svc)
                <a href="{{ url('/services/' . $svc['slug']) }}" class="group/svc mt-4 inline-flex items-center gap-2 text-[12.5px] font-semibold text-ink">
                  <span class="material-symbols-outlined text-[16px] text-graphite">{{ $svc['icon'] }}</span>
                  <span class="link-underline">{{ $svc['short'] }}</span>
                  <span class="material-symbols-outlined text-[15px] text-accent transition-transform group-hover/svc:translate-x-0.5">arrow_forward</span>
                </a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ SERVICE LINES / OUTCOMES ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-5">
        <div class="lg:col-span-7 reveal rounded-[22px] border border-mist bg-ivory p-8 lg:p-10">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Service lines involved</span>
          </div>
          <h2 class="mt-6 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold">
            Delivered by <span class="serif-it font-normal text-[1.06em] text-accent">one team.</span>
          </h2>
          <div class="mt-7 grid sm:grid-cols-2 gap-2.5">
            @foreach ($industry['services'] as $slugRef)
              @php $svc = $services[$slugRef] ?? null; @endphp
              @if ($svc)
                <a href="{{ url('/services/' . $svc['slug']) }}" class="group flex items-center gap-3.5 rounded-[14px] bg-paper border border-mist px-4 py-3.5 transition-colors hover:border-ink/30">
                  <span class="w-9 h-9 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink transition-colors group-hover:bg-ink group-hover:text-ivory group-hover:border-ink">
                    <span class="material-symbols-outlined text-[18px]">{{ $svc['icon'] }}</span>
                  </span>
                  <span class="text-[14px] font-semibold text-ink leading-snug">{{ $svc['label'] }}</span>
                  <span class="material-symbols-outlined text-[16px] text-graphite ml-auto transition-transform group-hover:translate-x-0.5">arrow_forward</span>
                </a>
              @endif
            @endforeach
          </div>
        </div>
        <div class="lg:col-span-5 reveal rounded-[22px] bg-ink text-ivory p-8 lg:p-10 relative grain overflow-hidden" style="transition-delay:.08s">
          <div class="relative">
            <div class="flex items-center gap-3 text-ivory/50">
              <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">What you walk away with</span>
            </div>
            <h2 class="mt-6 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold">
              The <span class="serif-it font-normal text-[1.06em] text-accent">outcomes.</span>
            </h2>
            <ul class="mt-7 space-y-3.5">
              @foreach ($industry['outcomes'] as $o)
                <li class="flex items-start gap-3 text-[15.5px] leading-relaxed text-ivory/75">
                  <span class="material-symbols-outlined text-[20px] text-accent shrink-0">check_circle</span>{{ $o }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ FAQ ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Common questions</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Before you <span class="serif-it font-normal text-[1.06em] text-accent">ask.</span>
          </h2>
          <p class="mt-7 text-[15.5px] leading-relaxed text-graphite max-w-sm">
            Anything else, <a href="{{ $waAsk }}" target="_blank" rel="noopener" class="link-underline font-semibold text-ink">message us on WhatsApp</a> and a person will reply.
          </p>
        </div>
        <div class="lg:col-span-8 reveal">
          <div class="divide-y divide-mist border-y border-mist">
            @foreach ($industry['faqs'] as $f)
              <details class="group py-5">
                <summary class="flex items-center justify-between gap-6 cursor-pointer list-none text-[17px] font-bold tracking-tight">
                  {{ $f[0] }}
                  <span class="w-9 h-9 shrink-0 rounded-full border border-mist flex items-center justify-center text-ink transition-all group-open:bg-ink group-open:text-ivory group-open:rotate-45">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                  </span>
                </summary>
                <p class="mt-4 max-w-2xl text-[15px] leading-relaxed text-graphite">{{ $f[1] }}</p>
              </details>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ OTHER INDUSTRIES ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Other industries</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Also <span class="serif-it font-normal text-[1.06em] text-accent">working in.</span>
          </h2>
        </div>
        <a href="{{ url('/industries') }}" class="group shrink-0 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
          <span class="link-underline">All industries</span>
          <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
        </a>
      </div>
      <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
        @foreach ($others as $k => $o)
          <a href="{{ url('/industries/' . $k) }}"
             class="reveal group flex flex-col rounded-[22px] border border-mist bg-ivory p-6 transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
             style="transition-delay:{{ $loop->index * 0.05 }}s">
            <span class="material-symbols-outlined text-[24px] text-accent">{{ $o['icon'] }}</span>
            <h3 class="mt-5 text-[16px] leading-snug tracking-tight font-bold">{{ $o['label'] }}</h3>
            <p class="mt-2 text-[13px] leading-relaxed text-graphite flex-1">{{ $o['blurb'] }}</p>
            <span class="mt-5 material-symbols-outlined text-[18px] text-graphite transition-all group-hover:text-accent group-hover:translate-x-1">arrow_forward</span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  @include('partials.cta')

@endsection
