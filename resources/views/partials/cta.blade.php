{{-- Closing call to action, shared by inner pages --}}
@php $waBook = config('site.whatsapp') . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation."); @endphp
<section class="relative overflow-hidden border-t border-line">
  <div class="glow-orb -top-32 right-[-10%] h-[28rem] w-[28rem]"></div>
  <div class="wrap section relative">
    <div class="grid items-end gap-10 lg:grid-cols-12">
      <div class="reveal lg:col-span-8">
        <span class="eyebrow eyebrow-rule text-fg-3">Let's partner</span>
        <h2 class="display-sm mt-7">Ready to build something <span class="accent-word">that lasts?</span></h2>
        <p class="lead mt-6 max-w-xl">
          Tell us what you are trying to solve. We will come back with an honest view of scope,
          timeline and cost — including when the answer is that you don't need us.
        </p>
      </div>
      <div class="reveal flex flex-wrap gap-3 lg:col-span-4 lg:justify-end" style="--d:.1s">
        <a href="{{ $waBook }}" target="_blank" rel="noopener" class="btn btn-accent">Book a consultation <span class="material-symbols-outlined arrow text-[18px]">arrow_forward</span></a>
        <a href="{{ url('/contact') }}" class="btn btn-ghost">Contact us</a>
      </div>
    </div>
  </div>
</section>
