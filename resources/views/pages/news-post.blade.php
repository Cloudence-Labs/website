@extends('layouts.v3')

@section('title', $post['seo_title'] . ' | Cloudence')
@section('description', $post['seo_description'])
@section('og_type', 'article')
@section('og_image_alt', $post['title'])
@if (!empty($post['image']))
  @section('og_image', asset($post['image']))
@endif

@push('head')
  <meta property="article:published_time" content="{{ $post['at']->toAtomString() }}">
  <meta property="article:section" content="{{ $post['category'] }}">
  {!! \App\Support\Seo::article($post) !!}
  {!! \App\Support\Seo::breadcrumbs([['Home', '/'], ['News', '/news'], [$post['title'], '/news/' . $post['slug']]]) !!}
@endpush

@section('page')

<article>
  <header class="v3-hero v3-wrap pb-10 pt-14 lg:pt-24">
    <a href="{{ url('/news') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-neutral-500 hover:text-[var(--blue)]">
      <span class="material-symbols-outlined text-[18px]">arrow_back</span> All news
    </a>
    <div class="mt-10 flex items-center gap-3 text-xs font-medium uppercase tracking-wider text-neutral-400">
      <span class="text-[var(--blue)]">{{ $post['category'] }}</span><span aria-hidden="true">&middot;</span>
      <time datetime="{{ $post['at']->toDateString() }}">{{ $post['at']->format('j F Y') }}</time>
    </div>
    <h1 class="mt-5 max-w-4xl text-4xl font-black leading-[1.05] tracking-[-0.03em] sm:text-5xl lg:text-6xl">{{ $post['title'] }}</h1>
    <p class="mt-6 max-w-2xl text-lg leading-relaxed text-neutral-500">{{ $post['excerpt'] }}</p>
  </header>

  @if (!empty($post['image']))
    <div class="v3-wrap">
      <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" fetchpriority="high" class="aspect-[21/9] w-full object-cover" @if (!empty($post['image_position'])) style="object-position: {{ $post['image_position'] }}" @endif>
    </div>
  @endif

  <div class="v3-wrap pb-20 pt-6 lg:pb-28">
    <div class="v3-prose max-w-2xl text-[17px]">{!! $post['html'] !!}</div>

    @if (!empty($post['gallery']))
      <div class="mt-14 grid gap-6 sm:grid-cols-2 {{ count($post['gallery']) === 4 ? 'lg:grid-cols-4' : 'lg:grid-cols-3' }}">
        @foreach ($post['gallery'] as [$src, $caption])
          @php [$w, $h] = @getimagesize(public_path($src)) ?: [4, 3]; @endphp
          <figure>
            <img src="{{ asset($src) }}" alt="{{ $caption }}" loading="lazy" decoding="async" width="{{ $w }}" height="{{ $h }}" class="{{ $h > $w ? 'aspect-[3/4]' : 'aspect-[4/3]' }} w-full object-cover">
            <figcaption class="mt-3 text-sm text-neutral-500">{{ $caption }}</figcaption>
          </figure>
        @endforeach
      </div>
    @endif
  </div>
</article>

@if ($more->isNotEmpty())
  <section class="border-t border-neutral-100">
    <div class="v3-wrap py-20 lg:py-24">
      <h2 class="text-3xl font-black tracking-[-0.02em]">More news</h2>
      <div class="mt-10 grid gap-x-8 gap-y-14 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($more as $p)
          @include('partials.v3.news-card', ['post' => $p])
        @endforeach
      </div>
    </div>
  </section>
@endif

@endsection
