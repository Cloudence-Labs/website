@extends('layouts.app')

@section('title', 'Industries — Cloudence')
@section('description', 'ICT solutions for government, education, healthcare, financial services, hospitality and media across Nigeria — software, networks and infrastructure shaped by the rules of each sector.')

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Industries', '/industries']]) !!}
  {!! \App\Support\Seo::page('CollectionPage', 'Industries', '/industries', 'Sectors Cloudence builds software and infrastructure for.') !!}
  {!! \App\Support\Seo::itemList(array_map(fn ($k, $i) => [$i['label'], '/industries/' . $k], array_keys(config('industries')), config('industries'))) !!}
@endpush

@php
  $industries = config('industries');
  $services   = collect(config('site.services'))->keyBy('slug');
  $waBook     = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");
@endphp

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">Industries</span>
          </div>
          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.5rem)] leading-[1.02] tracking-tightest font-bold">
            We know the sector<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">you work in.</span>
          </h1>
          <p class="mt-7 max-w-xl text-[17px] leading-relaxed text-graphite">
            Procurement rules, audit requirements, uptime obligations — the constraints differ by
            sector, and they shape the solution more than the technology does. Pick your sector to
            see the systems and apps we build for it.
          </p>
          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ $waBook }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Book a consultation
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
            <a href="{{ url('/services') }}"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Browse by service instead
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ INDUSTRY LIST ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid md:grid-cols-2 gap-5">
        @foreach ($industries as $slug => $ind)
          <a href="{{ url('/industries/' . $slug) }}"
             class="reveal group flex flex-col rounded-[22px] border border-mist bg-ivory p-8 lg:p-9 transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
             style="transition-delay:{{ ($loop->index % 2) * 0.06 }}s">
            <div class="flex items-start justify-between">
              <span class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center text-accent transition-colors group-hover:bg-accent group-hover:text-ivory">
                <span class="material-symbols-outlined text-[22px]">{{ $ind['icon'] }}</span>
              </span>
              <span class="eyebrow text-graphite/50">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
            </div>
            <h2 class="mt-7 text-[clamp(1.35rem,2vw,1.6rem)] leading-tight tracking-tightest font-bold">{{ $ind['label'] }}</h2>
            <p class="mt-3 text-[15px] leading-relaxed text-graphite">{{ $ind['description'] }}</p>

            <div class="mt-6 pt-6 border-t border-mist">
              <div class="eyebrow text-graphite/60">What we build</div>
              <div class="mt-3 flex flex-wrap gap-2">
                @foreach (array_slice($ind['solutions'], 0, 4) as $sol)
                  <span class="text-[12px] font-semibold tracking-wide border border-mist bg-paper rounded-full px-3 py-1.5 text-ink/75">{{ $sol[1] }}</span>
                @endforeach
                @if (count($ind['solutions']) > 4)
                  <span class="text-[12px] font-semibold tracking-wide rounded-full px-3 py-1.5 text-graphite">+{{ count($ind['solutions']) - 4 }} more</span>
                @endif
              </div>
            </div>

            <span class="mt-7 inline-flex items-center gap-2 text-[14px] font-semibold text-ink">
              <span class="link-underline">See how we work in {{ strtolower($ind['short']) }}</span>
              <span class="material-symbols-outlined text-[18px] text-accent transition-transform group-hover:translate-x-1">arrow_forward</span>
            </span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ WHY IT MATTERS ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-start">
        <div class="lg:col-span-5 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Why sector matters</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Same team, <span class="serif-it font-normal text-[1.06em] text-accent">different rules.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-md">
            A payment platform for a bank and a fee portal for a university share most of their
            code. What differs is who signs off, what the auditor asks for, and what happens when
            it goes down at 2am. We plan for those differences before we build.
          </p>
        </div>
        <div class="lg:col-span-7 grid sm:grid-cols-2 gap-4">
          @foreach ([
            ['gavel',       'Procurement fit',      'Fixed scope, fixed price and the documentation your procurement unit needs.'],
            ['fact_check',  'Audit-ready',          'Reports and trails that satisfy oversight bodies, regulators and boards.'],
            ['schedule',    'Uptime by design',     'Redundancy, power protection and response times matched to how you operate.'],
            ['device_hub',  'Whole stack',          'Software and the network, servers and security it runs on, from one team.'],
          ] as $i => $c)
            <div class="reveal flex items-start gap-5 rounded-[22px] border border-mist bg-paper p-7" style="transition-delay:{{ $i * 0.06 }}s">
              <span class="w-11 h-11 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink">
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

  @include('partials.cta')

@endsection
