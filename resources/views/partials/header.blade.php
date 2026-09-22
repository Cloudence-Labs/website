@php
  $navItems = config('site.nav');
  $phone1   = config('site.phone1');
  $waBook   = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");
  $children = fn ($item) => $item['children'] ?? null;
@endphp

<!-- ═══════════════ HEADER ═══════════════ -->
<header id="siteHeader" class="fixed inset-x-0 top-0 z-50 transition-all duration-500">
  <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
    <div id="headerBar" class="flex items-center justify-between py-5 transition-all duration-500">
      <a href="{{ url('/') }}" class="flex items-center shrink-0">
        <img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="h-7 w-auto">
      </a>

      <nav class="hidden lg:flex items-center gap-6 xl:gap-8 text-[13.5px] font-medium text-graphite">
        @foreach ($navItems as $item)
          @php $active = $item['url'] === '/' ? request()->is('/') : request()->is(ltrim($item['url'], '/') . '*'); @endphp
          @if ($subs = $children($item))
            {{-- Dropdown --}}
            <div class="relative group">
              <a href="{{ url($item['url']) }}"
                 class="inline-flex items-center gap-1 py-2 hover:text-ink transition-colors {{ $active ? 'text-ink' : '' }}">
                <span class="link-underline">{{ $item['label'] }}</span>
                <span class="material-symbols-outlined text-[17px] transition-transform duration-300 group-hover:rotate-180">expand_more</span>
              </a>
              <div class="absolute left-1/2 -translate-x-1/2 top-full pt-3 opacity-0 invisible translate-y-1
                          group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                          group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                          transition-all duration-300 ease-out">
                @php $twoCol = count($subs) > 3; @endphp
                <div class="{{ $twoCol ? 'w-[640px]' : 'w-[340px]' }} rounded-[22px] border border-mist bg-paper p-3 shadow-[0_30px_80px_-30px_rgba(20,20,20,.3)]">
                  <div class="grid {{ $twoCol ? 'grid-cols-2' : 'grid-cols-1' }} gap-1">
                    @foreach ($subs as $sub)
                      <a href="{{ url($sub['url']) }}"
                         class="flex items-center gap-3.5 rounded-2xl px-3.5 py-3 hover:bg-ivory transition-colors">
                        <span class="w-10 h-10 shrink-0 rounded-xl bg-accent/10 flex items-center justify-center text-accent">
                          <span class="material-symbols-outlined text-[20px]">{{ $sub['icon'] }}</span>
                        </span>
                        <span class="min-w-0">
                          <span class="block text-[14px] font-semibold text-ink leading-snug">{{ $sub['label'] }}</span>
                          @if (!empty($sub['blurb']))
                            <span class="block mt-0.5 text-[12.5px] text-graphite leading-snug truncate">{{ $sub['blurb'] }}</span>
                          @endif
                        </span>
                      </a>
                    @endforeach
                  </div>
                  <div class="mt-2 pt-3 px-3.5 pb-1 border-t border-mist flex items-center justify-between">
                    <span class="text-[12.5px] text-graphite">{{ count($subs) }} {{ Str::lower($item['label']) === 'company' ? 'pages' : Str::lower($item['label']) }}</span>
                    <a href="{{ url($item['url']) }}" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-ink">
                      <span class="link-underline">View all</span>
                      <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @else
            <a href="{{ url($item['url']) }}"
               class="link-underline hover:text-ink transition-colors {{ $active ? 'text-ink' : '' }}">{{ $item['label'] }}</a>
          @endif
        @endforeach
      </nav>

      <div class="hidden lg:flex items-center gap-3">
        <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="hidden xl:inline-flex text-[13.5px] font-semibold text-ink px-4 py-2.5 rounded-full hover:bg-ink/[.05] transition-colors">{{ $phone1 }}</a>
        <a href="{{ $waBook }}" target="_blank" rel="noopener"
           class="group inline-flex items-center gap-2 text-[13.5px] font-semibold text-ivory bg-ink hover:bg-black px-5 py-2.5 rounded-full transition-all active:scale-[.98]">
          Book a consultation
          <span class="material-symbols-outlined text-[16px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
        </a>
      </div>

      <button type="button" id="menuBtn" aria-label="Open menu" class="lg:hidden w-10 h-10 -mr-2 flex items-center justify-center text-ink">
        <span class="material-symbols-outlined text-[26px]">menu</span>
      </button>
    </div>
  </div>
</header>

<!-- Mobile menu -->
<div id="mobileMenu" class="fixed inset-0 z-[60] hidden bg-ivory overflow-y-auto">
  <div class="mx-auto max-w-[1240px] px-6">
    <div class="flex items-center justify-between py-5">
      <a href="{{ url('/') }}"><img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="h-7 w-auto"></a>
      <button type="button" id="menuClose" aria-label="Close menu" class="w-10 h-10 -mr-2 flex items-center justify-center text-ink">
        <span class="material-symbols-outlined text-[26px]">close</span>
      </button>
    </div>
    <nav class="mt-6 flex flex-col">
      @foreach ($navItems as $i => $item)
        @if ($subs = $children($item))
          <div class="border-t border-mist">
            <div class="py-4 flex items-center justify-between">
              <a href="{{ url($item['url']) }}" class="mobile-link flex items-baseline gap-4 text-[20px] tracking-tight font-medium">
                <span class="eyebrow text-accent">0{{ $i + 1 }}</span> {{ $item['label'] }}
              </a>
              <button type="button" data-sub-toggle aria-controls="mobileSub{{ $i }}" aria-expanded="false" aria-label="Show {{ $item['label'] }}"
                      class="w-11 h-11 -mr-2 rounded-full flex items-center justify-center text-ink hover:bg-ink/[.05]">
                <span class="material-symbols-outlined text-[24px] transition-transform duration-300">expand_more</span>
              </button>
            </div>
            <div id="mobileSub{{ $i }}" class="hidden pb-5 pl-9 grid gap-1">
              @foreach ($subs as $sub)
                <a href="{{ url($sub['url']) }}" class="mobile-link flex items-center gap-3 py-1.5 text-[15px] font-medium text-ink">
                  <span class="material-symbols-outlined text-[19px] text-accent">{{ $sub['icon'] }}</span>
                  {{ $sub['label'] }}
                </a>
              @endforeach
            </div>
          </div>
        @else
          <a href="{{ url($item['url']) }}" class="mobile-link border-t border-mist py-4 flex items-baseline gap-4 text-[20px] tracking-tight font-medium">
            <span class="eyebrow text-accent">0{{ $i + 1 }}</span> {{ $item['label'] }}
          </a>
        @endif
      @endforeach
      <div class="border-t border-mist pt-8 mt-2 flex flex-col gap-3 pb-10">
        <a href="{{ $waBook }}" target="_blank" rel="noopener" class="text-center text-[15px] font-semibold text-ivory bg-ink px-6 py-4 rounded-full">Book a consultation</a>
        <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="text-center text-[15px] font-semibold text-ink border border-mist px-6 py-4 rounded-full">{{ $phone1 }}</a>
      </div>
    </nav>
  </div>
</div>
