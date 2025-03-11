{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php the_post() @endphp
    <div class="container">
      @include('partials.page-header', ['class' => 'entry-header__single-page'])

      @if ($page->thumbnail)
        <figure class="entry-header--image entry-header--image__page">
          {!! $page->thumbnail !!}
        </figure>
      @endif

      @include('partials.content-page-about')
    </div>
  @endwhile
  @include('partials.newsletter')
@endsection
