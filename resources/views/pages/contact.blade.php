@extends('layouts.v3')

@section('title', 'Contact Cloudence | Abuja & Calabar Offices')
@section('description', 'Talk to Cloudence about software, networks or infrastructure. Offices in Abuja and Calabar. Call, email, WhatsApp us or send a brief through the form.')

@push('head')
  {!! \App\Support\Seo::offices() !!}
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Contact', '/contact']]) !!}
  {!! \App\Support\Seo::page('ContactPage', 'Contact Cloudence', '/contact', 'Call, email, WhatsApp or send a brief to Cloudence.') !!}
  <style>
    .v3-field.is-error, .v3-field.is-error:focus { border-color: #dc2626; }
    .v3-field.is-empty { color: #a3a3a3; }
    .v3-field.is-empty option { color: var(--ink); }
    .v3-icon.v3-icon-lg { width: 64px; height: 64px; }
  </style>
@endpush

@php
  $mail     = config('site.mail');
  $phone1   = config('site.phone1');
  $wa       = config('site.whatsapp');
  $offices  = config('site.offices');
  $services = config('site.services');
  $sent     = session('sent');
  $next = [
    ['01', 'We read it properly',   'A person, not an autoresponder, reads your brief and replies within one working day.'],
    ['02', 'A short conversation',  'A call or visit to understand the goal, the constraints and whether we are the right fit.'],
    ['03', 'A written proposal',    'Scope, timeline and cost in writing, with the honest option of not proceeding if it doesn\'t add up.'],
  ];
@endphp

@section('page')

@php
  $arrow = '<svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
  $waIcon = '<svg class="h-5 w-5 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>';
  $err = 'is-error';
@endphp

{{-- ── Hero ─────────────────────────────────────────────── --}}
<section class="v3-hero v3-wrap pb-14 pt-14 lg:pb-20 lg:pt-24">
  <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs font-medium uppercase tracking-wider text-neutral-400">
    <a href="{{ url('/') }}" class="transition-colors hover:text-[var(--ink)]">Home</a>
    <span aria-hidden="true">/</span>
    <span class="text-[var(--blue)]">Contact</span>
  </nav>
  <h1 class="v3-h1 reveal mt-6 max-w-5xl">
    Tell us what you're <span class="v3-accent">trying to solve.</span>
  </h1>
  <p class="v3-lead reveal mt-8 max-w-2xl" style="--d:.2s">
    We will come back with an honest view of scope, timeline and cost — including when the
    answer is that you don't need us. A person replies within one working day.
  </p>
</section>

{{-- ── Channels + form ──────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap pb-20 pt-12 lg:pb-28 lg:pt-16">
    <div class="grid items-start gap-14 lg:grid-cols-12 lg:gap-16">

      {{-- Direct channels --}}
      <div class="lg:col-span-4">
        <p class="v3-eyebrow">Talk to us directly</p>
        <div class="reveal mt-6 border-t border-neutral-200">
          <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="group flex items-start gap-4 border-b border-[#f0f0f2] py-6">
            <span class="v3-icon"><span class="material-symbols-outlined">call</span></span>
            <span class="min-w-0 flex-1">
              <span class="block text-xs font-medium uppercase tracking-wider text-neutral-400">Call us</span>
              <span class="mt-1 block text-base font-bold tracking-tight transition-colors group-hover:text-neutral-500">{{ $phone1 }}</span>
            </span>
          </a>
          <a href="mailto:{{ $mail }}" class="group flex items-start gap-4 border-b border-[#f0f0f2] py-6">
            <span class="v3-icon"><span class="material-symbols-outlined">mail</span></span>
            <span class="min-w-0 flex-1">
              <span class="block text-xs font-medium uppercase tracking-wider text-neutral-400">Email</span>
              <span class="mt-1 block break-all text-base font-bold tracking-tight transition-colors group-hover:text-neutral-500">{{ $mail }}</span>
              @if (config('site.mail2'))
                <span class="block break-all text-sm text-neutral-500">or {{ config('site.mail2') }}</span>
              @endif
              <span class="block text-sm text-neutral-400">We reply within one working day</span>
            </span>
          </a>
          <a href="{{ $wa }}" target="_blank" rel="noopener" class="group flex items-start gap-4 border-b border-[#f0f0f2] py-6">
            <span class="v3-icon">{!! $waIcon !!}</span>
            <span class="min-w-0 flex-1">
              <span class="block text-xs font-medium uppercase tracking-wider text-neutral-400">WhatsApp</span>
              <span class="mt-1 block text-base font-bold tracking-tight transition-colors group-hover:text-neutral-500">Message us directly</span>
              <span class="block text-sm text-neutral-500">Fastest for a quick question</span>
            </span>
            <span class="mt-1 text-neutral-400 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[var(--ink)]">{!! $arrow !!}</span>
          </a>
        </div>

        <div class="reveal mt-6 flex items-center gap-3 text-sm text-neutral-500" style="--d:.1s">
          <span class="material-symbols-outlined text-[18px] text-neutral-400">schedule</span>
          Monday to Friday, 8am – 5pm WAT
        </div>
      </div>

      {{-- Form --}}
      <div class="reveal lg:col-span-8" style="--d:.15s">
        <div class="border border-[#f0f0f2] p-6 sm:p-9 lg:p-12">
          @if ($sent)
            <div id="formSent" class="py-10 text-center">
              <span class="v3-icon v3-icon-lg mx-auto"><span class="material-symbols-outlined !text-[30px]">mark_email_read</span></span>
              <h2 class="v3-h2 mt-7">Thanks — we've <span class="v3-accent">got it.</span></h2>
              <p class="mx-auto mt-4 max-w-md text-[15.5px] leading-relaxed text-neutral-500">
                Your brief is with the team. Expect a reply within one working day. If it's urgent,
                call <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="font-semibold text-[var(--ink)] underline underline-offset-4 hover:text-neutral-500">{{ $phone1 }}</a>.
              </p>
              <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ url('/') }}" class="v3-btn v3-btn-dark">Back to home {!! $arrow !!}</a>
                <a href="{{ url('/contact') }}" class="v3-btn v3-btn-line">Send another</a>
              </div>
            </div>
          @else
            <div>
              <p class="v3-eyebrow">Send a brief</p>
              <h2 class="mt-3 text-2xl font-black leading-tight tracking-[-0.02em] sm:text-3xl">A few details and we'll take it from there.</h2>
            </div>

            @if ($errors->any())
              <div class="mt-6 flex items-start gap-3 border-l-2 border-red-500 bg-red-50 px-5 py-4 text-sm text-[var(--ink)]" role="alert">
                <span class="material-symbols-outlined shrink-0 text-[20px] text-red-600">error</span>
                <span>Please check the highlighted fields and try again.</span>
              </div>
            @endif

            <form id="contactForm" method="POST" action="{{ route('contact.send') }}" class="mt-8" novalidate>
              @csrf
              {{-- Honeypot --}}
              <div class="hidden" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

              <div class="grid gap-5 sm:grid-cols-2">
                <div>
                  <label for="name" class="v3-label">Your name <span class="v3-accent">*</span></label>
                  <input id="name" name="name" type="text" required autocomplete="name" value="{{ old('name') }}" placeholder="Full name"
                         class="v3-field placeholder:text-neutral-400 {{ $errors->has('name') ? $err : '' }}">
                  @error('name')<p class="mt-2 text-[12.5px] font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label for="email" class="v3-label">Email <span class="v3-accent">*</span></label>
                  <input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}" placeholder="you@organisation.com"
                         class="v3-field placeholder:text-neutral-400 {{ $errors->has('email') ? $err : '' }}">
                  @error('email')<p class="mt-2 text-[12.5px] font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label for="phone" class="v3-label">Phone</label>
                  <input id="phone" name="phone" type="tel" autocomplete="tel" value="{{ old('phone') }}" placeholder="+234 …"
                         class="v3-field placeholder:text-neutral-400 {{ $errors->has('phone') ? $err : '' }}">
                  @error('phone')<p class="mt-2 text-[12.5px] font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label for="organisation" class="v3-label">Organisation</label>
                  <input id="organisation" name="organisation" type="text" autocomplete="organization" value="{{ old('organisation') }}" placeholder="Company, ministry or institution"
                         class="v3-field placeholder:text-neutral-400 {{ $errors->has('organisation') ? $err : '' }}">
                  @error('organisation')<p class="mt-2 text-[12.5px] font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                  <label for="service" class="v3-label">What is it about?</label>
                  <div class="relative">
                    <select id="service" name="service" class="v3-field appearance-none rounded-none pr-12 {{ $errors->has('service') ? $err : '' }} {{ old('service') ? '' : 'is-empty' }}">
                      <option value="" {{ old('service') ? '' : 'selected' }}>Not sure yet — help me decide</option>
                      @foreach ($services as $s)
                        <option value="{{ $s['label'] }}" {{ old('service') === $s['label'] ? 'selected' : '' }}>{{ $s['label'] }}</option>
                      @endforeach
                      <option value="Something else" {{ old('service') === 'Something else' ? 'selected' : '' }}>Something else</option>
                    </select>
                    <span class="material-symbols-outlined pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-[20px] text-neutral-400" aria-hidden="true">expand_more</span>
                  </div>
                  @error('service')<p class="mt-2 text-[12.5px] font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                  <label for="message" class="v3-label">Your brief <span class="v3-accent">*</span></label>
                  <textarea id="message" name="message" rows="5" required placeholder="What are you trying to achieve, roughly how many people or sites are involved, and when do you need it?"
                            class="v3-field resize-y leading-relaxed placeholder:text-neutral-400 {{ $errors->has('message') ? $err : '' }}">{{ old('message') }}</textarea>
                  @error('message')<p class="mt-2 text-[12.5px] font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
              </div>

              <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                <button type="submit" class="v3-btn v3-btn-blue justify-center">
                  Send brief {!! $arrow !!}
                </button>
                <button type="button" id="sendViaWhatsApp" class="v3-btn v3-btn-line justify-center">
                  <span class="[&>svg]:h-4 [&>svg]:w-4">{!! $waIcon !!}</span>
                  Send via WhatsApp instead
                </button>
              </div>
              <p class="mt-4 text-[12.5px] text-neutral-400">
                We only use these details to reply to you. Nothing is added to a mailing list.
              </p>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── Offices ──────────────────────────────────────────── --}}
<section class="v3-rule bg-neutral-50">
  <div class="v3-wrap v3-section">
    <div class="reveal flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="v3-eyebrow">Visit us</p>
        <h2 class="v3-h2 mt-4">Two offices, <span class="v3-accent">one team.</span></h2>
      </div>
      <a href="{{ url('/about') }}" class="inline-flex shrink-0 items-center gap-2 self-start border-b border-neutral-950 pb-1 text-sm font-medium hover:border-neutral-500 hover:text-neutral-500 lg:self-auto">
        More about Cloudence {!! $arrow !!}
      </a>
    </div>

    <div class="mt-14 grid gap-4 md:grid-cols-2">
      @foreach ($offices as $i => $o)
        <div class="v3-card group reveal flex flex-col overflow-hidden" style="--d:{{ $i * 0.08 }}s">
          <div class="relative aspect-[16/9] bg-neutral-100">
            <iframe title="Map of the {{ $o['city'] }} office" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q={{ urlencode($o['address']) }}&output=embed"
                    class="v3-photo absolute inset-0 h-full w-full border-0"></iframe>
          </div>
          <div class="flex flex-1 flex-col p-7 lg:p-9">
            <div class="flex items-center justify-between gap-4">
              <div class="flex items-center gap-3">
                <span class="v3-icon"><span class="material-symbols-outlined">location_on</span></span>
                <span class="text-2xl font-black tracking-[-0.02em]">{{ $o['city'] }}</span>
              </div>
              <span class="text-xs font-medium uppercase tracking-wider text-neutral-400">{{ $i === 0 ? 'Head office' : 'Regional office' }}</span>
            </div>
            <p class="mt-5 flex-1 text-[15.5px] leading-relaxed text-neutral-500">{{ $o['address'] }}</p>
            <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-[#f0f0f2] pt-5 text-sm">
              <a href="tel:{{ str_replace(' ', '', $o['phone']) }}" class="inline-flex items-center gap-2 font-medium transition-colors hover:text-neutral-500">
                <span class="material-symbols-outlined text-[18px] text-neutral-400">call</span>
                {{ $o['phone'] }}
              </a>
              <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($o['address']) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-medium transition-colors hover:text-neutral-500">
                Get directions {!! $arrow !!}
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── What happens next ────────────────────────────────── --}}
<section class="v3-rule">
  <div class="v3-wrap v3-section">
    <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
      <div class="reveal lg:col-span-4">
        <p class="v3-eyebrow">What happens next</p>
        <h2 class="v3-h2 mt-4">After you <span class="v3-accent">press send.</span></h2>
      </div>
      <ol class="grid border-t border-neutral-200 md:grid-cols-3 lg:col-span-8">
        @foreach ($next as $i => $p)
          <li class="reveal flex flex-col border-b border-[#f0f0f2] py-8 md:border-b-0 md:pr-6 {{ $i ? 'md:border-l md:pl-6' : '' }}" style="--d:{{ $i * 0.08 }}s">
            <span class="v3-num text-[2.6rem] leading-none text-neutral-300">{{ $p[0] }}</span>
            <h3 class="v3-h3 mt-8 text-lg">{{ $p[1] }}</h3>
            <p class="mt-3 text-[14.5px] leading-relaxed text-neutral-500">{{ $p[2] }}</p>
          </li>
        @endforeach
      </ol>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  // Contact form → WhatsApp with the same fields prefilled
  (function () {
    var btn = document.getElementById('sendViaWhatsApp'), form = document.getElementById('contactForm');
    if (!btn || !form) return;
    btn.addEventListener('click', function () {
      var v = function (id) { var el = document.getElementById(id); return el ? el.value.trim() : ''; };
      var lines = ['Hello Cloudence,'];
      if (v('message')) lines.push('', v('message'));
      var who = [v('name'), v('organisation')].filter(Boolean).join(', ');
      if (who) lines.push('', '— ' + who);
      if (v('service')) lines.push('Interested in: ' + v('service'));
      if (v('phone')) lines.push('Phone: ' + v('phone'));
      if (v('email')) lines.push('Email: ' + v('email'));
      window.open('{{ $wa }}?text=' + encodeURIComponent(lines.join('\n')), '_blank', 'noopener');
    });

    // Keep the select's placeholder colour in step with its value
    var sel = document.getElementById('service');
    if (sel) sel.addEventListener('change', function () { sel.classList.toggle('is-empty', !sel.value); });
  })();
</script>
@endpush
