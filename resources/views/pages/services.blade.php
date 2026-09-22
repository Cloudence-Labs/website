@extends('layouts.app')

@section('title', 'Services — Cloudence')
@section('description', 'Enterprise software, web and mobile development, networks, CCTV, IT consulting, hardware supply and training — delivered in-house by one accountable team across Nigeria.')

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
@endphp

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">What we do</span>
          </div>
          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.5rem)] leading-[1.02] tracking-tightest font-bold">
            {{ $words[$count] ?? $count }} service lines.<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">One accountable team.</span>
          </h1>
          <p class="mt-7 max-w-xl text-[17px] leading-relaxed text-graphite">
            Most clients start with one engagement and keep us on for the rest. Everything below is
            delivered in-house, by the same people who planned it — software, the infrastructure it
            runs on, and the people who will use it.
          </p>
          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ $waBook }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Book a consultation
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
            <a href="#services"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Browse services
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-y-0.5">arrow_downward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ SERVICE LIST ═══════════════ -->
  <section id="services" class="py-24 lg:py-32 bg-paper border-y border-mist scroll-mt-24">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid gap-5">
        @foreach ($services as $i => $s)
          @php $d = config('service-details.' . $s['slug']); $n = str_pad($i + 1, 2, '0', STR_PAD_LEFT); @endphp
          <a href="{{ url('/services/' . $s['slug']) }}"
             class="reveal group grid lg:grid-cols-12 gap-8 lg:gap-6 items-start rounded-[22px] border border-mist bg-ivory p-7 lg:p-9 transition-all duration-500 hover:border-ink/25 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
             style="transition-delay:{{ ($i % 2) * 0.06 }}s">
            <div class="lg:col-span-4 flex items-start gap-5">
              <span class="w-12 h-12 shrink-0 rounded-xl bg-accent/10 flex items-center justify-center text-accent transition-colors group-hover:bg-accent group-hover:text-ivory">
                <span class="material-symbols-outlined text-[22px]">{{ $s['icon'] }}</span>
              </span>
              <div>
                <span class="eyebrow text-graphite/50">{{ $n }}</span>
                <h2 class="mt-2 text-[clamp(1.35rem,2vw,1.6rem)] leading-tight tracking-tightest font-bold">{{ $s['label'] }}</h2>
              </div>
            </div>
            <div class="lg:col-span-5">
              <p class="text-[15px] leading-relaxed text-graphite">{{ $s['description'] }}</p>
              @if ($d)
                <div class="mt-5 flex flex-wrap gap-2">
                  @foreach (array_slice($d['includes'], 0, 4) as $inc)
                    <span class="text-[12px] font-semibold tracking-wide border border-mist bg-paper rounded-full px-3 py-1.5 text-ink/75">{{ $inc[1] }}</span>
                  @endforeach
                </div>
              @endif
            </div>
            <div class="lg:col-span-3 lg:pl-6 lg:border-l border-mist flex lg:flex-col lg:items-start justify-between lg:justify-start gap-4">
              @if ($d)
                <div class="text-[13px] text-graphite">
                  <span class="eyebrow text-graphite/60">Typically for</span>
                  <div class="mt-2 leading-relaxed">{{ $d['for'][0] }}</div>
                </div>
              @endif
              <span class="inline-flex items-center gap-2 text-[14px] font-semibold text-ink lg:mt-auto lg:pt-6">
                <span class="link-underline">Learn more</span>
                <span class="material-symbols-outlined text-[18px] text-accent transition-transform group-hover:translate-x-1">arrow_forward</span>
              </span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ HOW WE WORK ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">How we work</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Three stages, no <span class="serif-it font-normal text-[1.06em] text-accent">surprises.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-sm">
            Whatever the service, the shape of the engagement is the same: a written scope, visible
            progress, and support that does not end at handover.
          </p>
        </div>
        <div class="lg:col-span-8 grid md:grid-cols-3 gap-5">
          @foreach ([
            ['01', 'Consultation & planning', 'We start by understanding your goals and constraints, then set out a clear plan that ties the technology to the outcome you are paying for.'],
            ['02', 'Delivery & testing',      'We build or install against the agreed scope and test as we go, with checkpoints where you see progress rather than hear about it.'],
            ['03', 'Launch & support',        'We handle deployment, train your people, and stay on for updates and maintenance so the system keeps earning its keep.'],
          ] as $i => $p)
            <div class="reveal rounded-[22px] border border-mist bg-paper p-7 flex flex-col" style="transition-delay:{{ $i * 0.08 }}s">
              <div class="flex items-center justify-between">
                <span class="text-[2.2rem] leading-none font-bold tracking-tightest text-accent">{{ $p[0] }}</span>
                <span class="w-12 rule"></span>
              </div>
              <h3 class="mt-7 text-[18px] font-bold tracking-tight">{{ $p[1] }}</h3>
              <p class="mt-3 text-[14.5px] leading-relaxed text-graphite">{{ $p[2] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta')

@endsection
