<div class="entry-content entry-content__page">

  <main class="entry-content--main">

    @if ($page->thumbnail)
      <figure class="entry-header--image entry-header--image__page">
        {!! $page->thumbnail !!}
      </figure>
    @endif

    {{-- <h2 class="tag">About us</h2>

    {!! the_content() !!}

    <div id="our-people" class="about-people">
      <h2 class="tag">Our people</h2>
      <div>
        <div class="about-people--grid">
          @foreach ($team as $user)
            <a href="/about/{{ $user->user_login }}" class="about-people--grid--item">
              <div class="about-people--grid--item--image">{!! $user->image !!}</div>
              <h3>{{ $user->display_name }}</h3>
              <p>{{ $user->position }}</p>
            </a>
          @endforeach
        </div>

        @if (isset($associates) && count($associates))
          <h3>Associates</h3>
          <div class="about-people--grid">

            @foreach ($associates as $user)
              <a href="/about/{{ $user->user_login }}" class="about-people--grid--item">
                <div class="about-people--grid--item--image">{!! $user->image !!}</div>
                <h3>{{ $user->display_name }}</h3>
                <p>{{ $user->position }}</p>
              </a>
            @endforeach
          </div>

          <a class="button" target="_blank" href="https://tbd.super.site/associates">Apply to become an associate</a>
        @endif
      </div>
    </div>
    <br><br><br><br>
    <div id="our-services" class="about-services">
      <h2 class="tag">Our services</h2>
      <p class="ml-auto max-w-sm">Choose an area below to find out more about our approach and see examples of our work.
      </p>

      <div>
        <a class="button" href="/services">View all services</a>
      </div>
    </div> --}}
  </main>

  <div class="entry-content--sidebar">
    <h2 class="tag">Contact us</h2>
    <address class="sidebar--address contact-address">
      Transition by Design<br>{!! nl2br(get_theme_mod('contact_address', 'Makespace Oxford, Aristotle Ln, Oxford OX2 6TP')) !!}
    </address>
    <a class="sidebar--email contact-email"
      href="mailto:{{ get_theme_mod('contact_email', 'info@transitionbydesign.org') }}">{{ get_theme_mod('contact_email', 'info@transitionbydesign.org') }}</a>
    <a class="sidebar--phone contact-phone"
      href="telto:{{ get_theme_mod('contact_phone', '00441865554927') }}">{{ get_theme_mod('contact_phone_human', '(+44) 1865 554927') }}</a>
  </div>

</div>
