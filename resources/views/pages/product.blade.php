@extends('layouts.app')

@section('title', $product['name'] . ' — ' . $product['tagline'] . ' — Cloudence')
@section('description', $product['description'])
@if (!empty($product['shots'][0]['file']))
  @section('og_image', asset('images/products/' . $slug . '/' . $product['shots'][0]['file']))
@endif

@php
  $all      = config('products');
  $others   = array_filter($all, fn ($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);
  $industry = !empty($product['industry']) ? config('industries.' . $product['industry']) : null;
  $shot     = fn ($file) => asset('images/products/' . $slug . '/' . $file);
  $hero     = $product['shots'][0] ?? null;
  $tour     = array_slice($product['shots'] ?? [], 1);
  $waDemo   = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like a demo of " . $product['name'] . ".");
@endphp

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Products', '/products'], [$product['name'], '/products/' . $slug]]) !!}
  {!! \App\Support\Seo::jsonLd(array_filter([
        '@context'            => 'https://schema.org',
        '@type'               => 'SoftwareApplication',
        'name'                => $product['name'],
        'description'         => $product['description'],
        'url'                 => url('/products/' . $slug),
        'applicationCategory' => $product['schema_category'] ?? 'BusinessApplication',
        'operatingSystem'     => 'Web',
        'image'               => $hero ? $shot($hero['file']) : null,
        'provider'            => ['@id' => url('/') . '#organization'],
        'featureList'         => array_map(fn ($f) => $f[1], $product['features']),
      ])) !!}
  {!! \App\Support\Seo::faq($product['faqs']) !!}
@endpush

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 lg:pt-36">
    <div class="pointer-events-none absolute -top-40 right-[-10%] w-[46rem] h-[46rem] rounded-full bg-accent/10 blur-3xl"></div>
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <nav class="reveal flex items-center gap-2 text-[13px] text-graphite" aria-label="Breadcrumb">
        <a href="{{ url('/products') }}" class="link-underline hover:text-ink transition-colors">Products</a>
        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
        <span class="text-ink font-medium">{{ $product['name'] }}</span>
      </nav>

      <div class="mt-10 max-w-4xl reveal">
        <div class="flex flex-wrap items-center gap-3">
          <span class="inline-flex items-center gap-2.5 rounded-full bg-ink text-ivory pl-2 pr-4 py-1.5">
            <span class="w-7 h-7 rounded-full bg-accent flex items-center justify-center">
              <span class="material-symbols-outlined text-[16px]">{{ $product['icon'] }}</span>
            </span>
            <span class="text-[13px] font-semibold tracking-tight">{{ $product['name'] }}</span>
          </span>
          <span class="eyebrow text-graphite">{{ $product['category'] }} &nbsp;·&nbsp; A Cloudence product</span>
        </div>

        <h1 class="mt-8 text-[clamp(2.4rem,5.9vw,4.6rem)] leading-[1.02] tracking-tightest font-bold">
          {{ $product['heading'] }}<br>
          <span class="serif-it font-normal text-[1.06em] text-accent">{{ $product['accent'] }}</span>
        </h1>
        <p class="mt-7 max-w-2xl text-[17.5px] leading-relaxed text-graphite">{{ $product['lead'] }}</p>

        <div class="mt-9 flex flex-wrap items-center gap-3">
          <a href="{{ $waDemo }}" target="_blank" rel="noopener"
             class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
            Request a demo
            <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
          </a>
          <a href="#features"
             class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist bg-paper hover:border-ink/40 px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
            See what it does
            <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-y-0.5">arrow_downward</span>
          </a>
        </div>

        @if (!empty($product['proof']))
          <ul class="mt-8 flex flex-wrap gap-x-7 gap-y-3 text-[13.5px] text-graphite">
            @foreach ($product['proof'] as $pf)
              <li class="inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px] text-accent">check_circle</span>{{ $pf }}
              </li>
            @endforeach
          </ul>
        @endif
      </div>

      @if ($hero)
        <div class="relative mt-16 lg:mt-20 reveal reveal-fade" style="transition-delay:.12s">
          @include('partials.browser-frame', ['src' => $shot($hero['file']), 'alt' => $product['name'] . ' — ' . $hero['title'], 'address' => $product['address'] ?? strtolower($product['name']), 'eager' => true])
          <p class="mt-4 text-center text-[12.5px] text-graphite">Screens on this page show demonstration data.</p>
        </div>
      @endif
    </div>
    {{-- soft floor so the frame sits on the next band --}}
    <div class="h-16 lg:h-24"></div>
  </section>

  <!-- ═══════════════ HIGHLIGHTS ═══════════════ -->
  @if (!empty($product['stats']))
    <section class="py-16 lg:py-20 bg-paper border-y border-mist">
      <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
        <div class="reveal grid grid-cols-2 lg:grid-cols-4 gap-y-10 gap-x-8 divide-mist lg:divide-x">
          @foreach ($product['stats'] as $st)
            <div class="lg:px-10 lg:first:pl-0">
              <div class="text-[clamp(2rem,3.6vw,2.9rem)] leading-none font-bold tracking-tightest">{{ $st[0] }}</div>
              <div class="mt-3.5 text-[13.5px] leading-relaxed text-graphite max-w-[13rem]">{{ $st[1] }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  <!-- ═══════════════ BEFORE / AFTER ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal max-w-3xl">
        <div class="flex items-center gap-3 text-graphite">
          <span class="w-9 rule"></span><span class="eyebrow">Why {{ $product['name'] }}</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          {{ $product['why']['heading'] }} <span class="serif-it font-normal text-[1.06em] text-accent">{{ $product['why']['accent'] }}</span>
        </h2>
        <p class="mt-6 text-[16.5px] leading-relaxed text-graphite max-w-2xl">{{ $product['why']['body'] }}</p>
      </div>

      <div class="mt-14 grid lg:grid-cols-2 gap-5">
        <div class="reveal rounded-[22px] border border-mist bg-paper p-8 lg:p-10">
          <div class="eyebrow text-graphite/70">Without it</div>
          <ul class="mt-6 space-y-4">
            @foreach ($product['why']['before'] as $b)
              <li class="flex items-start gap-3.5 text-[15.5px] leading-relaxed text-graphite">
                <span class="mt-0.5 w-6 h-6 shrink-0 rounded-full border border-mist flex items-center justify-center text-graphite/70">
                  <span class="material-symbols-outlined text-[15px]">close</span>
                </span>{{ $b }}
              </li>
            @endforeach
          </ul>
        </div>
        <div class="reveal rounded-[22px] bg-ink text-ivory p-8 lg:p-10 relative grain overflow-hidden" style="transition-delay:.08s">
          <div class="pointer-events-none absolute -bottom-32 -right-20 w-80 h-80 rounded-full bg-accent/20 blur-3xl"></div>
          <div class="relative">
            <div class="eyebrow text-accent">With {{ $product['name'] }}</div>
            <ul class="mt-6 space-y-4">
              @foreach ($product['why']['after'] as $a)
                <li class="flex items-start gap-3.5 text-[15.5px] leading-relaxed text-ivory/80">
                  <span class="mt-0.5 w-6 h-6 shrink-0 rounded-full bg-accent flex items-center justify-center text-ivory">
                    <span class="material-symbols-outlined text-[15px]">check</span>
                  </span>{{ $a }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ FEATURES ═══════════════ -->
  <section id="features" class="py-24 lg:py-32 bg-paper border-y border-mist scroll-mt-24">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">What it does</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            {{ $product['features_heading'] ?? 'Everything in one place,' }} <span class="serif-it font-normal text-[1.06em] text-accent">{{ $product['features_accent'] ?? 'nothing bolted on.' }}</span>
          </h2>
        </div>
        @if (!empty($product['features_note']))
          <p class="lg:max-w-sm text-[15px] leading-relaxed text-graphite">{{ $product['features_note'] }}</p>
        @endif
      </div>

      <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($product['features'] as $i => $f)
          <div class="reveal group rounded-[22px] border border-mist bg-ivory p-7 flex flex-col transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
               style="transition-delay:{{ ($i % 3) * 0.06 }}s">
            <span class="w-11 h-11 rounded-xl bg-accent/10 flex items-center justify-center text-accent transition-colors group-hover:bg-accent group-hover:text-ivory">
              <span class="material-symbols-outlined text-[21px]">{{ $f[0] }}</span>
            </span>
            <h3 class="mt-7 text-[17px] font-bold tracking-tight">{{ $f[1] }}</h3>
            <p class="mt-2.5 text-[14.5px] leading-relaxed text-graphite">{{ $f[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ PRODUCT TOUR ═══════════════ -->
  @if ($tour)
    <section class="py-24 lg:py-32">
      <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
        <div class="reveal max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Inside the product</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            See it <span class="serif-it font-normal text-[1.06em] text-accent">at work.</span>
          </h2>
        </div>

        <div class="mt-16 space-y-20 lg:space-y-28">
          @foreach ($tour as $i => $t)
            @if (($t['frame'] ?? null) === 'wide')
              {{-- Wide diagrams read better at full width, with the copy above --}}
              <div class="reveal">
                <div class="grid lg:grid-cols-12 gap-6 lg:gap-12 items-end">
                  <div class="lg:col-span-5">
                    <span class="eyebrow text-accent">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} &nbsp;·&nbsp; {{ $t['label'] ?? 'Screen' }}</span>
                    <h3 class="mt-4 text-[clamp(1.5rem,2.4vw,1.95rem)] leading-tight tracking-tightest font-bold">{{ $t['title'] }}</h3>
                  </div>
                  <div class="lg:col-span-7">
                    <p class="text-[15.5px] leading-relaxed text-graphite">{{ $t['body'] }}</p>
                  </div>
                </div>
                <div class="mt-8 rounded-[22px] border border-mist bg-paper p-5 lg:p-10 shadow-[0_40px_90px_-55px_rgba(20,20,20,.45)]">
                  <img src="{{ $shot($t['file']) }}" alt="{{ $product['name'] }} — {{ $t['title'] }}" loading="lazy" decoding="async" class="block w-full h-auto rounded-[12px]">
                </div>
                @if (!empty($t['points']))
                  <ul class="mt-7 grid md:grid-cols-3 gap-x-8 gap-y-3">
                    @foreach ($t['points'] as $pt)
                      <li class="flex items-start gap-3 text-[14.5px] leading-relaxed text-ink/85">
                        <span class="material-symbols-outlined text-[19px] text-accent shrink-0">check_circle</span>{{ $pt }}
                      </li>
                    @endforeach
                  </ul>
                @endif
              </div>
              @continue
            @endif
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">
              <div class="lg:col-span-7 reveal {{ $i % 2 ? 'lg:order-2' : '' }}">
                @php $frame = $t['frame'] ?? 'browser'; @endphp
                @if ($frame === 'browser')
                  @include('partials.browser-frame', ['src' => $shot($t['file']), 'alt' => $product['name'] . ' — ' . $t['title'], 'address' => ($product['address'] ?? strtolower($product['name'])) . ($t['path'] ?? '')])
                @elseif ($frame === 'phone')
                  <div class="relative rounded-[22px] border border-mist bg-paper grain overflow-hidden px-6 py-10 lg:py-14 flex justify-center">
                    <div class="pointer-events-none absolute -bottom-24 -right-16 w-72 h-72 rounded-full bg-accent/15 blur-3xl"></div>
                    <img src="{{ $shot($t['file']) }}" alt="{{ $product['name'] }} — {{ $t['title'] }}" loading="lazy" decoding="async"
                         class="relative block w-full max-w-[300px] h-auto rounded-[26px] shadow-[0_40px_80px_-40px_rgba(20,20,20,.55)]">
                  </div>
                @else
                  <div class="rounded-[22px] border border-mist bg-paper p-5 lg:p-8 shadow-[0_40px_90px_-55px_rgba(20,20,20,.45)]">
                    <img src="{{ $shot($t['file']) }}" alt="{{ $product['name'] }} — {{ $t['title'] }}" loading="lazy" decoding="async"
                         class="block w-full h-auto rounded-[12px]">
                  </div>
                @endif
              </div>
              <div class="lg:col-span-5 reveal {{ $i % 2 ? 'lg:order-1' : '' }}" style="transition-delay:.08s">
                <span class="eyebrow text-accent">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} &nbsp;·&nbsp; {{ $t['label'] ?? 'Screen' }}</span>
                <h3 class="mt-4 text-[clamp(1.5rem,2.4vw,1.95rem)] leading-tight tracking-tightest font-bold">{{ $t['title'] }}</h3>
                <p class="mt-4 text-[15.5px] leading-relaxed text-graphite">{{ $t['body'] }}</p>
                @if (!empty($t['points']))
                  <ul class="mt-6 space-y-3">
                    @foreach ($t['points'] as $pt)
                      <li class="flex items-start gap-3 text-[14.5px] leading-relaxed text-ink/85">
                        <span class="material-symbols-outlined text-[19px] text-accent shrink-0">check_circle</span>{{ $pt }}
                      </li>
                    @endforeach
                  </ul>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  <!-- ═══════════════ HOW IT WORKS ═══════════════ -->
  <section class="py-24 lg:py-32 bg-ink text-ivory relative grain overflow-hidden">
    <div class="pointer-events-none absolute -bottom-52 -left-20 w-[42rem] h-[42rem] rounded-full bg-accent/15 blur-3xl"></div>
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal max-w-2xl">
        <div class="flex items-center gap-3 text-ivory/50">
          <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">How it works</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          {{ $product['flow_heading'] ?? 'From start to finish,' }} <span class="serif-it font-normal text-[1.06em] text-accent">{{ $product['flow_accent'] ?? 'on the record.' }}</span>
        </h2>
      </div>
      <ol class="mt-16 grid sm:grid-cols-2 lg:grid-cols-{{ min(count($product['flow']), 4) }} gap-x-10 gap-y-12">
        @foreach ($product['flow'] as $i => $step)
          <li class="reveal border-t border-ivory/15 pt-6" style="transition-delay:{{ $i * 0.07 }}s">
            <span class="text-[2rem] leading-none font-bold tracking-tightest text-accent">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
            <h3 class="mt-5 text-[17.5px] font-bold tracking-tight">{{ $step[0] }}</h3>
            <p class="mt-2.5 text-[14.5px] leading-relaxed text-ivory/60">{{ $step[1] }}</p>
          </li>
        @endforeach
      </ol>
    </div>
  </section>

  <!-- ═══════════════ WHO USES IT ═══════════════ -->
  @if (!empty($product['roles']))
    <section class="py-24 lg:py-32">
      <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
          <div class="lg:col-span-4 reveal">
            <div class="flex items-center gap-3 text-graphite">
              <span class="w-9 rule"></span><span class="eyebrow">Built for everyone involved</span>
            </div>
            <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
              One system, <span class="serif-it font-normal text-[1.06em] text-accent">every role.</span>
            </h2>
            <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-sm">
              Each person sees exactly what their job needs, and nothing they should not. Access is
              set by role, and every action is attributed to a name.
            </p>
          </div>
          <div class="lg:col-span-8 grid sm:grid-cols-2 gap-4">
            @foreach ($product['roles'] as $i => $r)
              <div class="reveal flex items-start gap-5 rounded-[22px] border border-mist bg-paper p-7" style="transition-delay:{{ ($i % 2) * 0.06 }}s">
                <span class="w-11 h-11 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink">
                  <span class="material-symbols-outlined text-[20px]">{{ $r[0] }}</span>
                </span>
                <div>
                  <h3 class="text-[16.5px] font-bold tracking-tight">{{ $r[1] }}</h3>
                  <p class="mt-2 text-[14px] leading-relaxed text-graphite">{{ $r[2] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- ═══════════════ DELIVERY ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-5">
        <div class="lg:col-span-7 reveal rounded-[22px] border border-mist bg-ivory p-8 lg:p-10">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Rolled out by Cloudence</span>
          </div>
          <h2 class="mt-6 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold">
            Not just a licence. <span class="serif-it font-normal text-[1.06em] text-accent">A working system.</span>
          </h2>
          <div class="mt-8 grid sm:grid-cols-2 gap-x-8 gap-y-7">
            @foreach ([
              ['tune',          'Configured to you',     'Your structure, your approval chains, your branding, set up before anyone logs in.'],
              ['move_up',       'Data brought across',   'Existing records migrated from spreadsheets, paper registers or the system you are leaving.'],
              ['school',        'People trained',        'Hands-on sessions for users and administrators, with guides they can return to.'],
              ['support_agent', 'Supported after launch','A named contact, a response time in writing, and updates as your needs change.'],
            ] as $d)
              <div class="flex items-start gap-4">
                <span class="w-10 h-10 shrink-0 rounded-full bg-paper border border-mist flex items-center justify-center text-ink">
                  <span class="material-symbols-outlined text-[19px]">{{ $d[0] }}</span>
                </span>
                <div>
                  <h3 class="text-[15.5px] font-bold tracking-tight">{{ $d[1] }}</h3>
                  <p class="mt-1.5 text-[13.5px] leading-relaxed text-graphite">{{ $d[2] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="lg:col-span-5 reveal rounded-[22px] bg-ink text-ivory p-8 lg:p-10 relative grain overflow-hidden" style="transition-delay:.08s">
          <div class="relative">
            <div class="flex items-center gap-3 text-ivory/50">
              <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">What you get</span>
            </div>
            <h2 class="mt-6 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold">
              The <span class="serif-it font-normal text-[1.06em] text-accent">outcomes.</span>
            </h2>
            <ul class="mt-7 space-y-3.5">
              @foreach ($product['outcomes'] as $o)
                <li class="flex items-start gap-3 text-[15.5px] leading-relaxed text-ivory/75">
                  <span class="material-symbols-outlined text-[20px] text-accent shrink-0">check_circle</span>{{ $o }}
                </li>
              @endforeach
            </ul>
            @if ($industry)
              <a href="{{ url('/industries/' . $product['industry']) }}" class="group mt-8 inline-flex items-center gap-2 text-[14px] font-semibold text-ivory">
                <span class="link-underline">More for {{ strtolower($industry['short']) }}</span>
                <span class="material-symbols-outlined text-[18px] text-accent transition-transform group-hover:translate-x-1">arrow_forward</span>
              </a>
            @endif
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
            Want to see it with your own data? <a href="{{ $waDemo }}" target="_blank" rel="noopener" class="link-underline font-semibold text-ink">Ask for a demo</a> and we will walk you through it.
          </p>
        </div>
        <div class="lg:col-span-8 reveal">
          <div class="divide-y divide-mist border-y border-mist">
            @foreach ($product['faqs'] as $f)
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

  <!-- ═══════════════ OTHER PRODUCTS ═══════════════ -->
  @if ($others)
    <section class="py-24 lg:py-32 bg-paper border-y border-mist">
      <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
          <div class="max-w-2xl">
            <div class="flex items-center gap-3 text-graphite">
              <span class="w-9 rule"></span><span class="eyebrow">More from Cloudence</span>
            </div>
            <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
              Other <span class="serif-it font-normal text-[1.06em] text-accent">products.</span>
            </h2>
          </div>
          <a href="{{ url('/products') }}" class="group shrink-0 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
            <span class="link-underline">All products</span>
            <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
          </a>
        </div>
        <div class="mt-14 grid md:grid-cols-2 gap-5">
          @foreach ($others as $k => $o)
            <a href="{{ url('/products/' . $k) }}"
               class="reveal group flex flex-col rounded-[22px] border border-mist bg-ivory overflow-hidden transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
               style="transition-delay:{{ $loop->index * 0.06 }}s">
              @if (!empty($o['shots'][0]['file']))
                <div class="relative aspect-[16/9] overflow-hidden border-b border-mist bg-paper">
                  <img src="{{ asset('images/products/' . $k . '/' . $o['shots'][0]['file']) }}" alt="{{ $o['name'] }}" loading="lazy"
                       class="absolute inset-0 w-full h-full object-cover object-left-top transition-transform duration-700 group-hover:scale-[1.03]">
                </div>
              @endif
              <div class="p-7 lg:p-8 flex flex-col flex-1">
                <span class="eyebrow text-accent">{{ $o['category'] }}</span>
                <h3 class="mt-3 text-[22px] leading-snug tracking-tightest font-bold">{{ $o['name'] }}</h3>
                <p class="mt-2 text-[14.5px] leading-relaxed text-graphite flex-1">{{ $o['tagline'] }}</p>
                <span class="mt-6 inline-flex items-center gap-2 text-[14px] font-semibold text-ink">
                  <span class="link-underline">Explore {{ $o['name'] }}</span>
                  <span class="material-symbols-outlined text-[18px] text-accent transition-transform group-hover:translate-x-1">arrow_forward</span>
                </span>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  <!-- ═══════════════ DEMO CTA ═══════════════ -->
  <section class="py-24 lg:py-32 bg-ink text-ivory relative grain overflow-hidden">
    <div class="pointer-events-none absolute -top-40 right-0 w-[40rem] h-[40rem] rounded-full bg-accent/15 blur-3xl"></div>
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-8 reveal">
          <div class="flex items-center gap-3 text-ivory/50">
            <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">See {{ $product['name'] }} for yourself</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            {{ $product['cta_heading'] ?? 'Thirty minutes is enough to' }} <span class="serif-it font-normal text-[1.06em] text-accent">{{ $product['cta_accent'] ?? 'see the difference.' }}</span>
          </h2>
          <p class="mt-6 max-w-xl text-[16px] leading-relaxed text-ivory/60">
            {{ $product['cta_body'] ?? 'We will walk you through the product using a scenario from your own organisation, answer the hard questions, and tell you honestly whether it fits.' }}
          </p>
        </div>
        <div class="lg:col-span-4 reveal flex flex-wrap lg:justify-end gap-3" style="transition-delay:.1s">
          <a href="{{ $waDemo }}" target="_blank" rel="noopener"
             class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink bg-ivory hover:bg-white px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
            Request a demo
            <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
          </a>
          <a href="{{ url('/contact') }}"
             class="inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory border border-ivory/25 hover:border-ivory px-6 py-3.5 rounded-full transition-colors">
            Contact us
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
