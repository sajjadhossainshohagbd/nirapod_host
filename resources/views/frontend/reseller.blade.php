@extends('frontend.layouts.app')

@section('title')
    Nirapod Host - Secure & Trusted Hosting
@endsection
@section('content')
<div class="top-header overlay-video">
    <div class="container">
        <div class="covervid-wrapper" style="overflow: hidden; background-image: url(&quot;img/topbanner03.jpg&quot;); background-size: cover; background-position: center center;">
            <video class="covervid-video" autoplay="" loop="" muted="" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: auto; width: 1226px;" __idm_id__="238117889">
                <source src="videos/Modem-lights.mp4" type="video/mp4">
            </video>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="wrapper">
                    <h1 class="heading">{{ Settings('reseller_title') }}</h1>
                    <p class="text-white">{{ Settings('reseller_description') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $packages = App\Models\Package::where('position','reseller')->get();
@endphp
<section class="pricing special sec-up-slider">
    <div class="container">
        <div class="row">
            @foreach($packages as $package)
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="wrapper text-left">
                    @if($package->badge !== null)
                    <div class="plans badge feat bg-pink">{{ __($package->badge) }}</div>
                    @endif
                    <div class="top-content">
                        <img class="svg mb-3" src="{{ asset($package->icon) }}" alt="{{ $package->title }}">
                        <div class="title">{{ $package->title }}</div>
                        <div class="fromer">{{ $package->sub_title }}</div>
                        <div class="price"><sup>Tk</sup>{{ $package->amount }} <span class="period">/Month</span></div>
                        <a href="{{ $package->btn_url }}" class="btn btn-default-yellow-fill">{{ $package->btn_name }}</a>
                    </div>
                    <ul class="list-info bg-pink">
                        @foreach(json_decode($package->options) as $option)
							<li><i class="{{ $option->icon }}"></i>  <span class="c-purple">{{ $option->name }}</span>
								<br> <span>{{ $option->value }}</span>
							</li>
							@endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="help pt-80 pb-80">
    <div class="container">
        <div class="service-wrap">
            <div class="row">
                <div class="col-sm-12 col-md-12 text-center">
                    <h2 class="section-heading"> {{ Settings('reseller_option_one_title') }}</h2>
                    <!--<p class="section-subheading">Your success is our success! Whether you are a host, a web designer, or a developer, you can sit back and let Tier.Net power your reseller account. Tier.Net reseller accounts provide all of the features and stability you need to focus on what matters most!</p>-->
                </div>
                @php
                    $options = App\Models\Settings::where('key','reseller_option_one')->get();
                @endphp
                @foreach($options as $option)
                @php
                    $data = json_decode($option->value);
                @endphp
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="help-container">

                        <a href="{{ $data->url }}" class="help-item">
                            <div class="img">
                                <img class="svg ico" src="{{ asset($data->icon) }}" alt="ssd">
                            </div>
                            <div class="inform">
                                <div class="title">{{ $data->title }}</div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="help pt-80 pb-80">
    <div class="container">
        <div class="service-wrap">
            <div class="row">
                <div class="col-sm-12 col-md-12 text-center">
                    <h2 class="section-heading"> {{ Settings('reseller_option_two_title') }}</h2>
                    <!--<p class="section-subheading">Your success is our success! Whether you are a host, a web designer, or a developer, you can sit back and let Tier.Net power your reseller account. Tier.Net reseller accounts provide all of the features and stability you need to focus on what matters most!</p>-->
                </div>
                @php
                    $options = App\Models\Settings::where('key','reseller_option_two')->get();
                @endphp
            </div>
            <div class="row">
                @foreach($options as $option)
                @php
                    $data = json_decode($option->value);
                @endphp
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="help-container">
                        <a href="{{ $data->url }}" class="help-item">
                            <div class="img">
                                <img class="svg ico" src="{{ asset($data->icon) }}" alt="free domain">
                            </div>
                            <div class="inform">
                                <div class="title">{{ $data->title }}</div>

                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</section>
{{-- <section id="features" class="history-section feat01 sec-normal">
    <div class="container">
        <div class="sec-main sec-bg1">


            <div class="row">
                <div class="col-md-12 mb-80 text-center">
                    <h2 class="section-heading ">Our Other unique features are also yours  </h2>
                </div>
                <div class="col-md-12 ">


                    <p>If you have own client base for hosting you can use our reseller hosting package. This has a lot of storage and bandwidth that is cheapest in Bangladesh</p>

                    <p>A reseller plan is a great way for you to earn money on the side, or even become your own full-time web hosting company. Acquire your own hosting clients, or if you’re a web designer you can use a reseller plan to add value for your existing and future customers.</p>

                    <p>A reseller hosting in Bangladesh provides you with everything necessary to start your own web hosting company. WHM allows you to create cPanels for each of your clients.</p>

                    <p>With these bases covered, you are free to market and grow your business in any way that you choose. It’s easy to upgrade, and when you outgrow our reseller plans, we’ll be happy to transfer you to a dedicated server! Now let us see our unique features</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast first animated" style="visibility: visible;">
                    <img class="svg" src="frontend/patterns/ssd.svg" alt="git">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>NVMe SSD storage</h4>
                        <p>SSD is 2/3 times faster then HDD. But we are not using SSD. We are using NVMe SSD which is 5/6 times faster then normal SSD</p>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast first animated" style="visibility: visible;">
                    <img class="svg" src="frontend/patterns/protectvisitors.svg" alt="DDoS protection">
                </div>

                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>DDoS protected reseller hosting</h4>
                        <p>Its life saving security. Our automated system recognizes almost all attack patterns and providing you with first-rate protection against large-scale attacks</p>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast third animated" style="visibility: visible;">
                    <img class="svg" src="frontend/patterns/backups.svg" alt="backups">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>30 Days Remote Daily backups</h4>
                        <p>Yes! We allocate <b>30 times more storage</b> than your package size for keeping backup. No invisible or word of mouth backup. You will see yourself 30 copies of your backup. Self-restore GUI for cPanel and WHM users! Full account restore, singe file restore, download files/backups, restore emails, databases, cron jobs, SSL Certificates and more</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast animated" style="visibility: visible;">
                    <img class="svg first" src="frontend/patterns/support.svg" alt="api automation">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Professional Support</h4>
                        <p>This is our brand. We are always ready to help you. You will get us available during the busy hours, at the evening, <b>even at the midnight</b>. Most of our clients become loyal customer for long terms due to our superb support system</p>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast animated" style="visibility: visible;">
                    <img class="svg first" src="frontend/patterns/performance.svg" alt="api automation">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Higher CPU &amp; RAM per plan</h4>
                        <p>We dare to allow plenty of resource in every packages that is almost impossible for other hosting providers. We allow resource more than a vps even in our lowest packages.</p>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast  animated" style="visibility: visible;">
                    <img class="svg third" src="frontend/patterns/monitoring.svg" alt="1-click-installer">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Systematic monitoring</h4>
                        <p>As a professional hosting company we do routine check all of our server. So we can take first move when anything goes against server. We assure quality without compromising anything</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast  animated" style="visibility: visible;">
                    <img class="svg third" src="frontend/patterns/install.svg" alt="1-click-installer">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Easy 1-click-installer</h4>
                        <p>With an entire suite of application at your fingertips, you can easily create a website with the features your customers want. Our application installer, Softaculous, has an easy to use interface that lets you install, update, or delete applications with just a single click! This means less time trying to get an application to work, and more time actually working.</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast  animated" style="visibility: visible;">
                    <img class="svg third" src="frontend/patterns/ssl.svg" alt="1-click-installer">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Life time free SSL</h4>
                        <p>Get SSL certificate with business cheap web hosting plan to protect your clients’ data. The link between your server and customer’s sensitive information, such as, credit card numbers, passwords and other login information is safely encrypted using our free SSL with every Business cheap web hosting plan. Such safe encryption will increase your revenue as your clients will trust your website more than your competition</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast  animated" style="visibility: visible;">
                    <img class="svg third" src="frontend/patterns/ranking.svg" alt="1-click-installer">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Low load average</h4>
                        <p>With an entire suite of application at your fingertips, you can easily create a website with the features your customers want. Our application installer, Softaculous, has an easy to use interface that lets you install, update, or delete applications with just a single click! This means less time trying to get an application to work, and more time actually working.</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 wow  fadeInUp fast  animated" style="visibility: visible;">
                    <img class="svg third" src="frontend/patterns/maxsecurity.svg" alt="1-click-installer">
                </div>
                <div class="col-md-12 col-lg-5 offset-lg-1">
                    <div class="info-content">
                        <h4>Malware detection </h4>
                        <p>The Complete Six-Layer Security for Your Site. Your website is the lifeblood of your business. That’s why you need to protect your web server from digital attacks. Our automated security solution, powered by AI, will protect it from infections, maintain secure kernels, and keep you in the know with relevant information.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> --}}
<section id="addons" class="sec-normal history-section custom sec-bg3">
    <div class="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading text-white">{{ Settings('reseller_faq_title') }}</h2>
                    <h3 class="section-subheading">{{ Settings('reseller_faq_description') }}</h3>
                </div>

                <div class="col-sm-12 mt-5">
                    <div class="sec-main sec-bg1">
                        <div class="accordion faq">
                            @php
                                $faqs = App\Models\Settings::where('key','reseller_faq')->get();
                            @endphp
                            @foreach($faqs as $key => $faq)
                            @php
                                $data = json_decode($faq->value);
                            @endphp
                            <div class="panel-wrap">
                                <div class="panel-title @if($key==0)active @endif">
                                    <span>{{ $data->question }}</span>
                                    <div class="float-right">
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus c-pink"></i>
                                    </div>
                                </div>
                                <div class="panel-collapse" style="display: block;">
                                    <div class="wrapper-collapse">
                                        <div class="info">
                                            <ul class="list">
                                                <li>
                                                    <p>{{ $data->answer }}</p>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection