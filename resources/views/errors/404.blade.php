@extends('layouts.v3')

@section('title', 'Page not found — ' . config('site.name'))
@section('robots', 'noindex, nofollow')
@section('description', 'The page you were looking for could not be found. Head back to the Cloudence home page or get in touch with our team.')

@php
  $links = [
    ['url' => '/services',   'icon' => 'terminal',        'label' => 'Services',   'blurb' => 'Software, networks, surveillance and training'],
    ['url' => '/industries', 'icon' => 'account_balance', 'label' => 'Industries', 'blurb' => 'Government, education, finance and more'],
    ['url' => '/products',   'icon' => 'deployed_code',   'label' => 'Products',   'blurb' => 'Platforms we build and run'],
  ];
  $path  = '/' . ltrim(request()->path(), '/');
  $arrow = '<svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>';
@endphp

@section('page')

<section class="v3-hero v3-wrap pb-20 pt-14 lg:pb-28 lg:pt-24">
  <div class="grid gap-14 lg:grid-cols-12 lg:gap-16">

    {{-- Copy --}}
    <div class="min-w-0 lg:col-span-7">
      <p class="v3-eyebrow">Error 404</p>
      <h1 class="v3-h1 mt-4">This page has gone <span class="v3-accent">offline.</span></h1>
      <p class="v3-lead mt-8 max-w-lg">
        The link may be out of date, the address mistyped, or the page moved while we were
        rebuilding. Nothing here is broken — it just isn't where you were sent.
      </p>

      <div class="mt-10 flex flex-wrap gap-3">
        <a href="{{ url('/') }}" class="v3-btn v3-btn-dark">
          <span class="material-symbols-outlined text-[18px]">arrow_back</span> Back to home
        </a>
        <a href="{{ url('/contact') }}" class="v3-btn v3-btn-line">Talk to us {!! $arrow !!}</a>
      </div>

      <div class="mt-12 flex flex-col gap-3 border-t border-neutral-100 pt-6 text-[13px] text-neutral-500 sm:flex-row sm:flex-wrap sm:items-center sm:gap-x-8">
        <span class="inline-flex items-center gap-2.5 font-medium text-[var(--ink)]">
          <span class="inline-block h-2 w-2 bg-[var(--blue)]"></span>
          Everything else is running
        </span>
        <span class="inline-flex min-w-0 max-w-full items-start gap-2">
          <span class="material-symbols-outlined mt-px shrink-0 text-[18px] text-neutral-400">link_off</span>
          <span class="min-w-0 break-words">We looked for <span class="font-mono text-[var(--ink)]">{{ $path }}</span> and found nothing there.</span>
        </span>
      </div>
    </div>

    {{-- Where to next --}}
    <div class="min-w-0 lg:col-span-5">
      <p class="text-xs font-medium uppercase tracking-wider text-neutral-400">Where to next</p>
      <ul class="mt-6 border-t border-neutral-200">
        @foreach ($links as $l)
          <li>
            <a href="{{ url($l['url']) }}" class="group flex items-center gap-4 border-b border-neutral-100 py-5 transition-colors hover:bg-neutral-50">
              <span class="v3-icon transition-colors group-hover:!bg-[var(--blue)] group-hover:!text-white"><span class="material-symbols-outlined">{{ $l['icon'] }}</span></span>
              <span class="min-w-0 flex-1">
                <span class="block text-base font-bold leading-snug tracking-tight group-hover:text-neutral-500">{{ $l['label'] }}</span>
                <span class="mt-0.5 block text-[13px] leading-snug text-neutral-500">{{ $l['blurb'] }}</span>
              </span>
              <span class="text-neutral-400 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[var(--ink)]">{!! $arrow !!}</span>
            </a>
          </li>
        @endforeach
      </ul>
      <div class="mt-6 flex items-center justify-between gap-4 bg-neutral-50 p-5">
        <div class="min-w-0">
          <div class="text-sm font-bold">Need a hand finding something?</div>
          <div class="mt-0.5 text-[13px] text-neutral-500">Message us on WhatsApp and we'll point you the right way.</div>
        </div>
        <a href="{{ config('site.whatsapp') }}?text={{ rawurlencode("Hello Cloudence, I was looking for " . url($path) . " and it wasn't there.") }}"
           target="_blank" rel="noopener" aria-label="Message Cloudence on WhatsApp"
           class="flex h-10 w-10 shrink-0 items-center justify-center bg-[var(--ink)] text-white transition-colors hover:bg-[var(--blue)]">
          <span class="material-symbols-outlined text-[18px]">chat</span>
        </a>
      </div>
    </div>

  </div>
</section>

@endsection
