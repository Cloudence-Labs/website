{{-- One news card. Expects $post from App\Support\News::all(). --}}
<article class="group relative flex flex-col">
  <div class="relative aspect-[16/10] overflow-hidden bg-[var(--blue-soft)]">
    @if (!empty($post['image']))
      <img src="{{ asset($post['image']) }}" alt="" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover grayscale transition duration-700 group-hover:scale-[1.03] group-hover:grayscale-0">
    @else
      {{-- No photo: the brand mark on a soft blue panel --}}
      <img src="{{ asset('images/main/favicon.png') }}" alt="" loading="lazy" class="absolute left-1/2 top-1/2 w-[38%] -translate-x-1/2 -translate-y-1/2 transition duration-700 group-hover:rotate-[8deg] group-hover:scale-105">
    @endif
  </div>
  <div class="mt-5 flex items-center gap-3 text-xs font-medium uppercase tracking-wider text-neutral-400">
    <span>{{ $post['category'] }}</span>
    <span aria-hidden="true">&middot;</span>
    <time datetime="{{ $post['at']->toDateString() }}">{{ $post['at']->format('j M Y') }}</time>
  </div>
  <h3 class="mt-3 text-xl font-bold leading-snug tracking-[-0.01em]">
    <a href="{{ $post['url'] }}" class="after:absolute after:inset-0 group-hover:text-neutral-500">{{ $post['title'] }}</a>
  </h3>
  <p class="mt-2 text-[15px] leading-relaxed text-neutral-500">{{ $post['excerpt'] }}</p>
</article>
