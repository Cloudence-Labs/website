@php
  $mail   = config('site.mail');
  $phone1 = config('site.phone1');
  $phone2 = config('site.phone2');
  $socialPaths = [
    'linkedin'  => 'M4.98 3.5a2.5 2.5 0 1 1-.02 5 2.5 2.5 0 0 1 .02-5zM3 8.98h4v12.02H3V8.98zM9.5 8.98h3.83v1.64h.05c.53-.95 1.83-1.96 3.77-1.96 4.03 0 4.78 2.5 4.78 5.76V21h-4v-5.72c0-1.36-.03-3.12-1.94-3.12-1.94 0-2.24 1.48-2.24 3.02V21h-4V8.98z',
    'x'         => 'M17.53 3H20.5l-6.49 7.42L21.5 21h-5.98l-4.68-6.12L5.48 21H2.5l6.94-7.93L2.5 3h6.13l4.23 5.6L17.53 3zm-1.05 16.2h1.65L7.6 4.7H5.83l10.65 14.5z',
    'facebook'  => 'M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.54-1.5h1.66V3.63A22 22 0 0 0 14.3 3.5c-2.4 0-4.05 1.47-4.05 4.16V9.9H7.6V13h2.65v8h3.25z',
    'instagram' => 'M12 7.38A4.62 4.62 0 1 0 16.62 12 4.63 4.63 0 0 0 12 7.38zm0 7.62A3 3 0 1 1 15 12a3 3 0 0 1-3 3zm5.88-7.8a1.08 1.08 0 1 1-1.08-1.08 1.08 1.08 0 0 1 1.08 1.08zM21 8.1a5.34 5.34 0 0 0-1.46-3.78A5.37 5.37 0 0 0 15.76 2.9C14.27 2.82 9.73 2.82 8.24 2.9A5.36 5.36 0 0 0 4.46 4.3 5.35 5.35 0 0 0 3 8.09c-.08 1.49-.08 6.03 0 7.52a5.34 5.34 0 0 0 1.46 3.78 5.38 5.38 0 0 0 3.78 1.46c1.49.08 6.03.08 7.52 0a5.34 5.34 0 0 0 3.78-1.46A5.37 5.37 0 0 0 21 15.61c.08-1.49.08-6.02 0-7.51zm-1.93 9.11a3.04 3.04 0 0 1-1.71 1.71c-1.18.47-3.99.36-5.3.36s-4.12.1-5.3-.36a3.04 3.04 0 0 1-1.71-1.71c-.47-1.18-.36-3.99-.36-5.3s-.1-4.12.36-5.3a3.04 3.04 0 0 1 1.71-1.71c1.18-.47 3.99-.36 5.3-.36s4.12-.1 5.3.36a3.04 3.04 0 0 1 1.71 1.71c.47 1.18.36 3.99.36 5.3s.11 4.12-.36 5.3z',
  ];
@endphp

<!-- ═══════════════ FOOTER ═══════════════ -->
<footer class="bg-ink text-ivory">
  <div class="mx-auto max-w-[1240px] px-6 lg:px-10 py-16 lg:py-20">

    <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
      <div class="lg:col-span-4">
        <div class="text-[26px] font-bold tracking-tightest">Cloud<span class="text-accent">ence</span></div>
        <p class="mt-6 max-w-sm text-[15px] leading-relaxed text-ivory/55">
          {{ config('site.tagline') }} ICT solutions for businesses and government institutions
          across Nigeria.
        </p>

        <div class="mt-8 flex items-center gap-3">
          @foreach (config('site.social') as $s)
            <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"
               class="w-10 h-10 rounded-full border border-ivory/15 flex items-center justify-center text-ivory/60 hover:text-ink hover:bg-ivory hover:border-ivory transition-colors">
              <svg class="w-[18px] h-[18px] fill-current" viewBox="0 0 24 24"><path d="{{ $socialPaths[$s['icon']] }}"/></svg>
            </a>
          @endforeach
        </div>

      </div>

      <div class="lg:col-span-8 grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-10">
        @foreach (config('site.footer') as $heading => $links)
          <div>
            <div class="eyebrow text-ivory/40">{{ $heading }}</div>
            <ul class="mt-5 space-y-3 text-[14px]">
              @foreach ($links as $l)
                <li><a href="{{ url($l['url']) }}" class="link-underline text-ivory/65 hover:text-ivory transition-colors">{{ $l['label'] }}</a></li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
    </div>

    <div class="mt-14 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach (config('site.offices') as $o)
        <div>
          <div class="flex items-center gap-2 text-accent">
            <span class="material-symbols-outlined text-[17px]">location_on</span>
            <span class="text-[14px] font-bold tracking-tight text-ivory">{{ $o['city'] }}</span>
          </div>
          <p class="mt-2 text-[13.5px] leading-relaxed text-ivory/55">{{ $o['address'] }}</p>
        </div>
      @endforeach
      <div>
        <div class="flex items-center gap-2 text-accent">
          <span class="material-symbols-outlined text-[17px]">alternate_email</span>
          <span class="text-[14px] font-bold tracking-tight text-ivory">Get in touch</span>
        </div>
        <ul class="mt-2 space-y-1.5 text-[13.5px] text-ivory/55">
          <li><a href="mailto:{{ $mail }}" class="link-underline hover:text-ivory transition-colors">{{ $mail }}</a></li>
          <li>
            <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="link-underline hover:text-ivory transition-colors">{{ $phone1 }}</a>,
            <a href="tel:{{ str_replace(' ', '', $phone2) }}" class="link-underline hover:text-ivory transition-colors">{{ $phone2 }}</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="mt-14 flex flex-col sm:flex-row items-center justify-between gap-4 text-[13px] text-ivory/45">
      <p>© {{ date('Y') }} {{ config('site.legal') }}. All rights reserved.</p>
      <a href="#top" class="link-underline hover:text-ivory transition-colors">Back to top</a>
    </div>
  </div>
</footer>
