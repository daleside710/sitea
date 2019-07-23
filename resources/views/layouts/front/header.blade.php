<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="{{ asset('img/logo/logo.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a class="dropdown-item @if( request()->is('/') || request()->is('index') ) active @endif" href="{{ url('/index') }}">
                                                {{ __('word.home') }}
                                            </a>
                                        </li>
                                        @if (Auth::check())
                                            <li>
                                                <a class="dropdown-item @if( request()->is('attribute*') ) active @endif" href="{{ url('/attribute') }}">
                                                    {{ __('word.attribute') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item @if( request()->is('product*') ) active @endif" href="{{ url('/product') }}">
                                                    {{ __('word.product') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        @if (Auth::check())
                            <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                <div class="header-nav-feature header-nav-features-user header-nav-features-user-logged d-inline-flex mx-2 pr-2" id="headerAccount">
                                    <a href="#" class="header-nav-features-toggle">
                                        <i class="far fa-user"></i> {{ Auth::user()->user_id }}
                                    </a>
                                    <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed header-nav-features-dropdown-force-right" id="headerTopUserDropdown">
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="mb-0 pb-0 text-2 line-height-1 pt-1">{{__('word.hello')}},</p>
                                                <p><strong class="text-color-dark text-4">{{ Auth::user()->user_id }}</strong></p>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-end">
                                                    <img class="rounded-circle" width="40" height="40" alt="" src="img/avatars/avatar.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <ul class="nav nav-list-simple flex-column text-3">
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/myprofile') }}">{{__('word.my_profile')}}</a></li>
                                                    <li class="nav-item">
                                                        <a class="nav-link border-bottom-0" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{__('word.log_out')}}</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                <div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pr-2 signin" id="headerAccount">
                                    <a href="{{ url('/login') }}" class="header-nav-features-toggle-link mr-3">
                                        <i class="fa fa-user"></i> {{__('word.sign_in')}}
                                    </a>
                                    <a href="{{ url('/register') }}" class="header-nav-features-toggle-link">
                                        <i class="fa fa-user-plus"></i> {{__('word.sign_up')}}
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>