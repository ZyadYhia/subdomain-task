@extends('web.layout')
@section('title')
    Provider: {{ $provider->name }}
@endsection
@section('main')

    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg') }})">
        </div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ url('/') }}">{{ __('web.home') }}</a></li>
                        <li>{{ $provider->name }}</li>
                    </ul>
                    <h1 class="white-text">{{ $provider->name }}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">

                    <!-- row -->
                    <div class="row">

                        @foreach ($locations as $location)
                            <!-- single skill -->
                            <div class="col-md-4">
                                <div class="single-blog">
                                    <h4 class="my-5">{{ $provider->name }}</h4>
                                    <div class="blog-meta">
                                    </div>
                                    <ul>
                                        <li>longitude: {{ $location->longitude }}</li>
                                        <li>latitude: {{ $location->latitude }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /single skill -->
                        @endforeach



                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- search widget -->
                    <div class="widget search-widget">
                        <form>
                            <input class="input" type="text" name="search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /search widget -->

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>providers</h3>
                        @foreach ($providers as $provider)
                            <a class="category"
                                href="{{ url("show/$provider->user_name") }}">{{ $provider->name }}<span>{{ $provider->locations()->count() }}</span></a>
                        @endforeach
                    </div>
                    <!-- /category widget -->
                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->


@endsection
