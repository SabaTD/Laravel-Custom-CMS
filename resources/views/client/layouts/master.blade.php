<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@section('title', trans('translation.Menu1'))
   @section('description', trans('translation.Menu1_Description'))
   @section('ogimage', asset('assets/client/image/cover.jpg'))

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <meta name="title" content="@yield('title')" />
  <meta name="description" content="@yield('description')" />
  <link href="{{asset('assets/client/image/fav.png')}}" rel="shortcut icon" type="image/x-icon" />

  <meta property="og:title" content="@yield('title')"/>
  <meta property="og:type" content="article" />
  <meta property="og:image" content="@yield('ogimage')"/>
  <meta property="og:image:width" content="470" />
  <meta property="og:image:height" content="246" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="კერა" />
  <meta property="og:description" content="@yield('description')"/>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('assets/client/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/style-dist.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/fonts.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/responsive.css')}}">
</head>

<body>
	<div @if(isset($slider)) class="slider_section" @else class="page_header" style="background-image: url({{asset('assets/client/image/slider1.jpg')}})" @endif>
		<div class="header_section">
			<div class="top_header">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-7 col-xs-8">
							<div class="header_contact">
							   <span class="header_contact_icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
							   <span>InfoHome24@Gmail.com</span>
							</div>
							<div class="header_contact">
                        @if(!empty($contactInfo))
								   <span class="header_contact_icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
		                     <span>{{$contactInfo->phone}}</span>
                        @endif
							</div>
						</div>

						<div class="col-md-2 col-sm-2 col-xs-4">
							<div class="social_icons">
								<div class="hdr_social_icon">
									<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
								</div>
								<div class="hdr_social_icon">
									<a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
								</div>
								<ul class="dropdown">
								   <li class="dropdown-toggle" type="button" data-toggle="dropdown">
			                     <span><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                           </li>
								   <ul class="dropdown-menu">
								      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								      <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
								   </ul>
								</ul>
							</div>
						</div>

						<div class="col-md-2 col-sm-3 col-xs-12">

							<div class="res_lang_bar">
								<div class="dropdown">
                           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              @if($localeCode==\App::getLocale())
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ $properties['native'] }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                              @endif
                           @endforeach
								   <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                 @if($localeCode!=\App::getLocale())
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                 @endif
                              @endforeach
								 	</ul>
							  	</div>
							</div>

							<div class="lang_bar">
								<ul>
                           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                   <li @if($localeCode==\App::getLocale()) class="active" @endif>
                                       <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                          {{ $properties['name'] }}
                                       </a>
                                   </li>
                           @endforeach
								</ul>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-1 col-sm-2 col-xs-6">
							<div class="logo">
								<a href="{{url('/')}}"><img src="{{ asset('assets/client/image/keralogo.png') }}" class="img-responsive"></a>
							</div>
						</div>

						<div class="col-md-11 col-sm-10 col-xs-12">
							<nav class="navbar main_menu">
					         <div class="navbar-header">
		                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					               <span class="sr-only">Toggle navigation</span>
					               <span class="icon-bar"></span>
					               <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
			                  </button>
					         </div>
						      <div id="navbar" class="navbar-collapse collapse top_menu">
						         <ul class="nav navbar-nav">
						            <li><a href="{{ url('/') }}">@lang('translation.Menu1')</a></li>
						            <li><a href="{{ url('/about') }}">@lang('translation.Menu2')</a></li>
						            <li class="drop_menu">
						            	<a href="{{ url('/category/') }}">@lang('translation.Menu3')</a>
										<ul>
                                 @foreach($mainCategories as $mainCategory)
                                      @php $mainCategoryDetails = $mainCategory->categoryDetail()->where('lang',App::getLocale())->get(); @endphp
                                      @foreach($mainCategoryDetails as $mainCategoryDetail)
                                          <li><a href="/category/{{$mainCategory->id}}">{{ $mainCategoryDetail->title }}</a></li>
                                      @endforeach
                                @endforeach
										</ul>
						            </li>
						            <li><a href="{{ url('/brikets') }}">@lang('translation.Menu4')</a></li>
						            <li><a href="{{ url('/projects') }}">@lang('translation.Menu5')</a></li>
						            <li><a href="{{ url('/contact') }}">@lang('translation.Menu6')</a></li>
						         </ul>
						      </div>
						   </nav>
						</div>

					</div>
				</div>
			</div>
		</div>



      @if(Request::is('ge/*') || Request::is('en/*') || Request::is('ru/*'))
         <div class="page_title">
     			<h1>@yield('title')</h1>
     			@yield('breadcrumbs')
     		</div>
      @endif

      @if(isset($slider) )
          @include('client.layouts.slider');
      @endif

   </div>

   @yield('content')

   <div class="footer">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-12">
      			<nav class="navbar footer_menu">
      					<div class="navbar-collapse collapse top_menu">
      						<ul class="nav navbar-nav">
                           <li><a href="{{ url('/') }}">@lang('translation.Menu1')</a></li>
                           <li><a href="{{ url('/about') }}">@lang('translation.Menu2')</a></li>
                           <li><a href="{{ url('/category') }}">@lang('translation.Menu3')</a></li>
                           <li><a href="{{ url('/brikets') }}">@lang('translation.Menu4')</a></li>
                           <li><a href="{{ url('/projects') }}">@lang('translation.Menu5')</a></li>
                           <li><a href="{{ url('/contact') }}">@lang('translation.Menu6')</a></li>
      						</ul>
      				   </div>
      			</nav>
   	      </div>
   	   </div>
   	</div>

   	<div class="bottom_footer">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-6 col-sm-6 col-xs-6">
   					<div class="logo">
   						<a href="index.html"><img src="{{ asset('assets/client/image/keralogo.png') }}" class="img-responsive"></a>
   					</div>
   				</div>
   				<div class="col-md-6 col-sm-6 col-xs-6">
   					<div class="smart_logo">
   						<a href=""><img src="{{ asset('assets/client/image/smart_logo.png') }}" class="img-responsive"></a>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>

   	<div class="scroll_top">
   		<i class="fa fa-angle-up" aria-hidden="true"></i>
   	</div>
   </div>

   <script src="{{ asset('assets/client/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/client/js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('assets/client/js/jquery.mobile.custom.js') }}"></script>
   <script src="{{ asset('assets/client/js/jquery.magnific-popup.min.js') }}"></script>
   <script src="https://apis.google.com/js/platform.js"></script>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf8wHcO40pliXS8Yq7N0nChcqi_4soUY4&callback=initMap"></script>
   <script src="{{ asset('assets/client/js/custom.js') }}"></script>
</body>
</html>
