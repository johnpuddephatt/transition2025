<footer class="site-footer">
  <div class="site-footer--brand">
    @if(has_site_icon())
    <a class="site-footer--brand--image" href="{{ home_url('/') }}">
      <img src="{{ get_site_icon_url() }}" alt="Transition by Design Logo" />
    </a>
    @endif
    <div class="site-footer--brand--text">
      <h3 class="site-footer--title">{{ get_bloginfo('description', 'display') }}</h3>
      <p>
        <span
          class="site-footer--address contact-address">{{ get_theme_mod('contact_address', 'Makespace Oxford, Aristotle Ln, Oxford OX2 6TP') }}</span>
        <br><a class="site-footer--email contact-email"
          href="mailto:{{ get_theme_mod('contact_email', 'info@transitionbydesign.org') }}">{{ get_theme_mod('contact_email', 'info@transitionbydesign.org') }}</a>
        <br><a class="site-footer--phone contact-phone"
          href="tel:{{ get_theme_mod('contact_phone', '00441865554927') }}">{{ get_theme_mod('contact_phone_human', '(+44) 1865 554927') }}</a>
      </p>

      @if(get_theme_mod('facebook'))
      <a class="navbar-item social-icon social-icon__facebook" href="{{ get_theme_mod('facebook') }}" target="_blank">
        @include('icons.facebook')
      </a>
      @endif

      @if(get_theme_mod('twitter'))
      <a class="navbar-item social-icon social-icon__twitter" href="{{ get_theme_mod('twitter') }}" target="_blank">
        @include('icons.twitter')
      </a>
      @endif

      @if(get_theme_mod('instagram'))
      <a class="navbar-item social-icon social-icon__instagram" href="{{ get_theme_mod('instagram') }}" target="_blank">
        @include('icons.instagram')
      </a>
      @endif

      @if(get_theme_mod('linkedin'))
      <a class="navbar-item social-icon social-icon__linkedin" href="{{ get_theme_mod('linkedin') }}" target="_blank">
        @include('icons.linkedin')
      </a>
      @endif
    </div>
  </div>
  <div class="site-footer--logos">
    <a href="https://uk.coop/directory/transition-design-cooperative">
      <img src="@asset('images/cuk_member.svg')" />
    </a>
    <a href="https://www.architecture.com/find-an-architect/transition-by-design/oxford">
      <img src="@asset('images/RIBA-logo.svg')" />
    </a>
  </div>
</footer>