{{-- v2 footer: monochrome, no orange --}}
@php
  $services = config('site.services');
  $offices  = config('site.offices');
@endphp
<footer class="v2-footer">
  <div class="v2-wrap pb-10 pt-20 lg:pt-24">
    <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-12">
      <div class="lg:col-span-4">
        <img src="{{ asset('images/main/logo.png') }}" alt="{{ config('site.name') }}" class="v2-logo h-[22px] w-auto" width="2115" height="401" loading="lazy">
        <p class="mt-6 max-w-xs text-[15px] leading-relaxed text-[var(--k-ink-2)]">Software, networks and security systems for businesses and government across Nigeria.</p>
        <div class="mt-8 flex flex-col gap-1 text-[15px] font-medium">
          <a href="mailto:{{ config('site.mail') }}" class="v2-flink">{{ config('site.mail') }}</a>
          <a href="tel:{{ str_replace(' ', '', config('site.phone1')) }}" class="v2-flink">{{ config('site.phone1') }}</a>
        </div>
      </div>
      <div class="lg:col-span-3">
        <h2 class="v2-fhead">Services</h2>
        <ul class="mt-5 space-y-2.5">
          @foreach ($services as $s)<li><a href="{{ url('/services/' . $s['slug']) }}" class="v2-flink">{{ $s['short'] }}</a></li>@endforeach
        </ul>
      </div>
      <div class="lg:col-span-2">
        <h2 class="v2-fhead">Company</h2>
        <ul class="mt-5 space-y-2.5">
          <li><a href="{{ url('/about') }}" class="v2-flink">About us</a></li>
          <li><a href="{{ url('/products') }}" class="v2-flink">Products</a></li>
          <li><a href="{{ url('/industries') }}" class="v2-flink">Industries</a></li>
          <li><a href="{{ url('/contact') }}" class="v2-flink">Contact</a></li>
        </ul>
      </div>
      <div class="lg:col-span-3">
        <h2 class="v2-fhead">Offices</h2>
        <div class="mt-5 space-y-5">
          @foreach ($offices as $o)
            <div><div class="text-[15px] font-semibold">{{ $o['city'] }}</div><p class="mt-1 text-[14px] leading-relaxed text-[var(--k-ink-2)]">{{ $o['address'] }}</p></div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="mt-16 flex flex-col justify-between gap-3 border-t border-[var(--k-line)] pt-6 text-[13px] text-[var(--k-ink-3)] sm:flex-row">
      <span>&copy; {{ date('Y') }} {{ config('site.legal') }}</span>
      <a href="#top" class="v2-flink">Back to top</a>
    </div>
  </div>
</footer>
