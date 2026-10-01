{{-- Browser-window frame around a product screen.
     Params: $src (image url), $alt, $address (text shown in the address bar), $eager (bool) --}}
<figure class="rounded-[18px] lg:rounded-[22px] border border-mist bg-paper overflow-hidden shadow-[0_50px_110px_-55px_rgba(20,20,20,.55)]">
  <div class="flex items-center gap-3 px-4 lg:px-5 py-3 border-b border-mist bg-ivory">
    <div class="flex items-center gap-1.5 shrink-0">
      <span class="w-2.5 h-2.5 rounded-full bg-[#F39A62]"></span>
      <span class="w-2.5 h-2.5 rounded-full bg-mist"></span>
      <span class="w-2.5 h-2.5 rounded-full bg-mist"></span>
    </div>
    <div class="flex-1 min-w-0 flex justify-center">
      <div class="inline-flex items-center gap-2 max-w-full rounded-full bg-paper border border-mist px-3.5 py-1 text-[11.5px] text-graphite">
        <span class="material-symbols-outlined text-[13px]">lock</span>
        <span class="truncate">{{ $address ?? 'app' }}</span>
      </div>
    </div>
    <div class="w-10 shrink-0"></div>
  </div>
  <img src="{{ $src }}" alt="{{ $alt ?? '' }}" loading="{{ !empty($eager) ? 'eager' : 'lazy' }}" decoding="async"
       class="block w-full h-auto">
</figure>
