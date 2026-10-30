{{--
  Rebrand layout. Pages extend this and fill @section('page'); title, description,
  robots, og_image and the head/scripts stacks pass through to layouts.app.
  The footer carries the closing call to action, so pages don't add their own.
--}}
@extends('layouts.app')

@section('bare', true)
@section('body_class', 'v3-body')

@push('head')
  @include('partials.v3.styles')
@endpush

@section('content')
  @include('partials.v3.nav')
  @yield('page')
  @include('partials.v3.footer')
@endsection
