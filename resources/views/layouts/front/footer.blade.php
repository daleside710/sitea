<footer id="footer">
    <div class="footer-copyright">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                    <a href="{{ url('/') }}" class="logo pr-0 pr-lg-3">
                        <img src="{{ asset('img/logo/logo_footer.png') }}" class="opacity-10" height="33">
                    </a>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                    <p>{{ __('word.copyright') }}</p>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <nav id="sub-menu">
                        <ul>
                            <li><i class="fas fa-angle-right"></i><a href="{{ url('/index') }}" class="ml-1 text-decoration-none"> {{ ucfirst(__('word.home')) }}</a></li>
                            <li><i class="fas fa-angle-right"></i><a href="{{ url('/index') }}" class="ml-1 text-decoration-none"> {{ ucfirst(__('word.about_us')) }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>