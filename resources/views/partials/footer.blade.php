@php
  $mail   = config('site.mail');
  $phone1 = config('site.phone1');
  $phone2 = config('site.phone2');
  $socialPaths = [
    'linkedin'  => 'M4.98 3.5a2.5 2.5 0 1 1-.02 5 2.5 2.5 0 0 1 .02-5zM3 8.98h4v12.02H3V8.98zM9.5 8.98h3.83v1.64h.05c.53-.95 1.83-1.96 3.77-1.96 4.03 0 4.78 2.5 4.78 5.76V21h-4v-5.72c0-1.36-.03-3.12-1.9-3.12-1.9 0-2.19 1.49-2.19 3.02V21h-4V8.98z',
    'x'         => 'M17.53 3H20.5l-6.49 7.42L21.5 21h-5.98l-4.68-6.12L5.48 21H2.5l6.94-7.93L2.5 3h6.13l4.23 5.6L17.53 3zm-1.05 16.2h1.65L7.6 4.7H5.83l10.65 14.5z',
    'facebook'  => 'M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.54-1.5h1.66V3.63A22 22 0 0 0 14.3 3.5c-2.4 0-4.05 1.47-4.05 4.16V9.9H7.6V13h2.65v8h3.25z',
    'instagram' => 'M12 7.38A4.62 4.62 0 1 0 16.62 12 4.63 4.63 0 0 0 12 7.38zm0 7.62A3 3 0 1 1 15 12a3 3 0 0 1-3 3zm5.88-7.8a1.08 1.08 0 1 1-1.08-1.08 1.08 1.08 0 0 1 1.08 1.08zM21 8.1a5.34 5.34 0 0 0-1.46-3.78A5.34 5.34 0 0 0 15.76 2.9C14.1 2.8 9.9 2.8 8.24 2.9a5.34 5.34 0 0 0-3.78 1.42A5.34 5.34 0 0 0 3 8.1C2.9 9.76 2.9 14.24 3 15.9a5.34 5.34 0 0 0 1.46 3.78 5.34 5.34 0 0 0 3.78 1.42c1.66.1 5.86.1 7.52 0a5.34 5.34 0 0 0 3.78-1.42A5.34 5.34 0 0 0 21 15.9c.1-1.66.1-6.14 0-7.8zm-1.94 9.5a3.04 3.04 0 0 1-1.71 1.71c-1.18.47-3.99.36-5.35.36s-4.17.11-5.35-.36a3.04 3.04 0 0 1-1.71-1.71c-.47-1.18-.36-3.99-.36-5.35s-.11-4.17.36-5.35A3.04 3.04 0 0 1 6.65 5.2c1.18-.47 3.99-.36 5.35-.36s4.17-.11 5.35.36a3.04 3.04 0 0 1 1.71 1.71c.47 1.18.36 3.99.36 5.35s.11 4.17-.36 5.35z',
  ];
@endphp

<footer class="relative overflow-hidden border-t border-line">
  <div class="glow-orb -bottom-40 left-1/2 h-[30rem] w-[60rem] -translate-x-1/2 opacity-40"></div>

  {{-- Liquid-metal wordmark: the module draws into the canvas; the <img> underneath is the no-JS / no-WebGL fallback --}}
  <div class="wrap-wide relative pt-20 lg:pt-28">
    <div class="relative" aria-label="{{ config('site.name') }}">
      <img src="{{ asset('images/main/logo.png') }}" alt="" class="liquid-wordmark opacity-90" width="2115" height="401" loading="lazy" decoding="async">
      <canvas data-liquid-logo="{{ asset('images/main/logo.png') }}" class="liquid-wordmark absolute inset-0 opacity-0 transition-opacity duration-1000 [&.is-ready]:opacity-100" aria-hidden="true"></canvas>
    </div>
  </div>

  <div class="wrap relative pb-12 pt-16 lg:pb-16 lg:pt-24">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-8">
      <div class="lg:col-span-4">
        <p class="max-w-sm text-[15px] leading-relaxed text-fg-2">
          {{ config('site.tagline') }} ICT solutions for businesses and government institutions across Nigeria.
        </p>
        <div class="mt-8 flex items-center gap-2.5">
          @foreach (config('site.social') as $s)
            <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"
               class="flex h-10 w-10 items-center justify-center rounded-full border border-line text-fg-2 transition-colors hover:border-fg hover:bg-fg hover:text-bg">
              <svg class="h-[17px] w-[17px] fill-current" viewBox="0 0 24 24"><path d="{{ $socialPaths[$s['icon']] }}"/></svg>
            </a>
          @endforeach
        </div>
      </div>

      <div class="grid grid-cols-2 gap-x-8 gap-y-10 md:grid-cols-3 lg:col-span-8">
        @foreach (config('site.footer') as $heading => $links)
          <div>
            <div class="eyebrow text-fg-3">{{ $heading }}</div>
            <ul class="mt-5 space-y-3 text-[14px]">
              @foreach ($links as $l)
                <li><a href="{{ url($l['url']) }}" class="link-underline text-fg-2 transition-colors hover:text-fg">{{ $l['label'] }}</a></li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
    </div>

    <div class="mt-16 grid gap-8 border-t border-line pt-10 sm:grid-cols-2 md:grid-cols-3">
      @foreach (config('site.offices') as $o)
        <div>
          <div class="flex items-center gap-2 text-accent">
            <span class="material-symbols-outlined text-[17px]">location_on</span>
            <span class="text-[14px] font-bold tracking-tight text-fg">{{ $o['city'] }}</span>
          </div>
          <p class="mt-2 text-[13.5px] leading-relaxed text-fg-2">{{ $o['address'] }}</p>
          <a href="tel:{{ str_replace(' ', '', $o['phone']) }}" class="link-underline mt-2 inline-block text-[13.5px] font-semibold text-fg">{{ $o['phone'] }}</a>
        </div>
      @endforeach
      <div>
        <div class="flex items-center gap-2 text-accent">
          <span class="material-symbols-outlined text-[17px]">alternate_email</span>
          <span class="text-[14px] font-bold tracking-tight text-fg">Get in touch</span>
        </div>
        <ul class="mt-2 space-y-1.5 text-[13.5px] text-fg-2">
          <li><a href="mailto:{{ $mail }}" class="link-underline hover:text-fg">{{ $mail }}</a></li>
          @if (config('site.mail2'))<li><a href="mailto:{{ config('site.mail2') }}" class="link-underline hover:text-fg">{{ config('site.mail2') }}</a></li>@endif
          <li><a href="tel:{{ str_replace(' ', '', $phone1) }}" class="link-underline hover:text-fg">{{ $phone1 }}</a>, <a href="tel:{{ str_replace(' ', '', $phone2) }}" class="link-underline hover:text-fg">{{ $phone2 }}</a></li>
        </ul>
      </div>
    </div>

    <div class="mt-12 flex flex-col items-center justify-between gap-4 text-[13px] text-fg-3 sm:flex-row">
      <p>© {{ date('Y') }} {{ config('site.legal') }}. All rights reserved.</p>
      <div class="flex items-center gap-6">
        <span class="inline-flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse-dot"></span>Abuja · Calabar</span>
        <a href="#top" class="link-underline hover:text-fg">Back to top</a>
      </div>
    </div>
  </div>
</footer>
