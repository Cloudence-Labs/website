{{--
  v2 header: logo and links on the left, one outlined action on the right (after the reference).
  Menu items and dropdown contents come from config('site.nav'), same as the main header.
  Dropdown open/close is the shared mega-menu behaviour in app.js (data-menu-trigger / data-menu-panel).
--}}
@php
  $navItems = collect(config('site.nav'))->reject(fn ($n) => $n['url'] === '/')->values();
  $tones    = ['#c9cef6', '#efe993', '#c4e8d3', '#f7d3dc', '#c3def4', '#ddd2f7', '#e7d9c9'];
  $isActive = fn ($url) => request()->is(ltrim($url, '/') . '*');
@endphp
<header id="v2Nav" class="v2-nav" data-menu-root>
  <div class="v2-wrap flex h-[72px] items-center justify-between gap-6">
    <div class="flex items-center gap-8">
      <a href="{{ url('/') }}" class="shrink-0" aria-label="{{ config('site.name') }} home">
        <img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="v2-logo h-[19px] w-auto" width="2115" height="401">
      </a>
      <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary">
        @foreach ($navItems as $i => $item)
          @if (!empty($item['children']))
            @php
              $subs    = $item['children'];
              $grouped = collect($subs)->contains(fn ($x) => !empty($x['group']));
              $twoCol  = count($subs) > 4;
            @endphp
            <div class="relative">
              <a href="{{ url($item['url']) }}" class="v2-navlink" data-menu-trigger="v2m{{ $i }}" aria-expanded="false" aria-controls="v2Drop{{ $i }}">
                {{ $item['label'] }}<span class="material-symbols-outlined v2-chev text-[17px]">expand_more</span>
              </a>
              <div id="v2Drop{{ $i }}" class="v2-drop {{ $twoCol ? 'is-wide' : '' }}" data-menu-panel="v2m{{ $i }}">
                <div class="v2-drop-card">
                  <div class="grid gap-1 {{ $twoCol ? 'grid-cols-2' : 'grid-cols-1' }}">
                    @php $lastGroup = null; @endphp
                    @foreach ($subs as $k => $sub)
                      @if ($grouped && ($sub['group'] ?? null) !== $lastGroup)
                        @php $lastGroup = $sub['group'] ?? null; @endphp
                        <div class="col-span-full px-3 pb-1 pt-3 text-[12px] font-bold text-[var(--k-ink-3)] first:pt-1">{{ $lastGroup }}</div>
                      @endif
                      <a href="{{ url($sub['url']) }}" class="v2-drop-item {{ request()->is(ltrim($sub['url'], '/')) ? 'is-current' : '' }}">
                        <span class="v2-drop-icon" style="background: {{ $tones[$k % count($tones)] }}"><span class="material-symbols-outlined text-[20px]">{{ $sub['icon'] }}</span></span>
                        <span class="min-w-0">
                          <span class="block text-[14.5px] font-bold leading-snug tracking-[-0.01em]">{{ $sub['label'] }}</span>
                          @if (!empty($sub['blurb']))<span class="mt-0.5 block truncate text-[13px] leading-snug text-[var(--k-ink-2)]">{{ $sub['blurb'] }}</span>@endif
                        </span>
                      </a>
                    @endforeach
                  </div>
                  <a href="{{ url($item['url']) }}" class="v2-drop-all">
                    <span>View all {{ Str::lower($item['label']) === 'company' ? 'company pages' : Str::lower($item['label']) }}</span>
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                  </a>
                </div>
              </div>
            </div>
          @else
            <a href="{{ url($item['url']) }}" class="v2-navlink {{ $isActive($item['url']) ? 'is-active' : '' }}">{{ $item['label'] }}</a>
          @endif
        @endforeach
      </nav>
    </div>
    <div class="flex items-center gap-2">
      <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v2-btn v2-btn-line hidden sm:inline-flex">
        <span class="material-symbols-outlined text-[18px]">calendar_month</span>Book a call
      </a>
      <button type="button" id="menuBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu" class="v2-iconbtn lg:hidden">
        <span class="material-symbols-outlined text-[22px]">menu</span>
      </button>
    </div>
  </div>
</header>

{{-- Mobile menu: uses the shared #mobileMenu and [data-sub-toggle] behaviour from app.js --}}
<div id="mobileMenu" aria-hidden="true">
  <div class="v2-wrap flex min-h-full flex-col">
    <div class="flex h-[72px] items-center justify-between">
      <a href="{{ url('/') }}" class="mobile-link"><img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="v2-logo h-[19px] w-auto"></a>
      <button type="button" id="menuClose" aria-label="Close menu" class="v2-iconbtn"><span class="material-symbols-outlined text-[24px]">close</span></button>
    </div>
    <nav class="mt-6 flex flex-col" aria-label="Mobile">
      @foreach ($navItems as $i => $item)
        <div class="border-b border-[var(--k-line)]">
          <div class="flex items-center justify-between py-3">
            <a href="{{ url($item['url']) }}" class="mobile-link text-[30px] font-bold tracking-[-0.04em]">{{ $item['label'] }}</a>
            @if (!empty($item['children']))
              <button type="button" class="mobile-sub-toggle v2-iconbtn" data-sub-toggle aria-controls="v2MobileSub{{ $i }}" aria-expanded="false" aria-label="Show {{ $item['label'] }}">
                <span class="material-symbols-outlined chev text-[24px]">expand_more</span>
              </button>
            @endif
          </div>
          @if (!empty($item['children']))
            <div id="v2MobileSub{{ $i }}" class="mobile-sub gap-1 pb-4">
              @foreach ($item['children'] as $k => $sub)
                <a href="{{ url($sub['url']) }}" class="mobile-link flex items-center gap-3 py-1.5 text-[16px] font-medium">
                  <span class="v2-drop-icon !h-9 !w-9" style="background: {{ $tones[$k % count($tones)] }}"><span class="material-symbols-outlined text-[18px]">{{ $sub['icon'] }}</span></span>{{ $sub['label'] }}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </nav>
    <div class="mt-auto flex flex-col gap-3 py-8">
      <a href="{{ $waBook }}" target="_blank" rel="noopener" class="v2-btn v2-btn-ink">Book a call</a>
      <a href="tel:{{ str_replace(' ', '', config('site.phone1')) }}" class="v2-btn v2-btn-line">{{ config('site.phone1') }}</a>
    </div>
  </div>
</div>
