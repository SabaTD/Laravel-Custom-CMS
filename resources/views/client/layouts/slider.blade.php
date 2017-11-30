<div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
   <div class="carousel-inner" role="listbox">

      @foreach($slider as $i =>  $item)

         @php
            $details = $item->sliderDetail()->where('lang',App::getLocale())->first();
         @endphp
         <div class="item @if($i==0) active @endif" style="background-image: url({{ asset($item->image) }});">
            <div class="slider_content">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7 col-md-8 col-sm-10 col-sm-offset-0 col-xs-12">
                        <h1 class="slider_title">{{ $details->title }}</h1>
                        <div class="slider_text">
                           @php echo  $details->description; @endphp
                        </div>
                        <div class="slider_see_more">
                           <a href="{{ url($details->link) }}">@lang('translation.seeMore')</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @endforeach

   </div>

   <div class="slider_navigation">
      <div class="slider_icons">
        <div id="arrow">
            <ul>
               <li id="prev" class="left carousel-control" href="#carouselFade" data-slide="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
               <li id="next" class="right carousel-control" href="#carouselFade" data-slide="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
            </ul>
         </div>
         <ul class="slider_bullet carousel-indicators">
            @foreach($slider as $i =>  $item)
               <li data-target="#carouselFade" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
            @endforeach
         </ul>
      </div>
   </div>

</div>
