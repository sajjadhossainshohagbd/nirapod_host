<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            {{-- <span class="logo-sm">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="22">
            </span> --}}
            <span class="logo-lg">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{ route('dashboard') }}" class="logo logo-light">
            {{-- <span class="logo-sm">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="22">
            </span> --}}
            <span class="logo-lg">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admission') }}">
                        <i class="fa fa-user"></i>
                        <span>Admission</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('students') }}">
                        <i class="fa fa-user-friends"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subscriber.list') }}">
                        <i class="fa fa-user-friends"></i>
                        <span>Subscribers</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-info"></i>
                        <span>Information</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category') }}">Category</a></li>
                        <li><a href="{{ route('information.list') }}">List</a></li>
                        <li><a href="{{ route('information.collect') }}">Add</a></li>
                    </ul>
                </li>
{{-- 
                <li>
                    <a href="{{ route('package') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Packages</span>
                    </a>
                </li> --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-info"></i>
                        <span>Packages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('package',['position' => 'home_page']) }}">Home Page</a></li>
                        <li><a href="{{ route('package',['position' => 'reseller']) }}">Reseller</a></li>
                        <li><a href="{{ route('package',['position' => 'ssd']) }}">SSD Web Hosting</a></li>
                        <li><a href="{{ route('package',['position' => 'dedicated_server']) }}">Dedicated Server</a></li>
                        <li><a href="{{ route('package',['position' => 'vps_server']) }}">VPS Server</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('pages') }}">
                        <i class="fa fa-file"></i>
                        <span>Pages</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.blog') }}">
                        <i class="fa fa-blog"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('comments') }}">
                        <i class="fa fa-comment-dots"></i>
                        <span>Comments</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('reviews') }}">
                        <i class="fa fa-search-location"></i>
                        <span>Review</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-cog"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('header.setup') }}">Header</a></li>
                        <li><a href="{{ route('slider.setup') }}">Slider</a></li>
                        <li><a href="{{ route('load.balancing') }}">Load Balancing</a></li>
                        <li><a href="{{ route('why.choose') }}">Why Choose</a></li>
                        <li><a href="{{ route('review.setup') }}">Review</a></li>
                        <li><a href="{{ route('footer-up.setup') }}">Footer Up</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-cog"></i>
                        <span>Reseller</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('reseller.header.setup') }}">Header</a></li>
                        <li><a href="{{ route('reseller.option.one.setup') }}">Option</a></li>
                        <li><a href="{{ route('reseller.faq') }}">FAQ</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-cog"></i>
                        <span>Web Hosting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('web.hosting.header') }}">Header</a></li>
                        <li><a href="{{ route('web.hosting.options') }}">Option</a></li>
                        <li><a href="{{ route('web.hosting.features.option') }}">Features</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-cog"></i>
                        <span>Dedicated Server</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dedicated.server.header') }}">Settings</a></li>
                        <li><a href="{{ route('dedicated.server.feature') }}">Features</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.vps.server') }}">
                        <i class="uil-cog"></i>
                        <span>VPS Server</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>