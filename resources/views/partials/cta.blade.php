{{-- Dark closing call to action, shared by inner pages --}}
@php $waBook = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation."); @endphp
<section class="py-24 lg:py-32 bg-ink text-ivory relative grain overflow-hidden">
  <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
    <div class="grid lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-8 reveal">
        <div class="flex items-center gap-3 text-ivory/50">
          <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">Let's partner</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          Ready to build something <span class="serif-it font-normal text-[1.06em] text-accent">that lasts?</span>
        </h2>
        <p class="mt-6 max-w-xl text-[16px] leading-relaxed text-ivory/60">
          Tell us what you are trying to solve. We will come back with an honest view of scope,
          timeline and cost — including when the answer is that you don't need us.
        </p>
      </div>
      <div class="lg:col-span-4 reveal flex flex-wrap lg:justify-end gap-3" style="transition-delay:.1s">
        <a href="{{ $waBook }}" target="_blank" rel="noopener"
           class="group inline-flex items-center gap-2 text-[14.5px] font-semibold text-ink bg-ivory hover:bg-white px-6 py-3.5 rounded-full transition-all active:scale-[.98]">
          Book a consultation
          <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-0.5">arrow_forward</span>
        </a>
        <a href="{{ url('/contact') }}"
           class="inline-flex items-center gap-2 text-[14.5px] font-semibold text-ivory border border-ivory/25 hover:border-ivory px-6 py-3.5 rounded-full transition-colors">
          Contact us
        </a>
      </div>
    </div>
  </div>
</section>
