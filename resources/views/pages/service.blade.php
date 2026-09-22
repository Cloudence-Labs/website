@extends('layouts.app')

@section('title', $service['label'] . ' — Cloudence')
@section('description', $service['description'])

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Services', '/services'], [$service['label'], '/services/' . $service['slug']]]) !!}
  {!! \App\Support\Seo::service($service, '/services/' . $service['slug']) !!}
  {!! \App\Support\Seo::faq($details['faqs']) !!}
@endpush

@php
  $all     = config('site.services');
  $index   = array_search($service['slug'], array_column($all, 'slug'));
  $n       = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
  $others  = array_values(array_filter($all, fn ($s) => $s['slug'] !== $service['slug']));
  $wa      = config('site.whatsapp');
  $waAsk   = $wa . '?text=' . rawurlencode("Hello Cloudence, I'd like to talk about " . strtolower($service['label']) . ".");
@endphp

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <nav class="reveal flex items-center gap-2 text-[13px] text-graphite" aria-label="Breadcrumb">
        <a href="{{ url('/services') }}" class="link-underline hover:text-ink transition-colors">Services</a>
        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
        <span class="text-ink font-medium">{{ $service['short'] }}</span>
      </nav>

      <div class="mt-10 grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-4">
            <span class="w-12 h-12 rounded-xl bg-accent flex items-center justify-center text-ivory">
              <span class="material-symbols-outlined text-[22px]">{{ $service['icon'] }}</span>
            </span>
            <span class="eyebrow text-graphite">Service {{ $n }} &nbsp;·&nbsp; {{ $service['label'] }}</span>
          </div>
          <h1 class="mt-7 text-[clamp(2.2rem,5.2vw,4.1rem)] leading-[1.04] tracking-tightest font-bold">
            {{ $details['heading'] }}<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">{{ $details['accent'] }}</span>
          </h1>
          <p class="mt-7 max-w-2xl text-[17px] leading-relaxed text-graphite">{{ $details['lead'] }}</p>
          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ $waAsk }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Talk to us about this
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
            <a href="{{ url('/work') }}"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              See related work
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ WHAT'S INCLUDED ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal max-w-2xl">
        <div class="flex items-center gap-3 text-graphite">
          <span class="w-9 rule"></span><span class="eyebrow">What's included</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          Everything the engagement <span class="serif-it font-normal text-[1.06em] text-accent">covers.</span>
        </h2>
      </div>
      <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($details['includes'] as $i => $inc)
          <div class="reveal group rounded-[22px] border border-mist bg-ivory p-7 flex flex-col transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
               style="transition-delay:{{ ($i % 3) * 0.06 }}s">
            <span class="w-11 h-11 rounded-full bg-paper border border-mist flex items-center justify-center text-ink transition-colors group-hover:bg-ink group-hover:text-ivory group-hover:border-ink">
              <span class="material-symbols-outlined text-[20px]">{{ $inc[0] }}</span>
            </span>
            <h3 class="mt-7 text-[17px] font-bold tracking-tight">{{ $inc[1] }}</h3>
            <p class="mt-2.5 text-[14.5px] leading-relaxed text-graphite">{{ $inc[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ WHO IT'S FOR / OUTCOMES ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-2 gap-5">
        <div class="reveal rounded-[22px] border border-mist bg-paper p-8 lg:p-10">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Who it's for</span>
          </div>
          <h2 class="mt-6 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold">
            Typically <span class="serif-it font-normal text-[1.06em] text-accent">commissioned by</span>
          </h2>
          <ul class="mt-7 space-y-3.5">
            @foreach ($details['for'] as $f)
              <li class="flex items-start gap-3 text-[15.5px] leading-relaxed text-graphite">
                <span class="mt-2 w-1.5 h-1.5 shrink-0 rounded-full bg-accent"></span>{{ $f }}
              </li>
            @endforeach
          </ul>
        </div>
        <div class="reveal rounded-[22px] bg-ink text-ivory p-8 lg:p-10 relative grain overflow-hidden" style="transition-delay:.08s">
          <div class="relative">
            <div class="flex items-center gap-3 text-ivory/50">
              <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">What you walk away with</span>
            </div>
            <h2 class="mt-6 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold">
              The <span class="serif-it font-normal text-[1.06em] text-accent">outcomes.</span>
            </h2>
            <ul class="mt-7 space-y-3.5">
              @foreach ($details['outcomes'] as $o)
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

  <!-- ═══════════════ PROCESS ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">How it works</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Three stages, no <span class="serif-it font-normal text-[1.06em] text-accent">surprises.</span>
          </h2>
        </div>
        <div class="lg:col-span-8 grid md:grid-cols-3 gap-5">
          @foreach ($details['process'] as $i => $p)
            <div class="reveal rounded-[22px] border border-mist bg-ivory p-7 flex flex-col" style="transition-delay:{{ $i * 0.08 }}s">
              <div class="flex items-center justify-between">
                <span class="text-[2.2rem] leading-none font-bold tracking-tightest text-accent">0{{ $i + 1 }}</span>
                <span class="w-12 rule"></span>
              </div>
              <h3 class="mt-7 text-[18px] font-bold tracking-tight">{{ $p[0] }}</h3>
              <p class="mt-3 text-[14.5px] leading-relaxed text-graphite">{{ $p[1] }}</p>
            </div>
          @endforeach
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
            @foreach ($details['faqs'] as $f)
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

  <!-- ═══════════════ OTHER SERVICES ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Other services</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Usually paired <span class="serif-it font-normal text-[1.06em] text-accent">with this.</span>
          </h2>
        </div>
        <a href="{{ url('/services') }}" class="group shrink-0 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
          <span class="link-underline">All services</span>
          <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
        </a>
      </div>
      <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach (array_slice($others, 0, 4) as $i => $o)
          <a href="{{ url('/services/' . $o['slug']) }}"
             class="reveal group flex flex-col rounded-[22px] border border-mist bg-ivory p-7 transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
             style="transition-delay:{{ $i * 0.06 }}s">
            <span class="w-11 h-11 rounded-xl bg-accent/10 flex items-center justify-center text-accent transition-colors group-hover:bg-accent group-hover:text-ivory">
              <span class="material-symbols-outlined text-[21px]">{{ $o['icon'] }}</span>
            </span>
            <h3 class="mt-7 text-[17px] leading-snug tracking-tight font-bold">{{ $o['label'] }}</h3>
            <p class="mt-2.5 text-[13.5px] leading-relaxed text-graphite flex-1">{{ $o['blurb'] }}</p>
            <span class="mt-6 inline-flex items-center gap-2 text-[13.5px] font-semibold text-ink">
              <span class="link-underline">Learn more</span>
              <span class="material-symbols-outlined text-[16px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
            </span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  @include('partials.cta')

@endsection
