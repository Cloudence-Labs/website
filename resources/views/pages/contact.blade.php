@extends('layouts.app')

@section('title', 'Contact — Cloudence')
@section('description', 'Talk to Cloudence about software, networks or infrastructure. Offices in Abuja and Calabar. Call, email, message us on WhatsApp or send a brief through the form.')

@push('head')
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['Contact', '/contact']]) !!}
  {!! \App\Support\Seo::page('ContactPage', 'Contact Cloudence', '/contact', 'Call, email, WhatsApp or send a brief to Cloudence.') !!}
@endpush

@php
  $mail     = config('site.mail');
  $phone1   = config('site.phone1');
  $phone2   = config('site.phone2');
  $wa       = config('site.whatsapp');
  $offices  = config('site.offices');
  $services = config('site.services');
  $sent     = session('sent');
@endphp

@section('content')

  <!-- ═══════════════ HERO + FORM ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-24 lg:pt-36 lg:pb-32">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-14 lg:gap-10 items-start">

        <!-- Intro + direct channels -->
        <div class="lg:col-span-5 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">Contact</span>
          </div>
          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.2rem)] leading-[1.02] tracking-tightest font-bold">
            Tell us what you're<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">trying to solve.</span>
          </h1>
          <p class="mt-7 max-w-md text-[17px] leading-relaxed text-graphite">
            We will come back with an honest view of scope, timeline and cost — including when the
            answer is that you don't need us. A person replies within one working day.
          </p>

          <div class="mt-10 space-y-3">
            <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="group flex items-center gap-4 rounded-[18px] border border-mist bg-paper px-5 py-4 transition-colors hover:border-ink/30">
              <span class="w-11 h-11 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink transition-colors group-hover:bg-ink group-hover:text-ivory group-hover:border-ink">
                <span class="material-symbols-outlined text-[20px]">call</span>
              </span>
              <span class="min-w-0">
                <span class="block eyebrow text-graphite/70">Call us</span>
                <span class="block mt-1 text-[16px] font-semibold tracking-tight text-ink">{{ $phone1 }}</span>
                <span class="block text-[13px] text-graphite">or {{ $phone2 }}</span>
              </span>
            </a>
            <a href="mailto:{{ $mail }}" class="group flex items-center gap-4 rounded-[18px] border border-mist bg-paper px-5 py-4 transition-colors hover:border-ink/30">
              <span class="w-11 h-11 shrink-0 rounded-full bg-ivory border border-mist flex items-center justify-center text-ink transition-colors group-hover:bg-ink group-hover:text-ivory group-hover:border-ink">
                <span class="material-symbols-outlined text-[20px]">mail</span>
              </span>
              <span class="min-w-0">
                <span class="block eyebrow text-graphite/70">Email</span>
                <span class="block mt-1 text-[16px] font-semibold tracking-tight text-ink truncate">{{ $mail }}</span>
                <span class="block text-[13px] text-graphite">We reply within one working day</span>
              </span>
            </a>
            <a href="{{ $wa }}" target="_blank" rel="noopener" class="group flex items-center gap-4 rounded-[18px] border border-mist bg-paper px-5 py-4 transition-colors hover:border-ink/30">
              <span class="w-11 h-11 shrink-0 rounded-full bg-[#25D366]/10 border border-[#25D366]/30 flex items-center justify-center text-[#25D366]">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
              </span>
              <span class="min-w-0">
                <span class="block eyebrow text-graphite/70">WhatsApp</span>
                <span class="block mt-1 text-[16px] font-semibold tracking-tight text-ink">Message us directly</span>
                <span class="block text-[13px] text-graphite">Fastest for a quick question</span>
              </span>
              <span class="material-symbols-outlined text-[18px] text-graphite ml-auto transition-transform group-hover:translate-x-1">arrow_outward</span>
            </a>
          </div>

          <div class="mt-8 flex items-center gap-3 text-[13.5px] text-graphite">
            <span class="material-symbols-outlined text-[18px]">schedule</span>
            Monday to Friday, 8am – 5pm WAT
          </div>
        </div>

        <!-- Form -->
        <div class="lg:col-span-7 reveal reveal-fade" style="transition-delay:.1s">
          <div class="rounded-[25px] border border-mist bg-paper p-7 sm:p-9 lg:p-10 shadow-[0_40px_90px_-50px_rgba(20,20,20,.45)]">
            @if ($sent)
              <div id="formSent" class="py-10 text-center">
                <span class="mx-auto w-16 h-16 rounded-full bg-accent/10 border border-accent/30 flex items-center justify-center text-accent">
                  <span class="material-symbols-outlined text-[30px]">mark_email_read</span>
                </span>
                <h2 class="mt-7 text-[clamp(1.6rem,2.6vw,2.1rem)] leading-tight tracking-tightest font-bold">
                  Thanks — we've <span class="serif-it font-normal text-[1.06em] text-accent">got it.</span>
                </h2>
                <p class="mt-4 max-w-md mx-auto text-[15.5px] leading-relaxed text-graphite">
                  Your brief is with the team. Expect a reply within one working day. If it's urgent,
                  call <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="link-underline font-semibold text-ink">{{ $phone1 }}</a>.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                  <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-6 py-3.5 rounded-full transition-all">Back to home</a>
                  <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink border border-mist hover:border-ink/40 px-6 py-3.5 rounded-full transition-all">Send another</a>
                </div>
              </div>
            @else
              <div class="flex items-center justify-between gap-4">
                <div>
                  <div class="eyebrow text-graphite">Send a brief</div>
                  <h2 class="mt-2 text-[clamp(1.4rem,2.2vw,1.75rem)] leading-tight tracking-tightest font-bold">A few details and we'll take it from there.</h2>
                </div>
              </div>

              @if ($errors->any())
                <div class="mt-6 rounded-[14px] border border-accent/40 bg-accent/5 px-5 py-4 text-[14px] text-ink flex items-start gap-3">
                  <span class="material-symbols-outlined text-[20px] text-accent shrink-0">error</span>
                  <span>Please check the highlighted fields and try again.</span>
                </div>
              @endif

              <form id="contactForm" method="POST" action="{{ route('contact.send') }}" class="mt-8" novalidate>
                @csrf
                {{-- Honeypot --}}
                <div class="hidden" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

                <div class="grid sm:grid-cols-2 gap-5">
                  <div>
                    <label for="name" class="eyebrow text-graphite">Your name <span class="text-accent">*</span></label>
                    <input id="name" name="name" type="text" required autocomplete="name" value="{{ old('name') }}" placeholder="Full name"
                           class="mt-2.5 w-full h-13 px-5 py-3.5 rounded-[14px] bg-ivory border {{ $errors->has('name') ? 'border-accent' : 'border-mist' }} text-[15px] placeholder:text-graphite/50 focus:border-ink focus:ring-0 outline-none transition-colors">
                    @error('name')<p class="mt-2 text-[12.5px] text-accent font-medium">{{ $message }}</p>@enderror
                  </div>
                  <div>
                    <label for="email" class="eyebrow text-graphite">Email <span class="text-accent">*</span></label>
                    <input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}" placeholder="you@organisation.com"
                           class="mt-2.5 w-full px-5 py-3.5 rounded-[14px] bg-ivory border {{ $errors->has('email') ? 'border-accent' : 'border-mist' }} text-[15px] placeholder:text-graphite/50 focus:border-ink focus:ring-0 outline-none transition-colors">
                    @error('email')<p class="mt-2 text-[12.5px] text-accent font-medium">{{ $message }}</p>@enderror
                  </div>
                  <div>
                    <label for="phone" class="eyebrow text-graphite">Phone</label>
                    <input id="phone" name="phone" type="tel" autocomplete="tel" value="{{ old('phone') }}" placeholder="+234 …"
                           class="mt-2.5 w-full px-5 py-3.5 rounded-[14px] bg-ivory border {{ $errors->has('phone') ? 'border-accent' : 'border-mist' }} text-[15px] placeholder:text-graphite/50 focus:border-ink focus:ring-0 outline-none transition-colors">
                    @error('phone')<p class="mt-2 text-[12.5px] text-accent font-medium">{{ $message }}</p>@enderror
                  </div>
                  <div>
                    <label for="organisation" class="eyebrow text-graphite">Organisation</label>
                    <input id="organisation" name="organisation" type="text" autocomplete="organization" value="{{ old('organisation') }}" placeholder="Company, ministry or institution"
                           class="mt-2.5 w-full px-5 py-3.5 rounded-[14px] bg-ivory border {{ $errors->has('organisation') ? 'border-accent' : 'border-mist' }} text-[15px] placeholder:text-graphite/50 focus:border-ink focus:ring-0 outline-none transition-colors">
                    @error('organisation')<p class="mt-2 text-[12.5px] text-accent font-medium">{{ $message }}</p>@enderror
                  </div>
                  <div class="sm:col-span-2">
                    <label for="service" class="eyebrow text-graphite">What is it about?</label>
                    <div class="relative mt-2.5">
                      <select id="service" name="service"
                              class="w-full appearance-none px-5 py-3.5 pr-12 rounded-[14px] bg-ivory border border-mist text-[15px] focus:border-ink focus:ring-0 outline-none transition-colors {{ old('service') ? 'text-ink' : 'text-graphite/70' }}">
                        <option value="" {{ old('service') ? '' : 'selected' }}>Not sure yet — help me decide</option>
                        @foreach ($services as $s)
                          <option value="{{ $s['label'] }}" {{ old('service') === $s['label'] ? 'selected' : '' }}>{{ $s['label'] }}</option>
                        @endforeach
                        <option value="Something else" {{ old('service') === 'Something else' ? 'selected' : '' }}>Something else</option>
                      </select>
                      <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-[20px] text-graphite">expand_more</span>
                    </div>
                  </div>
                  <div class="sm:col-span-2">
                    <label for="message" class="eyebrow text-graphite">Your brief <span class="text-accent">*</span></label>
                    <textarea id="message" name="message" rows="5" required placeholder="What are you trying to achieve, roughly how many people or sites are involved, and when do you need it?"
                              class="mt-2.5 w-full px-5 py-3.5 rounded-[14px] bg-ivory border {{ $errors->has('message') ? 'border-accent' : 'border-mist' }} text-[15px] leading-relaxed placeholder:text-graphite/50 focus:border-ink focus:ring-0 outline-none transition-colors resize-y">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-2 text-[12.5px] text-accent font-medium">{{ $message }}</p>@enderror
                  </div>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row sm:items-center gap-4">
                  <button type="submit"
                          class="group inline-flex items-center justify-center gap-2 text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black px-7 py-4 rounded-full transition-all active:scale-[.98]">
                    Send brief
                    <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
                  </button>
                  <button type="button" id="sendViaWhatsApp"
                          class="inline-flex items-center justify-center gap-2 text-[14.5px] font-semibold text-ink border border-mist hover:border-ink/40 px-6 py-4 rounded-full transition-all">
                    <svg class="w-4 h-4 fill-[#25D366]" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    Send via WhatsApp instead
                  </button>
                </div>
                <p class="mt-4 text-[12.5px] text-graphite">
                  We only use these details to reply to you. Nothing is added to a mailing list.
                </p>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ OFFICES ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal max-w-2xl">
        <div class="flex items-center gap-3 text-graphite">
          <span class="w-9 rule"></span><span class="eyebrow">Visit us</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          Two offices, <span class="serif-it font-normal text-[1.06em] text-accent">one team.</span>
        </h2>
      </div>

      <div class="mt-14 grid md:grid-cols-2 gap-5">
        @foreach ($offices as $i => $o)
          <div class="reveal rounded-[22px] border border-mist bg-ivory overflow-hidden flex flex-col" style="transition-delay:{{ $i * 0.08 }}s">
            <div class="relative aspect-[16/9] bg-mist">
              <iframe title="Map of the {{ $o['city'] }} office" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                      src="https://www.google.com/maps?q={{ urlencode($o['address']) }}&output=embed"
                      class="absolute inset-0 w-full h-full border-0 grayscale-[.35] contrast-[1.05]"></iframe>
            </div>
            <div class="p-7 lg:p-8 flex flex-col flex-1">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 text-accent">
                  <span class="material-symbols-outlined text-[20px]">location_on</span>
                  <span class="text-[22px] font-bold tracking-tight text-ink">{{ $o['city'] }}</span>
                </div>
                <span class="eyebrow text-graphite/60">{{ $i === 0 ? 'Head office' : 'Regional office' }}</span>
              </div>
              <p class="mt-4 text-[15.5px] leading-relaxed text-graphite">{{ $o['address'] }}</p>
              <div class="mt-6 pt-5 border-t border-mist flex flex-wrap items-center gap-x-6 gap-y-3 text-[14px]">
                <a href="tel:{{ str_replace(' ', '', $o['phone']) }}" class="inline-flex items-center gap-2 font-semibold text-ink">
                  <span class="material-symbols-outlined text-[18px] text-graphite">call</span>
                  <span class="link-underline">{{ $o['phone'] }}</span>
                </a>
                <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($o['address']) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-semibold text-ink">
                  <span class="material-symbols-outlined text-[18px] text-graphite">directions</span>
                  <span class="link-underline">Get directions</span>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ WHAT HAPPENS NEXT ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
        <div class="lg:col-span-4 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">What happens next</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            After you <span class="serif-it font-normal text-[1.06em] text-accent">press send.</span>
          </h2>
        </div>
        <div class="lg:col-span-8 grid md:grid-cols-3 gap-5">
          @foreach ([
            ['01', 'We read it properly',   'A person, not an autoresponder, reads your brief and replies within one working day.'],
            ['02', 'A short conversation',  'A call or visit to understand the goal, the constraints and whether we are the right fit.'],
            ['03', 'A written proposal',    'Scope, timeline and cost in writing, with the honest option of not proceeding if it doesn\'t add up.'],
          ] as $i => $p)
            <div class="reveal rounded-[22px] border border-mist bg-paper p-7 flex flex-col" style="transition-delay:{{ $i * 0.08 }}s">
              <div class="flex items-center justify-between">
                <span class="text-[2.2rem] leading-none font-bold tracking-tightest text-accent">{{ $p[0] }}</span>
                <span class="w-12 rule"></span>
              </div>
              <h3 class="mt-7 text-[18px] font-bold tracking-tight">{{ $p[1] }}</h3>
              <p class="mt-3 text-[14.5px] leading-relaxed text-graphite">{{ $p[2] }}</p>
            </div>
          @endforeach
        </div>
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
    if (sel) sel.addEventListener('change', function () {
      sel.classList.toggle('text-graphite/70', !sel.value);
      sel.classList.toggle('text-ink', !!sel.value);
    });
  })();
</script>
@endpush
