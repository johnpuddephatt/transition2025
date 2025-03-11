{{--
  Template Name: Author
--}}

@extends('layouts.app')

@section('content')
  <div class="container container__wide">
      <a href="/about#our-people" class="back-link">&larr; Back to our people</a>

    <header class="entry-header entry-header__author">
            <div class="entry-header--image">{!! $author->image !!}</div>

      <div>
        <h1 class="entry-header--title">{{ $author->display_name }}</h1>
        <p class="entry-header--subtitle">{{ $author->position }}</p>
        @if(in_array('display_on_about',$author->type))
        <p class="tag">Member</p>
        @endif

         @if(in_array('display_on_about_associate',$author->type))
        <p class="tag">Asssociate</p>
        @endif
      
        <p class="entry-header--intro">{!! nl2br($author->description) !!}</p>
        <ul class="entry-header--contact">
          @if(in_array('display_on_about',$author->type))
          @if($author->user_email)<li class="contact-email"><a href="mailto:{{ $author->user_email }}">{{ $author->user_email }}</a></li>@endif
          @endif
          @if($author->phone_number)<li class="contact-phone"><a href="tel:{{ $author->user_email }}">{{ $author->phone_number }}</a></li>@endif
          @if($author->instagram)<li class="contact-instagram"><a href="//instagram.com/{{ $author->instagram }}">&#64;{{ $author->twitter }}</a></li>@endif
          @if($author->twitter)<li class="contact-twitter"><a href="//twitter.com/{{ $author->twitter }}">&#64;{{ $author->twitter }}</a></li>@endif
        </ul>
      </div>
    </header>


    @if(count($posts))
      <div class="posts-list--wrapper posts-list--wrapper__author">
        @foreach($posts as $post)
          <a class="posts-list--post" href="{!! $post->link !!}">
            <div class="posts-list--post--image">{!! $post->thumbnail !!}</div>
            <div class="posts-list--post--text">
              <span class="posts-list--post--tag tag">{!! $post->category->name !!}</span>
              <h2 class="posts-list--post--title">{!! $post->post_title !!}</h2>
              <div class="posts-list--post--excerpt">{!! $post->excerpt !!}</div>
            </div>
          </a>
        @endforeach
      </div>
    @endif

  </div>

  @include('partials.newsletter')

@endsection
