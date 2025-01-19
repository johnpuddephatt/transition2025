{{--
  Template Name: Projects
--}}

@extends('layouts.app')

@section('content')

  <div class="container">

    @include('partials.page-header', ['class' => 'entry-header__section', 'header_title' => $title])

    <div class="projects-grid projects-grid--wrapper projects-grid--wrapper__irregular">
      <div class="projects-grid projects-grid__irregular">
        @foreach($projects as $project)
          <a href="{!! $project->link !!}" class="projects-grid--project">
            <div class="projects-grid--image">
              {!! $project->thumbnail !!}
            </div>
            <h3 class="projects-grid--heading">{!! $project->client !!}</h3>
            <p class="projects-grid--excerpt">{!! $project->excerpt !!}</p>
            <p class="projects-grid--read-more">See this project&nbsp;&rarr;</p>
          </a>
        @endforeach
      </div>
    </div>

  </div>

@endsection
