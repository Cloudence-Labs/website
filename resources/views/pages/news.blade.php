@extends('layouts.v3')

@section('title', 'News & updates | Cloudence')
@section('description', 'News from Cloudence: projects delivered, products launched, training run and company announcements from our Abuja and Calabar teams.')

@push('head')
  {!! \App\Support\Seo::page('CollectionPage', 'Cloudence News', '/news', 'Projects, products, training and company announcements from Cloudence.') !!}
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['News', '/news']]) !!}
  {!! \App\Support\Seo::itemList($posts->map(fn ($p) => [$p['title'], '/news/' . $p['slug']])->values()->all()) !!}
@endpush


@section('page')

<section class="v3-hero v3-wrap pb-12 pt-14 lg:pb-16 lg:pt-24">
  <p class="text-xs font-medium uppercase tracking-wider text-[var(--blue)]">News</p>
  <h1 class="mt-4 max-w-4xl text-5xl font-black leading-[1.03] tracking-[-0.035em] sm:text-6xl lg:text-7xl">News &amp; Events</h1>
  <p class="mt-8 max-w-xl text-lg leading-relaxed text-neutral-500">Projects delivered, products launched, training run and company announcements.</p>
</section>

@php $lead = $posts->first(); @endphp
@if ($lead)
  {{-- Latest post, featured --}}
  <section class="v3-wrap">
    <a href="{{ $lead['url'] }}" class="group grid overflow-hidden border border-neutral-100 lg:grid-cols-2">
      <div class="relative aspect-[16/10] bg-[var(--blue-soft)] lg:aspect-auto lg:min-h-[420px]">
        @if (!empty($lead['image']))
          <img src="{{ asset($lead['image']) }}" alt="" class="absolute inset-0 h-full w-full object-cover grayscale transition duration-700 group-hover:grayscale-0">
        @else
          <img src="{{ asset('images/main/favicon.png') }}" alt="" class="absolute left-1/2 top-1/2 w-[34%] -translate-x-1/2 -translate-y-1/2 transition duration-700 group-hover:rotate-[8deg]">
        @endif
      </div>
      <div class="flex flex-col justify-end p-8 lg:p-12">
        <div class="flex items-center gap-3 text-xs font-medium uppercase tracking-wider text-neutral-400">
          <span>{{ $lead['category'] }}</span><span aria-hidden="true">&middot;</span>
          <time datetime="{{ $lead['at']->toDateString() }}">{{ $lead['at']->format('j M Y') }}</time>
        </div>
        <h2 class="mt-4 text-3xl font-black leading-tight tracking-[-0.02em] group-hover:text-neutral-500 sm:text-4xl">{{ $lead['title'] }}</h2>
        <p class="mt-4 max-w-lg text-[15px] leading-relaxed text-neutral-500">{{ $lead['excerpt'] }}</p>
        <span class="mt-8 inline-flex items-center gap-2 text-sm font-medium">Read more
          <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><line x1="7" x2="17" y1="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
        </span>
      </div>
    </a>
  </section>
@endif

<section class="v3-wrap py-20 lg:py-24">
  @if ($posts->count() > 1)
    <div class="grid gap-x-8 gap-y-14 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($posts->skip(1) as $post)
        @include('partials.v3.news-card', ['post' => $post])
      @endforeach
    </div>
  @elseif ($posts->isEmpty())
    <p class="text-neutral-500">No news yet. Check back soon.</p>
  @endif
</section>

@endsection
