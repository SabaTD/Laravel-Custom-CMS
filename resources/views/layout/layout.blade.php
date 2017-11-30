<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  @include('layout.inc.head')
  @yield('style')
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=276792525713511";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div @if(Route::current()->getName() == 'index') class="header_container" @else class="page_container" @endif>
  <div class="header">
      <div class="top_header">
        <div class="container" >
          <div class="row">
          <div class="col-md-6">
            <div class="header_logo">
            <a href="{{Route('index')}}"><img src="{{asset('public/assets/client/image/new_logo1.png')}}" class="img-responsive"></a>
            </div>
          </div>
          <div class="col-md-4 col-md-offset-2" >
            <div class="right_navbar">
            <div class="top_hdr_menu">
              <ul>
                <li><a href="{{Route('index')}}">@lang('menu.home')</a></li>
                <li><a href="{{Route('contact')}}">@lang('menu.contact')</a></li>
                <li><a href="{{Route('gallery')}}">@lang('menu.gallery')</a></li>
              </ul>
            </div>
            <div class="header_icons">
              <div class="social_icons">
                @if(count($social))
                  @if($social->facebook)
                  <div class="icon"><a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></div>
                  @endif
                  @if($social->youtube)
                  <div class="icon"><a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></div>
                  @endif
                @endif
              </div>
              <div class="lang_bar">
                <ul>
                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode == $lang)
                      <li class="active"> {{ $properties['name'] }} </li>
                     @endif
                   @endforeach
                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                   @if($localeCode != $lang)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['name'] }}</a>
                    </li>
                    @endif
                   @endforeach
                </ul>
              </div>
              <div class="lang_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

            </div>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="menu">

        <div class="container">

        <div class="row">
        <div class="col-md-11 col-xs-11">
         
          <nav class="navbar">
              <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li @if(Request::segment(2) == 'about') class="active" @endif><a href="{{Route('about')}}">@lang('menu.about')</a></li>
                  <li @if(Request::segment(2) == 'services') class="active" @endif><a href="{{Route('services')}}">@lang('menu.services')</a></li>
                  <li @if(Request::segment(2) == 'accessories') class="active" @endif><a href="{{Route('accessories')}}">@lang('menu.accessories')</a></li>
                  <li @if(Request::segment(2) == 'models') class="active" @endif><a href="{{Route('models')}}">@lang('menu.models')</a></li>
                  <li @if(Request::segment(2) == 'news') class="active" @endif><a href="{{Route('news')}}">@lang('menu.news')</a></li>
                  <li @if(Request::segment(2) == 'toyota-plus') class="active" @endif><a href="{{Route('plus')}}">@lang('menu.plus')</a></li>
                </ul>
              </div>
          </nav>
          </div>
          <div class="col-md-1 col-xs-1">
           <a href="#" class="search_icon" data-toggle="modal" data-target="#search-modal"> <i class="fa fa-search" aria-hidden="true"></i></a>
          </div>


          </div>
        </div>
      </div>
   </div>
  <div class="modal fade" id="search-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content search_content">
        <div class="modal-body">
          <form role="form" method="GET" action="{{Route('search')}}">
            <div class="form-group search_form">
              <input type="text" name="keyword" placeholder="@lang('site.search_placeholder')" required>
              <span class="search_button">
                <button class="btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>              
    </div>
    </div> <!-- modal -->

@if(Route::current()->getName() != 'index')
<div class="header_img" style="background: url({{asset('public/assets/client/image/hilux.jpg')}}); 
            height: 280px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;">
   <div class="section_effect"></div>

</div>
  
 <div class="page_title">
    <h3>@yield('page_title')</h3>
 </div>
  <div class="page_info">     
  <div class="container">
    <div class="row">
      <div class="col-md-12">
           <div class="past_pages">
              @yield('breadcrumbs')
           </div>
        </div>
      </div>
   </div>     
</div>
</div>
@endif     

@include('layout.inc.errors')
@include('layout.inc.message')
@yield('content')

<div class="footer" @if(Route::current()->getName() == 'contact') style="background: url({{asset('public/assets/client/image/hilux.jpg')}}); 
                    height: 280px;
                    background-attachment: fixed;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;" @endif >
<div class="footer_effect"></div>
@if($map && Route::current()->getName() != 'contact')
<div id="contactMap" style="width: 100%; height:500px"></div>
@else
@endif
    <div class="container">   
      <div class="row">
        <div class="col-md-12">
        <div class="footer_menu @if(Route::current()->getName() == 'contact') footerm @endif">
            <nav class="navbar">
                    <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav">
                        <li ><a href="{{Route('index')}}">@lang('menu.home')</a></li>
                        <li @if(Request::segment(2) == 'contact') class="active" @endif><a href="{{Route('contact')}}">@lang('menu.contact')</a></li>
                        <li @if(Request::segment(2) == 'about-us') class="active" @endif><a href="{{Route('about')}}">@lang('menu.about')</a></li>
                        <li @if(Request::segment(3) == 'photogallery') class="active" @endif><a href="{{Route('photo')}}">@lang('menu.photo')</a></li>
                        <li @if(Request::segment(3) == 'videogallery') class="active" @endif><a href="{{Route('video')}}">@lang('menu.video')</a></li>
                        <li @if(Request::segment(2) == 'models') class="active" @endif><a href="{{Route('models')}}">@lang('menu.models')</a></li>
                        <li @if(Request::segment(2) == 'services') class="active" @endif><a href="{{Route('services')}}">@lang('menu.services')</a></li>
                        <li @if(Request::segment(2) == 'accessories') class="active" @endif><a href="{{Route('accessories')}}">@lang('menu.accessories')</a></li>
                        <li @if(Request::segment(2) == 'news') class="active" @endif><a href="{{Route('news')}}">@lang('menu.news')</a></li>
                        <li @if(Request::segment(2) == 'toyota-plus') class="active" @endif><a href="{{Route('plus')}}">@lang('menu.plus')</a></li>
                      </ul>
                    </div>
                </nav>
          </div>
        </div>
      </div>
      </div>
      @if($map && Route::current()->getName() != 'contact')
        <div class="footer_btn">
          <button id="location_btn" class="btn location_button"><i class="fa fa-chevron-down" aria-hidden="true"></i><span>@lang('site.map')</span></button>
        </div>
        @endif
        <div class="container">
          <div class="row">
           <div class="footer_bottom @if(Route::current()->getName() == 'contact')foot_bottom @endif">
            <div class="col-md-6 col-xs-6 footer_text">
                        <i class="fa fa-copyright" aria-hidden="true"></i> <span>@lang('site.copyright')</span>
                   </div>
                  <div class="col-md-6 col-xs-6 footer_logo">
                    <a href="https://smartweb.ge/" target="_blank">
                      <img src="{{asset('public/assets/client/image/Smart_Web.png')}}" class="img-responsive" alt="">
                    </a>
                  </div>
                  </div>
          </div>
        </div>
      </div>

<script src="{{asset('public/assets/client/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/assets/client/js/owl.navigation.js')}}"></script>
<script src="https://apis.google.com/js/platform.js"></script>
@if($map && Route::current()->getName() != 'contact')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf8wHcO40pliXS8Yq7N0nChcqi_4soUY4" type="text/javascript"></script>
@endif
<script src="{{asset('public/assets/client/js/custom.js')}}"></script>
@yield('script')
@if($map && Route::current()->getName() != 'contact')
<script type="text/javascript">
function contactMap() {
    var latlng = new google.maps.LatLng({{$map->latitude}},{{$map->longitude}});
    var options = {
        zoom: 12,
        center: latlng,
        scrollwheel: 0,
        navigationControl: 0,
        mapTypeControl: 0,
        scaleControl: 0
    };
    var map = new google.maps.Map(document.getElementById("contactMap"), options);
    
    var marker = new google.maps.Marker(  {
        position: latlng,
        map: map
   });
}
google.maps.event.addDomListener(window, 'load', contactMap);

</script>
@endif
@yield('js')
</body>
</html>