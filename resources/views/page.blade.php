@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container">
      @include('partials.page-header', ['class' => 'entry-header__single-page'])
      @include('partials.content-page')
    </div>
  @endwhile
    @include('partials.newsletter')

@endsection
