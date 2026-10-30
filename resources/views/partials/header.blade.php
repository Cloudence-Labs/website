@php
  $navItems = config('site.nav');
  $phone1   = config('site.phone1');
  $waBook   = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");
  $isActive = fn ($url) => $url === '/' ? request()->is('/') : request()->is(ltrim($url, '/') . '*');
@endphp

<header id="siteHeader" class="fixed inset-x-0 top-0 z-50" data-menu-root>
  <div class="wrap relative pt-4 sm:pt-5">
    {{-- Glass pill: liquid-web wants exactly one child inside the wrapper --}}
    <div data-liquid class="glass relative overflow-hidden rounded-full">
      <div class="nav-pill flex items-center justify-between gap-4 py-2.5 pl-5 pr-2.5 sm:pl-6">
        <a href="{{ url('/') }}" class="flex shrink-0 items-center" aria-label="{{ config('site.name') }} home">
          <img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="h-[22px] w-auto" width="2115" height="401">
        </a>

        <nav class="hidden items-center lg:flex" aria-label="Primary">
          @foreach ($navItems as $i => $item)
            @if (!empty($item['children']))
              <a href="{{ url($item['url']) }}" class="nav-link {{ $isActive($item['url']) ? 'is-active' : '' }}"
                 data-menu-trigger="menu{{ $i }}" aria-expanded="false" aria-controls="megaMenu{{ $i }}">
                {{ $item['label'] }}
                <span class="material-symbols-outlined chev text-[16px] text-fg-3">expand_more</span>
              </a>
            @else
              <a href="{{ url($item['url']) }}" class="nav-link {{ $isActive($item['url']) ? 'is-active' : '' }}">{{ $item['label'] }}</a>
            @endif
          @endforeach
        </nav>

        <div class="flex items-center gap-2">
          <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="hidden rounded-full px-3.5 py-2 text-[13.5px] font-semibold text-fg-2 transition-colors hover:text-fg xl:inline-flex">{{ $phone1 }}</a>
          <a href="{{ $waBook }}" target="_blank" rel="noopener" class="btn btn-primary btn-sm hidden sm:inline-flex">
            Book a consultation <span class="material-symbols-outlined arrow text-[16px]">arrow_forward</span>
          </a>
          <button type="button" id="menuBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu"
                  class="flex h-10 w-10 items-center justify-center rounded-full text-fg transition-colors hover:bg-fg/10 lg:hidden">
            <span class="material-symbols-outlined text-[24px]">menu</span>
          </button>
        </div>
      </div>
    </div>

    {{-- Mega menus live outside the pill so its rounded clip never cuts them off --}}
    @foreach ($navItems as $i => $item)
      @if (!empty($item['children']))
        @php
          $subs    = $item['children'];
          $grouped = collect($subs)->contains(fn ($x) => !empty($x['group']));
          $cols    = count($subs) > 4 ? 3 : (count($subs) > 2 ? 2 : 1);
        @endphp
        <div id="megaMenu{{ $i }}" class="mega hidden lg:block" data-menu-panel="menu{{ $i }}">
          <div class="glass rounded-xl3 p-3 sm:p-4" style="background: rgba(255,255,255,.92)">
            <div class="grid gap-x-2 gap-y-1 {{ $cols === 3 ? 'grid-cols-3' : ($cols === 2 ? 'grid-cols-2' : 'grid-cols-1') }}">
              @php $lastGroup = null; @endphp
              @foreach ($subs as $sub)
                @if ($grouped && ($sub['group'] ?? null) !== $lastGroup)
                  @php $lastGroup = $sub['group'] ?? null; @endphp
                  <div class="col-span-full px-3.5 pb-1 pt-3 first:pt-1"><span class="eyebrow text-fg-3">{{ $lastGroup }}</span></div>
                @endif
                <a href="{{ url($sub['url']) }}" class="mega-item">
                  <span class="icon-tile h-10 w-10"><span class="material-symbols-outlined text-[20px]">{{ $sub['icon'] }}</span></span>
                  <span class="min-w-0">
                    <span class="block text-[14px] font-semibold leading-snug text-fg">{{ $sub['label'] }}</span>
                    @if (!empty($sub['blurb']))<span class="mt-0.5 block truncate text-[12.5px] leading-snug text-fg-3">{{ $sub['blurb'] }}</span>@endif
                  </span>
                </a>
              @endforeach
            </div>
            <div class="mt-2 flex items-center justify-between border-t border-line px-3.5 pb-1 pt-3">
              <span class="text-[12.5px] text-fg-3">{{ count($subs) }} {{ Str::lower($item['label']) === 'company' ? 'pages' : Str::lower($item['label']) }}</span>
              <a href="{{ url($item['url']) }}" class="link text-[13px]"><span class="link-underline">View all</span><span class="material-symbols-outlined text-[16px]">arrow_forward</span></a>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
</header>

<div id="mobileMenu" aria-hidden="true">
  <div class="wrap flex min-h-full flex-col">
    <div class="flex items-center justify-between pt-5">
      <a href="{{ url('/') }}" class="mobile-link"><img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="h-[22px] w-auto"></a>
      <button type="button" id="menuClose" aria-label="Close menu" class="flex h-11 w-11 items-center justify-center rounded-full text-fg hover:bg-fg/10">
        <span class="material-symbols-outlined text-[26px]">close</span>
      </button>
    </div>
    <nav class="mt-10 flex flex-col" aria-label="Mobile">
      @foreach ($navItems as $i => $item)
        <div class="border-t border-line">
          <div class="flex items-center justify-between py-4">
            <a href="{{ url($item['url']) }}" class="mobile-link flex items-baseline gap-4 text-[26px] font-bold tracking-tightest">
              <span class="eyebrow text-accent">0{{ $i + 1 }}</span>{{ $item['label'] }}
            </a>
            @if (!empty($item['children']))
              <button type="button" class="mobile-sub-toggle flex h-11 w-11 items-center justify-center rounded-full text-fg hover:bg-fg/10" data-sub-toggle
                      aria-controls="mobileSub{{ $i }}" aria-expanded="false" aria-label="Show {{ $item['label'] }}">
                <span class="material-symbols-outlined chev text-[24px]">expand_more</span>
              </button>
            @endif
          </div>
          @if (!empty($item['children']))
            <div id="mobileSub{{ $i }}" class="mobile-sub gap-1 pb-5 pl-10">
              @php $lastGroup = null; @endphp
              @foreach ($item['children'] as $sub)
                @if (!empty($sub['group']) && $sub['group'] !== $lastGroup)
                  @php $lastGroup = $sub['group']; @endphp
                  <div class="eyebrow pt-3 text-fg-3 first:pt-0">{{ $lastGroup }}</div>
                @endif
                <a href="{{ url($sub['url']) }}" class="mobile-link flex items-center gap-3 py-1.5 text-[16px] font-medium text-fg-2 hover:text-fg">
                  <span class="material-symbols-outlined text-[19px] text-accent">{{ $sub['icon'] }}</span>{{ $sub['label'] }}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </nav>
    <div class="mt-auto flex flex-col gap-3 border-t border-line py-8">
      <a href="{{ $waBook }}" target="_blank" rel="noopener" class="btn btn-accent">Book a consultation</a>
      <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="btn btn-ghost">{{ $phone1 }}</a>
    </div>
  </div>
</div>
