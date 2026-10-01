@extends('layouts.app')

@section('title', 'Products — Cloudence')
@section('description', 'Software products built and run by Cloudence: ready-made platforms for government, finance and revenue collection, configured to your organisation and supported after launch.')

@php
  $products = config('products');
  $groups   = collect($products)->map(fn ($p, $k) => $p + ['slug' => $k])->groupBy('category');
  $waBook   = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like a demo of your products.");
@endphp

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Products', '/products']]) !!}
  {!! \App\Support\Seo::page('CollectionPage', 'Products', '/products', 'Software products built and run by Cloudence.') !!}
  {!! \App\Support\Seo::itemList(array_map(fn ($k, $p) => [$p['name'], '/products/' . $k], array_keys($products), $products)) !!}
@endpush

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">Products</span>
          </div>
          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.5rem)] leading-[1.02] tracking-tightest font-bold">
            Platforms we built,<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">ready for you to run.</span>
          </h1>
          <p class="mt-7 max-w-xl text-[17px] leading-relaxed text-graphite">
            Not every problem needs a system built from scratch. These are products we designed,
            hardened in real use and now deploy for clients — configured to your organisation,
            with your people trained and our team on call afterwards.
          </p>
          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="{{ $waBook }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Request a demo
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
            <a href="{{ url('/services/enterprise-software') }}"
               class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
              Need something custom?
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-0.5">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ PRODUCTS BY CATEGORY ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10 space-y-20 lg:space-y-28">
      @php $i = 0; @endphp
      @foreach ($groups as $category => $items)
        @foreach ($items as $p)
          @php $i++; $n = str_pad($i, 2, '0', STR_PAD_LEFT); $flip = ($i - 1) % 2; @endphp
          <article class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <div class="lg:col-span-7 reveal {{ $flip ? 'lg:order-2' : '' }}">
              @if (!empty($p['shots'][0]['file']))
                <a href="{{ url('/products/' . $p['slug']) }}" class="block transition-transform duration-500 hover:-translate-y-1">
                  @include('partials.browser-frame', ['src' => asset('images/products/' . $p['slug'] . '/' . $p['shots'][0]['file']), 'alt' => $p['name'] . ' — ' . $p['shots'][0]['title'], 'address' => $p['address'] ?? strtolower($p['name'])])
                </a>
              @endif
            </div>
            <div class="lg:col-span-5 reveal {{ $flip ? 'lg:order-1' : '' }}" style="transition-delay:.08s">
              <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-xl bg-accent flex items-center justify-center text-ivory">
                  <span class="material-symbols-outlined text-[21px]">{{ $p['icon'] }}</span>
                </span>
                <span class="eyebrow text-graphite">{{ $n }} &nbsp;·&nbsp; {{ $category }}</span>
              </div>
              <h2 class="mt-6 text-[clamp(1.9rem,3.4vw,2.7rem)] leading-[1.08] tracking-tightest font-bold">{{ $p['name'] }}</h2>
              <p class="mt-2 text-[17px] serif-it text-accent">{{ $p['tagline'] }}</p>
              <p class="mt-5 text-[15.5px] leading-relaxed text-graphite">{{ $p['summary'] ?? $p['description'] }}</p>
              <ul class="mt-6 space-y-2.5">
                @foreach (array_slice($p['features'], 0, 4) as $f)
                  <li class="flex items-start gap-3 text-[14.5px] leading-relaxed text-ink/85">
                    <span class="material-symbols-outlined text-[19px] text-accent shrink-0">check_circle</span>{{ $f[1] }}
                  </li>
                @endforeach
              </ul>
              <a href="{{ url('/products/' . $p['slug']) }}"
                 class="group mt-8 inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
                Explore {{ $p['name'] }}
                <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
              </a>
            </div>
          </article>
        @endforeach
      @endforeach
    </div>
  </section>

  <!-- ═══════════════ HOW PRODUCTS ARE DELIVERED ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Product, plus the team</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Faster than a build. <span class="serif-it font-normal text-[1.06em] text-accent">Still made to fit.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-sm">
            A product gets you live in weeks rather than months. Because we wrote it, we can also
            change it — so you are never stuck with software that almost fits.
          </p>
        </div>
        <div class="lg:col-span-8 grid sm:grid-cols-2 gap-4">
          @foreach ([
            ['bolt',          'Live in weeks',            'The core is already built and tested, so the project is configuration, migration and training — not development.'],
            ['tune',          'Configured, not generic',  'Your structure, approval chains, branding and reports are set up before the first user logs in.'],
            ['extension',     'Extended when needed',     'Where your process is different, we adapt the product rather than asking you to change how you work.'],
            ['support_agent', 'Supported by the authors', 'The people who answer your call are the people who wrote the software.'],
          ] as $i => $c)
            <div class="reveal flex items-start gap-5 rounded-[22px] border border-mist bg-paper p-7" style="transition-delay:{{ ($i % 2) * 0.06 }}s">
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
