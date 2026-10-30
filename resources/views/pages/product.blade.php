@extends('layouts.v3')

@section('title', $product['name'] . ' — ' . $product['blurb'] . ' | Cloudence')
@section('og_image_alt', $product['name'] . ' — ' . $product['tagline'])
@section('description', $product['meta_description'] ?? \Illuminate\Support\Str::limit($product['description'], 155))
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

  // Aspect ratio of a shot, so gallery slides can share one height and take their width from the image.
  $ratio = function (array $t) use ($slug) {
      if (($t['frame'] ?? 'browser') === 'browser') return 1.6;
      $d = @getimagesize(public_path('images/products/' . $slug . '/' . $t['file']));
      return $d && $d[1] ? round($d[0] / $d[1], 3) : 1.6;
  };

  // Split a stat value into prefix / number / suffix when it is a plain figure (3, 100%, ₦0), else leave it as text.
  $stat = function (string $v) {
      if (preg_match('/^([^\d]*)(\d+(?:\.\d+)?)([^\d]*)$/u', $v, $m) && (float) $m[2] > 0 && $m[2][0] !== '0') {
          return ['prefix' => $m[1], 'number' => $m[2], 'suffix' => $m[3]];
      }
      return null;
  };

  $delivery = [
    ['tune',          'Configured to you',      'Your structure, your approval chains, your branding, set up before anyone logs in.'],
    ['move_up',       'Data brought across',    'Existing records migrated from spreadsheets, paper registers or the system you are leaving.'],
    ['school',        'People trained',         'Hands-on sessions for users and administrators, with guides they can return to.'],
    ['support_agent', 'Supported after launch', 'A named contact, a response time in writing, and updates as your needs change.'],
  ];

  $siteUrl  = $product['url'] ?? null;
  $siteHost = $siteUrl ? preg_replace('#^https?://(www\.)?#', '', rtrim($siteUrl, '/')) : null;
  $arrow = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
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
        'sameAs'              => $siteUrl,
        'provider'            => ['@id' => url('/') . '#organization'],
        'featureList'         => array_map(fn ($f) => $f[1], $product['features']),
      ])) !!}
  {!! \App\Support\Seo::faq($product['faqs']) !!}
@endpush

@push('head')
<style>
  /* Product tour: every slide shares one height; width follows the shot's aspect ratio (--r). */
  .tour { --stage: 22rem; }
  @media (min-width: 640px)  { .tour { --stage: 24rem; } }
  @media (min-width: 1024px) { .tour { --stage: 31rem; } }
  .tour-stage { height: var(--stage); }
  .tour-slide { max-width: 100%; width: max(calc(var(--stage) * var(--r, 1.6)), 16rem); }
  .tour-slide[data-frame="browser"] { width: calc((var(--stage) - 38px) * var(--r, 1.6)); }
  .tour-slide[data-frame="wide"] { width: 100%; }
  .faq-row summary::-webkit-details-marker { display: none; }
</style>
@endpush

@section('page')

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-16 pt-14 lg:pb-24 lg:pt-24">
  <nav class="flex items-center gap-1.5 text-sm text-neutral-500" aria-label="Breadcrumb">
    <a href="{{ url('/products') }}" class="font-medium transition-colors hover:text-[var(--blue)]">Products</a>
    <span class="material-symbols-outlined text-[16px] text-neutral-400">chevron_right</span>
    <span class="font-medium text-[var(--ink)]">{{ $product['name'] }}</span>
  </nav>

  <div class="mt-10 max-w-5xl">
    <div class="flex flex-wrap items-center gap-3">
      <span class="v3-icon h-9 w-9"><span class="material-symbols-outlined !text-[19px]">{{ $product['icon'] }}</span></span>
      <p class="v3-eyebrow">{{ $product['name'] }} &nbsp;·&nbsp; {{ $product['category'] }} &nbsp;·&nbsp; A Cloudence product</p>
    </div>

    <h1 class="mt-6 text-[2.5rem] font-black leading-[1.03] tracking-[-0.035em] sm:text-6xl lg:text-[min(4.75rem,5.2vw)]">
      {{ $product['heading'] }} <span class="text-[var(--blue)]">{{ $product['accent'] }}</span>
    </h1>
    <p class="mt-8 max-w-2xl text-base leading-relaxed text-neutral-500 sm:text-lg">{{ $product['lead'] }}</p>

    @if (!empty($product['proof']))
      <ul class="mt-8 flex flex-wrap gap-2">
        @foreach ($product['proof'] as $pf)
          <li class="inline-flex items-center gap-2 border border-neutral-200 px-3 py-1.5 text-[13px] text-neutral-600">
            <span class="material-symbols-outlined text-[16px] text-[var(--blue)]">check</span>{{ $pf }}
          </li>
        @endforeach
      </ul>
    @endif

    <div class="mt-10 flex flex-wrap items-center gap-3">
      @if ($siteUrl)
        <a href="{{ $siteUrl }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">Visit {{ $siteHost }} {!! $arrow !!}</a>
        <a href="{{ $waDemo }}" target="_blank" rel="noopener" class="v3-btn v3-btn-line">Request a demo {!! $arrow !!}</a>
      @else
        <a href="{{ $waDemo }}" target="_blank" rel="noopener" class="v3-btn v3-btn-dark">Request a demo {!! $arrow !!}</a>
        <a href="#features" class="v3-btn v3-btn-line">See what it does <span class="material-symbols-outlined text-[16px]">arrow_downward</span></a>
      @endif
    </div>
  </div>

  @if ($hero)
    <figure class="mt-16 lg:mt-20">
      <div class="overflow-hidden border border-neutral-200 bg-white">
        <div class="flex h-9 items-center gap-3 border-b border-neutral-200 bg-neutral-50 px-4">
          <span class="flex shrink-0 gap-1.5" aria-hidden="true"><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i></span>
          <span class="min-w-0 truncate text-[11.5px] text-neutral-500">{{ $product['address'] }}</span>
        </div>
        <img src="{{ $shot($hero['file']) }}" alt="{{ $product['name'] }} — {{ $hero['title'] }}" loading="eager" decoding="async" width="2160" height="1350" class="aspect-[16/10] w-full object-cover object-top">
      </div>
      <figcaption class="mt-4 text-[12.5px] text-neutral-400">Screens on this page show demonstration data.</figcaption>
    </figure>
  @endif
</section>

{{-- ── Stats ────────────────────────────────────────────── --}}
@if (!empty($product['stats']))
  <section class="border-t border-neutral-100">
    <div class="v3-wrap py-14 lg:py-20">
      <div class="grid gap-px border border-neutral-100 bg-neutral-100 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($product['stats'] as $st)
          @php $parts = $stat((string) $st[0]); @endphp
          <div class="bg-white px-7 py-8 lg:px-8 lg:py-10">
            <div class="text-[clamp(2.4rem,3.6vw,3.25rem)] font-black leading-none tracking-[-0.035em]">
              @if ($parts)
                {{ $parts['prefix'] }}<span class="counter" data-target="{{ $parts['number'] }}">0</span>{{ $parts['suffix'] }}
              @else
                {{ $st[0] }}
              @endif
            </div>
            <div class="mt-4 max-w-[15rem] text-[13.5px] leading-relaxed text-neutral-500">{{ $st[1] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

{{-- ── Why: before / after ──────────────────────────────── --}}
<section class="border-t border-neutral-100">
  <div class="v3-wrap py-20 lg:py-28">
    <div class="max-w-3xl">
      <p class="v3-eyebrow">Why {{ $product['name'] }}</p>
      <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">{{ $product['why']['heading'] }} <span>{{ $product['why']['accent'] }}</span></h2>
      <p class="mt-6 max-w-2xl text-base leading-relaxed text-neutral-500 sm:text-lg">{{ $product['why']['body'] }}</p>
    </div>

    <div class="mt-14 grid gap-px border border-neutral-200 bg-neutral-200 lg:grid-cols-2">
      <div class="bg-white p-7 lg:p-10">
        <div class="flex items-center justify-between">
          <span class="text-xs font-medium uppercase tracking-wider text-neutral-400">Without it</span>
          <span class="material-symbols-outlined text-[20px] text-neutral-400">inbox</span>
        </div>
        <ul class="mt-6 divide-y divide-neutral-100">
          @foreach ($product['why']['before'] as $b)
            <li class="flex items-start gap-4 py-4 text-[15px] leading-relaxed text-neutral-500">
              <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center border border-neutral-200 text-neutral-400"><span class="material-symbols-outlined text-[15px]">close</span></span>{{ $b }}
            </li>
          @endforeach
        </ul>
      </div>
      <div class="bg-white p-7 lg:p-10">
        <div class="flex items-center justify-between">
          <span class="text-xs font-medium uppercase tracking-wider text-neutral-500">With {{ $product['name'] }}</span>
          <span class="material-symbols-outlined text-[20px] text-[var(--blue)]">{{ $product['icon'] }}</span>
        </div>
        <ul class="mt-6 divide-y divide-neutral-100">
          @foreach ($product['why']['after'] as $a)
            <li class="flex items-start gap-4 py-4 text-[15px] leading-relaxed text-[var(--ink)]">
              <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center bg-[var(--blue)] text-white"><span class="material-symbols-outlined text-[15px]">check</span></span>{{ $a }}
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- ── Features ─────────────────────────────────────────── --}}
<section id="features" class="scroll-mt-24 border-t border-neutral-100">
  <div class="v3-wrap py-20 lg:py-28">
    <div class="grid items-end gap-8 lg:grid-cols-12 lg:gap-16">
      <div class="lg:col-span-7">
        <p class="v3-eyebrow">What it does</p>
        <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">{{ $product['features_heading'] ?? 'Everything in one place,' }} <span>{{ $product['features_accent'] ?? 'nothing bolted on.' }}</span></h2>
      </div>
      @if (!empty($product['features_note']))
        <p class="max-w-md text-[15px] leading-relaxed text-neutral-500 lg:col-span-5 lg:pb-1">{{ $product['features_note'] }}</p>
      @endif
    </div>

    <div class="mt-14 grid gap-px border border-neutral-100 bg-neutral-100 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($product['features'] as $i => $f)
        <div class="reveal group flex flex-col bg-white p-7 lg:p-8" style="--d:{{ ($i % 3) * 0.06 }}s">
          <div class="flex items-start justify-between">
            <span class="v3-icon transition-colors group-hover:bg-[var(--blue)] group-hover:text-white"><span class="material-symbols-outlined">{{ $f[0] }}</span></span>
            <span class="text-xs font-medium tabular-nums text-neutral-400">{{ sprintf('%02d', $i + 1) }}</span>
          </div>
          <h3 class="mt-8 text-lg font-bold leading-snug tracking-tight">{{ $f[1] }}</h3>
          <p class="mt-2.5 flex-1 text-[14.5px] leading-relaxed text-neutral-500">{{ $f[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── Product tour ─────────────────────────────────────── --}}
@if ($tour)
  <section class="tour border-t border-neutral-100" data-carousel>
    <div class="v3-wrap py-20 lg:py-28">
      <div class="flex flex-wrap items-end justify-between gap-8">
        <div class="max-w-2xl">
          <p class="v3-eyebrow">Inside the product</p>
          <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">See it <span>at work.</span></h2>
          <p class="mt-5 text-sm text-neutral-400">{{ count($tour) }} screens, demonstration data only.</p>
        </div>
        <div class="flex items-center gap-2">
          <button type="button" data-prev aria-label="Previous screen" class="flex h-11 w-11 items-center justify-center border border-neutral-200 text-[var(--ink)] transition-colors hover:border-[var(--ink)] hover:bg-[var(--ink)] hover:text-white disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:border-neutral-200 disabled:hover:bg-transparent disabled:hover:text-[var(--ink)]"><span class="material-symbols-outlined text-[20px]">arrow_back</span></button>
          <button type="button" data-next aria-label="Next screen" class="flex h-11 w-11 items-center justify-center border border-neutral-200 text-[var(--ink)] transition-colors hover:border-[var(--ink)] hover:bg-[var(--ink)] hover:text-white disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:border-neutral-200 disabled:hover:bg-transparent disabled:hover:text-[var(--ink)]"><span class="material-symbols-outlined text-[20px]">arrow_forward</span></button>
        </div>
      </div>

      <div class="mt-14">
        <div data-track class="no-scrollbar -mx-6 flex snap-x snap-mandatory items-start gap-5 overflow-x-auto scroll-smooth px-6 pb-1 lg:mx-0 lg:gap-6 lg:px-0">
          @foreach ($tour as $i => $t)
            @php
              $frame = $t['frame'] ?? 'browser';
              $r     = $ratio($t);
              $alt   = $product['name'] . ' — ' . $t['title'];
            @endphp
            <article class="tour-slide shrink-0 snap-start" data-frame="{{ $frame }}" style="--r:{{ $r }}">
              <div class="tour-stage flex items-end justify-start">
                @if ($frame === 'browser')
                  <div class="flex h-full w-full flex-col overflow-hidden border border-neutral-200 bg-white">
                    <div class="flex h-9 shrink-0 items-center gap-3 border-b border-neutral-200 bg-neutral-50 px-4">
                      <span class="flex shrink-0 gap-1.5" aria-hidden="true"><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i></span>
                      <span class="min-w-0 truncate text-[11.5px] text-neutral-500">{{ $product['address'] }}{{ $t['path'] ?? '' }}</span>
                    </div>
                    <div class="relative min-h-0 flex-1">
                      <img src="{{ $shot($t['file']) }}" alt="{{ $alt }}" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover object-top">
                    </div>
                  </div>
                @elseif ($frame === 'phone')
                  <div class="h-full rounded-[32px] border border-neutral-200 bg-neutral-100 p-1.5" style="aspect-ratio:{{ $r }}">
                    <img src="{{ $shot($t['file']) }}" alt="{{ $alt }}" loading="lazy" decoding="async" class="h-full w-full rounded-[26px] object-cover object-top">
                  </div>
                @elseif ($frame === 'wide')
                  <div class="flex h-full w-full items-center justify-center border border-neutral-200 bg-neutral-50 p-5 sm:p-8 lg:p-12">
                    <img src="{{ $shot($t['file']) }}" alt="{{ $alt }}" loading="lazy" decoding="async" class="max-h-full w-full object-contain">
                  </div>
                @else
                  <div class="flex h-full items-center justify-center border border-neutral-200 bg-white p-3" style="aspect-ratio:{{ $r }}">
                    <img src="{{ $shot($t['file']) }}" alt="{{ $alt }}" loading="lazy" decoding="async" class="max-h-full w-full object-contain">
                  </div>
                @endif
              </div>

              <div class="mt-7 {{ $frame === 'wide' ? 'grid gap-6 lg:grid-cols-12 lg:gap-12' : '' }}">
                <div class="{{ $frame === 'wide' ? 'lg:col-span-5' : '' }}">
                  <span class="text-xs font-medium uppercase tracking-wider text-neutral-500">{{ sprintf('%02d', $i + 1) }} &nbsp;·&nbsp; {{ $t['label'] ?? 'Screen' }}</span>
                  <h3 class="mt-3 max-w-md text-[19px] font-bold leading-snug tracking-tight lg:text-[21px]">{{ $t['title'] }}</h3>
                </div>
                <div class="{{ $frame === 'wide' ? 'lg:col-span-7' : '' }}">
                  @if (!empty($t['body']))
                    <p class="{{ $frame === 'wide' ? '' : 'mt-3' }} max-w-lg text-[14.5px] leading-relaxed text-neutral-500">{{ $t['body'] }}</p>
                  @endif
                  @if (!empty($t['points']))
                    <ul class="mt-5 {{ $frame === 'wide' ? 'grid gap-x-8 gap-y-2.5 md:grid-cols-3' : 'space-y-2.5' }}">
                      @foreach ($t['points'] as $pt)
                        <li class="flex items-start gap-3 text-[14px] leading-relaxed text-[var(--ink)]">
                          <span class="material-symbols-outlined mt-0.5 shrink-0 text-[18px] text-[var(--blue)]">check</span>{{ $pt }}
                        </li>
                      @endforeach
                    </ul>
                  @endif
                </div>
              </div>
            </article>
          @endforeach
        </div>
        <div class="relative mt-10 h-px overflow-hidden bg-neutral-200" aria-hidden="true"><span data-progress class="absolute left-0 top-0 h-px bg-[var(--ink)] transition-transform duration-300 ease-out"></span></div>
      </div>
    </div>
  </section>
@endif

{{-- ── How it works ─────────────────────────────────────── --}}
<section class="border-t border-neutral-100">
  <div class="v3-wrap py-20 lg:py-28">
    <div class="max-w-2xl">
      <p class="v3-eyebrow">How it works</p>
      <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">{{ $product['flow_heading'] ?? 'From start to finish,' }} <span>{{ $product['flow_accent'] ?? 'on the record.' }}</span></h2>
    </div>
    <ol class="mt-14 grid gap-x-8 gap-y-10 sm:grid-cols-2 {{ count($product['flow']) >= 4 ? 'lg:grid-cols-4' : 'lg:grid-cols-3' }}">
      @foreach ($product['flow'] as $i => $step)
        <li class="reveal border-t border-neutral-950 pt-6" style="--d:{{ $i * 0.07 }}s">
          <div class="flex items-center justify-between gap-3">
            <span class="text-[2.6rem] font-black leading-none tracking-[-0.035em] text-neutral-300">{{ sprintf('%02d', $i + 1) }}</span>
            @if ($i < count($product['flow']) - 1)<span class="material-symbols-outlined hidden text-[20px] text-neutral-300 lg:inline">arrow_forward</span>@endif
          </div>
          <h3 class="mt-6 text-lg font-bold leading-tight tracking-tight">{{ $step[0] }}</h3>
          <p class="mt-2.5 text-[14.5px] leading-relaxed text-neutral-500">{{ $step[1] }}</p>
        </li>
      @endforeach
    </ol>
  </div>
</section>

{{-- ── Who uses it ──────────────────────────────────────── --}}
@if (!empty($product['roles']))
  <section class="border-t border-neutral-100">
    <div class="v3-wrap py-20 lg:py-28">
      <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-4">
          <p class="v3-eyebrow">Built for everyone involved</p>
          <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">One system, <span>every role.</span></h2>
          <p class="mt-7 max-w-sm text-base leading-relaxed text-neutral-500 sm:text-lg">
            Each person sees exactly what their job needs, and nothing they should not. Access is
            set by role, and every action is attributed to a name.
          </p>
        </div>
        <ul class="self-start border-t border-neutral-200 lg:col-span-8">
          @foreach ($product['roles'] as $i => $r)
            <li class="reveal grid gap-4 border-b border-neutral-100 py-6 sm:grid-cols-12 sm:gap-6" style="--d:{{ ($i % 2) * 0.06 }}s">
              <span class="v3-icon sm:col-span-1"><span class="material-symbols-outlined">{{ $r[0] }}</span></span>
              <h3 class="text-lg font-bold leading-tight tracking-tight sm:col-span-4 sm:pl-3 sm:pt-2.5">{{ $r[1] }}</h3>
              <p class="text-[15px] leading-relaxed text-neutral-500 sm:col-span-7 sm:pt-2">{{ $r[2] }}</p>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>
@endif

{{-- ── Delivery + outcomes ──────────────────────────────── --}}
<section class="border-t border-neutral-100">
  <div class="v3-wrap py-20 lg:py-28">
    <div class="grid gap-px border border-neutral-200 bg-neutral-200 lg:grid-cols-12">
      <div class="bg-white p-7 lg:col-span-7 lg:p-10">
        <p class="v3-eyebrow">Rolled out by Cloudence</p>
        <h2 class="mt-3 text-[clamp(1.6rem,2.4vw,2.1rem)] font-black leading-[1.1] tracking-[-0.025em]">Not just a licence. <span>A working system.</span></h2>
        <div class="mt-9 grid gap-x-8 gap-y-8 sm:grid-cols-2">
          @foreach ($delivery as $d)
            <div class="flex items-start gap-4">
              <span class="v3-icon h-10 w-10"><span class="material-symbols-outlined !text-[19px]">{{ $d[0] }}</span></span>
              <div>
                <h3 class="text-[15.5px] font-bold tracking-tight">{{ $d[1] }}</h3>
                <p class="mt-1.5 text-[13.5px] leading-relaxed text-neutral-500">{{ $d[2] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="flex flex-col bg-white p-7 lg:col-span-5 lg:p-10">
        <p class="v3-eyebrow">What you get</p>
        <h2 class="mt-3 text-[clamp(1.6rem,2.4vw,2.1rem)] font-black leading-[1.1] tracking-[-0.025em]">The <span>outcomes.</span></h2>
        <ul class="mt-7 flex-1 divide-y divide-neutral-100">
          @foreach ($product['outcomes'] as $o)
            <li class="flex items-start gap-3.5 py-3.5 text-[15.5px] leading-relaxed text-[var(--ink)]">
              <span class="material-symbols-outlined mt-0.5 shrink-0 text-[20px] text-[var(--blue)]">task_alt</span>{{ $o }}
            </li>
          @endforeach
        </ul>
        @if ($industry)
          <a href="{{ url('/industries/' . $product['industry']) }}" class="mt-8 inline-flex items-center gap-2 self-start border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">More for {{ strtolower($industry['short']) }} {!! $arrow !!}</a>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- ── FAQ ──────────────────────────────────────────────── --}}
<section class="border-t border-neutral-100">
  <div class="v3-wrap py-20 lg:py-28">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="lg:col-span-4">
        <p class="v3-eyebrow">Common questions</p>
        <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">Before you <span>ask.</span></h2>
        <p class="mt-7 max-w-sm text-[15.5px] leading-relaxed text-neutral-500">
          Want to see it with your own data? <a href="{{ $waDemo }}" target="_blank" rel="noopener" class="font-medium text-[var(--ink)] underline underline-offset-4 hover:text-neutral-500">Ask for a demo</a> and we will walk you through it.
        </p>
      </div>
      <div class="lg:col-span-8">
        <div class="border-t border-neutral-200">
          @foreach ($product['faqs'] as $f)
            <details class="faq-row group border-b border-neutral-100">
              <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[17px] font-bold tracking-tight transition-colors hover:text-neutral-500">
                {{ $f[0] }}
                <span class="flex h-9 w-9 shrink-0 items-center justify-center border border-neutral-200 text-[var(--ink)] transition-colors duration-300 group-open:border-[var(--ink)] group-open:bg-[var(--ink)] group-open:text-white">
                  <span class="material-symbols-outlined text-[20px] transition-transform duration-300 group-open:rotate-45">add</span>
                </span>
              </summary>
              <p class="max-w-2xl pb-6 text-[15px] leading-relaxed text-neutral-500">{{ $f[1] }}</p>
            </details>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── Demo ─────────────────────────────────────────────── --}}
<section class="border-t border-neutral-100">
  <div class="v3-wrap py-16 lg:py-20">
    <div class="grid items-end gap-10 bg-[var(--ink)] p-8 text-white sm:p-10 lg:grid-cols-12 lg:p-14">
      <div class="lg:col-span-8">
        <p class="text-xs font-medium uppercase tracking-wider text-neutral-500">See {{ $product['name'] }} for yourself</p>
        <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">{{ $product['cta_heading'] ?? 'Thirty minutes is enough to' }} <span>{{ $product['cta_accent'] ?? 'see the difference.' }}</span></h2>
        <p class="mt-6 max-w-xl text-base leading-relaxed text-neutral-400">
          {{ $product['cta_body'] ?? 'We will walk you through the product using a scenario from your own organisation, answer the hard questions, and tell you honestly whether it fits.' }}
        </p>
      </div>
      <div class="flex flex-wrap gap-3 lg:col-span-4 lg:justify-end">
        @if ($siteUrl)
          <a href="{{ $siteUrl }}" target="_blank" rel="noopener" class="v3-btn v3-btn-blue">Visit {{ $siteHost }} {!! $arrow !!}</a>
          <a href="{{ $waDemo }}" target="_blank" rel="noopener" class="v3-btn border border-neutral-700 text-white hover:border-white">Request a demo</a>
        @else
          <a href="{{ $waDemo }}" target="_blank" rel="noopener" class="v3-btn v3-btn-blue">Request a demo {!! $arrow !!}</a>
          <a href="{{ url('/contact') }}" class="v3-btn border border-neutral-700 text-white hover:border-white">Contact us</a>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- ── More from Cloudence ──────────────────────────────── --}}
@if ($others)
  <section class="border-t border-neutral-100">
    <div class="v3-wrap py-20 lg:py-28">
      <div class="flex flex-wrap items-end justify-between gap-6">
        <div class="max-w-2xl">
          <p class="v3-eyebrow">More from Cloudence</p>
          <h2 class="mt-3 text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl">Other <span>products.</span></h2>
        </div>
        <a href="{{ url('/products') }}" class="inline-flex shrink-0 items-center gap-2 border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500">All products {!! $arrow !!}</a>
      </div>
      <div class="mt-12 grid gap-x-8 gap-y-14 md:grid-cols-2">
        @foreach ($others as $k => $o)
          <a href="{{ url('/products/' . $k) }}" class="group flex flex-col">
            @if (!empty($o['shots'][0]['file']))
              <div class="overflow-hidden border border-neutral-200 bg-white transition-colors group-hover:border-[var(--ink)]">
                <div class="flex h-9 items-center gap-3 border-b border-neutral-200 bg-neutral-50 px-4">
                  <span class="flex shrink-0 gap-1.5" aria-hidden="true"><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i><i class="h-2 w-2 bg-neutral-300"></i></span>
                  <span class="min-w-0 truncate text-[11.5px] text-neutral-500">{{ $o['address'] }}</span>
                </div>
                <div class="overflow-hidden">
                  <img src="{{ asset('images/products/' . $k . '/' . $o['shots'][0]['file']) }}" alt="{{ $o['name'] }} — {{ $o['shots'][0]['title'] }}" loading="lazy" decoding="async" class="aspect-[16/10] w-full object-cover object-top transition-transform duration-700 group-hover:scale-[1.02]">
                </div>
              </div>
            @endif
            <div class="mt-6 flex items-start justify-between gap-4">
              <div>
                <p class="text-xs font-medium uppercase tracking-wider text-neutral-500">{{ $o['category'] }}</p>
                <h3 class="mt-2 text-2xl font-black leading-tight tracking-[-0.02em] group-hover:text-neutral-500">{{ $o['name'] }}</h3>
                <p class="mt-2 text-[14.5px] leading-relaxed text-neutral-500">{{ $o['tagline'] }}</p>
              </div>
              <span class="mt-1 flex h-9 w-9 shrink-0 items-center justify-center border border-neutral-200 transition-colors group-hover:border-[var(--ink)] group-hover:bg-[var(--ink)] group-hover:text-white">{!! $arrow !!}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endif

@endsection
