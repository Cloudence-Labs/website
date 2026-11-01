{{--
  Rebrand header, after the Stitch reference: logo left; links in a bordered
  group on the right, ending in a full-height blue "Request a quote" block.
  Menu items and dropdowns come from config('site.nav'), same as the main header,
  plus News. Dropdown and mobile-menu behaviour is the shared code in app.js
  (data-menu-trigger / data-menu-panel, #menuBtn / #mobileMenu).
--}}
@php
  $navItems = collect(config('site.nav'));
  $navItems->splice($navItems->search(fn ($n) => $n['url'] === '/contact'), 0, [['url' => '/news', 'label' => 'News']]);
  $phone1   = config('site.phone1');
  $isActive = fn ($url) => $url === '/' ? request()->is('/') : request()->is(ltrim($url, '/') . '*');
@endphp
<header class="sticky top-0 z-50 w-full border-b border-neutral-100 bg-white" data-menu-root>
  <div class="v3-wrap flex h-[76px] items-center justify-between">
    <a href="{{ url('/') }}" class="shrink-0" aria-label="{{ config('site.name') }} home">
      <img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="h-[22px] w-auto" width="2794" height="458">
    </a>

    <div class="flex h-full items-center">
      <nav class="hidden h-full items-center border-l border-neutral-100 min-[1400px]:flex" aria-label="Primary">
        @foreach ($navItems as $i => $item)
          @php $on = $isActive($item['url']); @endphp
          @if (!empty($item['children']))
            @php
              $subs    = $item['children'];
              $grouped = collect($subs)->contains(fn ($x) => !empty($x['group']));
              $cols    = count($subs) > 4 ? 2 : 1;
            @endphp
            <div class="relative h-full">
              <a href="{{ url($item['url']) }}" data-menu-trigger="v3m{{ $i }}" aria-expanded="false" aria-controls="v3Drop{{ $i }}"
                 class="v3-navlink flex h-full items-center gap-0.5 px-3.5 text-sm transition-colors 2xl:px-5 {{ $on ? 'font-bold text-neutral-950' : 'font-medium text-neutral-600 hover:text-neutral-950' }}">
                {{ $item['label'] }}<span class="material-symbols-outlined v3-chev text-[17px] text-neutral-400">expand_more</span>
              </a>
              <div id="v3Drop{{ $i }}" class="v3-drop {{ $cols === 2 ? 'w-[560px]' : 'w-[300px]' }}" data-menu-panel="v3m{{ $i }}">
                <div class="grid gap-1 {{ $cols === 2 ? 'grid-cols-2' : 'grid-cols-1' }}">
                  @php $lastGroup = null; @endphp
                  @foreach ($subs as $sub)
                    @if ($grouped && ($sub['group'] ?? null) !== $lastGroup)
                      @php $lastGroup = $sub['group'] ?? null; @endphp
                      <div class="col-span-full px-3 pb-1 pt-3 text-[11px] font-medium uppercase tracking-wider text-neutral-400 first:pt-1">{{ $lastGroup }}</div>
                    @endif
                    <a href="{{ url($sub['url']) }}" class="group/item flex items-center gap-3 p-3 transition-colors hover:bg-neutral-50">
                      <span class="flex h-10 w-10 shrink-0 items-center justify-center bg-[var(--blue-soft)] text-[var(--blue)] transition-colors group-hover/item:bg-[var(--blue)] group-hover/item:text-white">
                        <span class="material-symbols-outlined text-[20px]">{{ $sub['icon'] }}</span>
                      </span>
                      <span class="min-w-0">
                        <span class="block text-[14px] font-bold leading-snug text-neutral-950">{{ $sub['label'] }}</span>
                        @if (!empty($sub['blurb']))<span class="mt-0.5 block truncate text-[12.5px] leading-snug text-neutral-500">{{ $sub['blurb'] }}</span>@endif
                      </span>
                    </a>
                  @endforeach
                </div>
                <div class="mt-2 flex items-center justify-between border-t border-neutral-100 px-3 pb-1 pt-3">
                  <span class="text-[12.5px] text-neutral-400">{{ count($subs) }} {{ Str::lower($item['label']) === 'company' ? 'pages' : Str::lower($item['label']) }}</span>
                  <a href="{{ url($item['url']) }}" class="inline-flex items-center gap-1 text-[13px] font-medium hover:text-neutral-500">View all<span class="material-symbols-outlined text-[16px]">arrow_forward</span></a>
                </div>
              </div>
            </div>
          @else
            <a href="{{ url($item['url']) }}" @if ($on) aria-current="page" @endif
               class="flex h-full items-center px-3.5 text-sm transition-colors 2xl:px-5 {{ $on ? 'font-bold text-neutral-950' : 'font-medium text-neutral-600 hover:text-neutral-950' }}">{{ $item['label'] }}</a>
          @endif
        @endforeach
      </nav>

      <a href="{{ url('/contact') }}"
         class="hidden h-full shrink-0 items-center gap-2 bg-[var(--blue)] px-5 text-sm font-medium text-white transition-colors hover:bg-[var(--blue-hover)] sm:flex 2xl:px-7">
        <span>Request a quote</span>
        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
      </a>

      <button type="button" id="menuBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu"
              class="ml-3 flex h-11 w-11 items-center justify-center rounded-full border border-neutral-200 min-[1400px]:hidden">
        <span class="material-symbols-outlined text-[22px]">menu</span>
      </button>
    </div>
  </div>
</header>

{{-- Mobile menu: same structure as the main header's --}}
<div id="mobileMenu" aria-hidden="true">
  <div class="flex min-h-full flex-col px-6">
    <div class="flex items-center justify-between pt-5">
      <a href="{{ url('/') }}" class="mobile-link"><img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="h-[22px] w-auto"></a>
      <button type="button" id="menuClose" aria-label="Close menu" class="flex h-11 w-11 items-center justify-center text-neutral-950 hover:bg-neutral-100">
        <span class="material-symbols-outlined text-[26px]">close</span>
      </button>
    </div>
    <nav class="mt-10 flex flex-col" aria-label="Mobile">
      @foreach ($navItems as $i => $item)
        <div class="border-t border-neutral-100">
          <div class="flex items-center justify-between py-3.5">
            <a href="{{ url($item['url']) }}" class="mobile-link flex items-baseline gap-4 text-[18px] font-normal">
              <span class="text-[11px] font-medium tracking-wider text-neutral-500">0{{ $i + 1 }}</span>{{ $item['label'] }}
            </a>
            @if (!empty($item['children']))
              <button type="button" class="mobile-sub-toggle flex h-11 w-11 items-center justify-center text-neutral-950 hover:bg-neutral-100" data-sub-toggle
                      aria-controls="v3MobileSub{{ $i }}" aria-expanded="false" aria-label="Show {{ $item['label'] }}">
                <span class="material-symbols-outlined chev text-[24px]">expand_more</span>
              </button>
            @endif
          </div>
          @if (!empty($item['children']))
            <div id="v3MobileSub{{ $i }}" class="mobile-sub gap-1 pb-5 pl-10">
              @php $lastGroup = null; @endphp
              @foreach ($item['children'] as $sub)
                @if (!empty($sub['group']) && $sub['group'] !== $lastGroup)
                  @php $lastGroup = $sub['group']; @endphp
                  <div class="pt-3 text-[11px] font-medium uppercase tracking-wider text-neutral-400 first:pt-0">{{ $lastGroup }}</div>
                @endif
                <a href="{{ url($sub['url']) }}" class="mobile-link flex items-center gap-3 py-1.5 text-[15px] font-normal text-neutral-600 hover:text-neutral-950">
                  <span class="material-symbols-outlined text-[19px] text-[var(--blue)]">{{ $sub['icon'] }}</span>{{ $sub['label'] }}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </nav>
    <div class="mt-auto flex flex-col gap-3 border-t border-neutral-100 py-8">
      <a href="{{ url('/contact') }}" class="mobile-link flex items-center justify-center bg-[var(--blue)] px-6 py-4 text-[15px] font-medium text-white">Request a quote</a>
      <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="flex items-center justify-center border border-neutral-200 px-6 py-4 text-[15px] font-medium">{{ $phone1 }}</a>
    </div>
  </div>
</div>
