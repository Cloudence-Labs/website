@extends('layouts.app')

@section('title', 'Page not found — ' . config('site.name'))
@section('robots', 'noindex, nofollow')
@section('description', 'The page you were looking for could not be found. Head back to the Cloudence home page or get in touch with our team.')

@php
  $links = [
    ['url' => '/services',   'icon' => 'terminal',        'label' => 'Services',   'blurb' => 'Software, networks, surveillance and consulting'],
    ['url' => '/work',       'icon' => 'rocket_launch',   'label' => 'Our work',   'blurb' => 'Platforms we have built and still support'],
    ['url' => '/industries', 'icon' => 'account_balance', 'label' => 'Industries', 'blurb' => 'Government, education, finance and more'],
    ['url' => '/insights',   'icon' => 'article',         'label' => 'Blog',       'blurb' => 'Notes on delivery, procurement and systems'],
  ];
  $path = '/' . ltrim(request()->path(), '/');
@endphp

@section('content')

  <section class="relative grain overflow-hidden min-h-[100svh] flex items-center pt-32 pb-24 lg:pt-36 lg:pb-28">

    <!-- Watermark numeral -->
    <div aria-hidden="true" class="pointer-events-none select-none absolute inset-0 flex items-center justify-center lg:justify-start lg:pl-[4vw]">
      <span class="serif-it leading-none tracking-tightest text-ink/[.045] text-[clamp(16rem,44vw,40rem)] translate-y-[6%]">404</span>
    </div>

    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10 w-full">
      <div class="grid lg:grid-cols-12 gap-14 lg:gap-10 items-center">

        <!-- Copy -->
        <div class="lg:col-span-7 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">Error 404</span>
          </div>

          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.5rem)] leading-[1.02] tracking-tightest font-bold">
            This page has gone<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">offline.</span>
          </h1>

          <p class="mt-7 max-w-lg text-[17px] leading-relaxed text-graphite">
            The link may be out of date, the address mistyped, or the page moved while we were
            rebuilding. Nothing here is broken — it just isn't where you were sent.
          </p>

          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ url('/') }}"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:-translate-x-0.5">arrow_back</span>
              Back to home
            </a>
            <a href="{{ url('/contact') }}"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Talk to us
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
          </div>

          <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 text-[13px] text-graphite">
            <span class="inline-flex items-center gap-2.5 rounded-full border border-mist bg-paper px-3.5 py-1.5 font-semibold text-ink">
              <span class="relative flex h-2 w-2">
                <span class="absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75 animate-ping"></span>
                <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
              </span>
              Everything else is running
            </span>
            <span class="inline-flex items-center gap-2 min-w-0">
              <span class="material-symbols-outlined text-[18px]">link_off</span>
              <span class="truncate">We looked for <span class="font-mono text-ink">{{ $path }}</span> and found nothing there.</span>
            </span>
          </div>
        </div>

        <!-- Quick links card -->
        <div class="lg:col-span-5 reveal reveal-fade" style="transition-delay:.12s">
          <div class="rounded-[22px] border border-mist bg-paper p-2.5 shadow-[0_40px_90px_-50px_rgba(20,20,20,.45)]">
            <div class="px-5 pt-5 pb-3">
              <div class="eyebrow text-graphite">Where to next</div>
            </div>
            <ul class="grid gap-0.5">
              @foreach ($links as $l)
                <li>
                  <a href="{{ url($l['url']) }}" class="group/item flex items-center gap-4 rounded-[14px] px-4 py-3.5 transition-colors hover:bg-ivory">
                    <span class="w-10 h-10 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink transition-colors group-hover/item:bg-ink group-hover/item:text-ivory group-hover/item:border-ink">
                      <span class="material-symbols-outlined text-[19px]">{{ $l['icon'] }}</span>
                    </span>
                    <span class="min-w-0 flex-1">
                      <span class="block text-[15px] font-semibold text-ink leading-snug">{{ $l['label'] }}</span>
                      <span class="block mt-0.5 text-[12.5px] text-graphite leading-snug">{{ $l['blurb'] }}</span>
                    </span>
                    <span class="material-symbols-outlined text-[18px] text-graphite transition-all group-hover/item:text-accent group-hover/item:translate-x-1">arrow_forward</span>
                  </a>
                </li>
              @endforeach
            </ul>
            <div class="mt-1.5 mx-2.5 mb-2.5 rounded-[14px] bg-ink text-ivory px-5 py-4 flex items-center justify-between gap-4">
              <div class="min-w-0">
                <div class="text-[13px] font-semibold">Need a hand finding something?</div>
                <div class="mt-0.5 text-[12.5px] text-ivory/60">Message us on WhatsApp and we'll point you the right way.</div>
              </div>
              <a href="{{ config('site.whatsapp') }}?text={{ rawurlencode("Hello Cloudence, I was looking for " . url($path) . " and it wasn't there.") }}"
                 target="_blank" rel="noopener" aria-label="Message Cloudence on WhatsApp"
                 class="shrink-0 w-10 h-10 rounded-full bg-ivory text-ink flex items-center justify-center hover:bg-accent hover:text-ivory transition-colors">
                <span class="material-symbols-outlined text-[18px]">chat</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
