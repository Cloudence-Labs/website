@php
  $services = config('site.services');
  $credits  = config('photo-credits');
@endphp
<footer class="bg-[var(--ink)] text-white">
  {{-- Closing call to action --}}
  <div class="v3-wrap grid gap-10 border-b border-white/10 py-20 lg:grid-cols-12 lg:py-28">
    <h2 class="text-3xl font-black leading-[1.05] tracking-[-0.03em] sm:text-4xl lg:col-span-7 lg:text-5xl">Have a project in mind?<br><span>Let's talk.</span></h2>
    <div class="flex flex-col justify-end gap-6 lg:col-span-5">
      <p class="max-w-md text-[15px] leading-relaxed text-white/60">Tell us what you need built, installed or fixed. We reply within one working day.</p>
      <div class="flex flex-wrap gap-3">
        <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 bg-[var(--blue)] px-6 py-3.5 text-sm font-medium transition-colors hover:bg-[var(--blue-hover)]">
          Request a quote
          <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
        </a>
        <a href="{{ config('site.whatsapp') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 border border-white/20 px-6 py-3.5 text-sm font-medium transition-colors hover:border-white/60">WhatsApp us</a>
      </div>
    </div>
  </div>

  <div class="v3-wrap grid gap-12 py-16 sm:grid-cols-2 lg:grid-cols-12">
    <div class="lg:col-span-4">
      <img src="{{ asset('images/main/logo-light.png') }}" alt="{{ config('site.name') }}" class="h-[24px] w-auto" width="2794" height="458" loading="lazy">
      <p class="mt-6 max-w-xs text-sm leading-relaxed text-white/50">{{ config('site.tagline') }}</p>
    </div>
    <div class="lg:col-span-3">
      <h3 class="text-xs font-medium uppercase tracking-wider text-white/40">Services</h3>
      <ul class="mt-5 space-y-2.5 text-sm">
        @foreach ($services as $s)
          <li><a href="{{ url('/services/' . $s['slug']) }}" class="text-white/75 transition-colors hover:text-white">{{ $s['short'] }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="lg:col-span-2">
      <h3 class="text-xs font-medium uppercase tracking-wider text-white/40">Company</h3>
      <ul class="mt-5 space-y-2.5 text-sm">
        @foreach (['/about' => 'About', '/products' => 'Products', '/industries' => 'Industries', '/news' => 'News', '/contact' => 'Contact'] as $url => $label)
          <li><a href="{{ url($url) }}" class="text-white/75 transition-colors hover:text-white">{{ $label }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="lg:col-span-3">
      <h3 class="text-xs font-medium uppercase tracking-wider text-white/40">Offices</h3>
      <ul class="mt-5 space-y-5 text-sm">
        @foreach (config('site.offices') as $o)
          <li>
            <div class="font-bold">{{ $o['city'] }}</div>
            <div class="mt-1 leading-relaxed text-white/60">{{ $o['address'] }}</div>
            <a href="tel:{{ preg_replace('/\s+/', '', $o['phone']) }}" class="mt-1 inline-block text-white/75 hover:text-white">{{ $o['phone'] }}</a>
          </li>
        @endforeach
        <li><a href="mailto:{{ config('site.mail') }}" class="text-white/75 hover:text-white">{{ config('site.mail') }}</a></li>
      </ul>
    </div>
  </div>

  <div class="v3-wrap flex flex-col gap-4 border-t border-white/10 py-8 text-xs text-white/40 md:flex-row md:items-start md:justify-between">
    <p class="shrink-0">&copy; {{ date('Y') }} {{ config('site.legal') }}</p>
    <details class="md:text-right">
      <summary class="cursor-pointer hover:text-white/70">Photo credits</summary>
      <ul class="mt-3 space-y-1">
        @foreach ($credits as $slug => $c)
          <li><a href="{{ $c['source'] }}" target="_blank" rel="noopener" class="hover:text-white/70">{{ $c['label'] ?? collect($services)->firstWhere('slug', $slug)['short'] ?? $slug }}: {{ $c['author'] }}, {{ $c['license'] }}</a></li>
        @endforeach
      </ul>
    </details>
  </div>
</footer>
