{{--
  Template Name: Services
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container">
         @include('partials.page-header', ['class' => 'entry-header__section', 'header_title' => $title])
<hr>
      <div class="entry-content entry-content__page">

  <main class="entry-content--main">

  {!! $page->content !!}

    <div id="our-services" class="about-services">
  
      <ul class="about-services--list">
        @foreach($services as $service)
          <li><a class="about-services--list--item--anchor" href="/service/{{$service->slug }}">{!! $service->name !!}</a></li>
        @endforeach
      </ul>
    </div>



  </main>


</div>

    </div>
  @endwhile
    @include('partials.newsletter')

@endsection
