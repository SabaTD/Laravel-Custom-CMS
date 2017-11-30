@extends('client.layouts.master')

@section('title', trans('translation.Menu6'))
@section('description', trans('translation.Menu6_Description'))
@section('breadcrumbs', Breadcrumbs::render('contact'))

@section('content')
   @if(!empty($contact))
      @php $contactDetails = $contact->contactDetail()->where('lang', App::getLocale())->first(); @endphp
      <div class="contact_map">
         <div id="map"></div>
         <div class="contact_info">
            <h2>@lang('translation.contact_information')</h2>
            <div class="contact_dtl">
               <div class="info">
                  <div class="contact_icon"><img src="{{asset('assets/client/image/ic_pin.png')}}"></div>
                  <div class="info_dtl">{{$contactDetails->address}}</div>
               </div>
               <div class="info">
                  <div class="contact_icon"><img src="{{asset('assets/client/image/ic_phone.png')}}"></div>
                  <div class="info_dtl">
                     @php $cnt = explode(',', $contact->phone) @endphp
                     <span>@if(isset($cnt[0])) {{$cnt[0]}} @endif </span>
                     <span>@if(isset($cnt[1])) {{$cnt[1]}} @endif </span>
                  </div>
               </div>
               <div class="info">
                  <div class="contact_icon"><img src="{{asset('assets/client/image/ic_time.png')}}"></div>
                  <div class="info_dtl">
                     @php $working_hours = explode(',', $contactDetails->working_hours) @endphp
                     <span>@if(isset($working_hours[0])) {{$working_hours[0]}} @endif </span>
                     <span>@if(isset($working_hours[1])) {{$working_hours[1]}} @endif</span>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <script>
         initMap();
         function initMap() {
            var latlng = new google.maps.LatLng({{  $contact->longitude }},{{  $contact->latitude }});
            var options = {
               zoom: 15,
               center: latlng,
               scrollwheel: 0,
               navigationControl: 0,
               mapTypeControl: 0,
               scaleControl: 0
            };
            var map = new google.maps.Map(document.getElementById("map"), options);

            var marker = new google.maps.Marker(  {
               position: latlng,
               map: map
            });
         }
      </script>


   @endif

   <div class="contact_form_section">
      <div class="container">
         <div class="row">
            <div class="contact_form">
               <form>
                  <div class="col-md-6">
                     <div class="form-group">
                        <span><img src="./image/single1.png"></span>
                        <input type="text" name="" placeholder="@lang('translation.email_name')" class="inp">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <span><img src="./image/ic_phone-1.png"></span>
                        <input type="text" name="" placeholder="@lang('translation.email_phone')" class="inp">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <span><img src="./image/email-84.png"></span>
                        <input type="text" name="" placeholder="@lang('translation.email_email')" class="inp">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <span><img src="./image/pencil.png"></span>
                        <input type="text" name="" placeholder="@lang('translation.email_title')" class="inp">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group contact_textarea">
                        <textarea placeholder="@lang('translation.email_text')" ></textarea>
                     </div>
                     <div class="col-md-12">
                        <button class="btn contact_btn">@lang('translation.email_send')</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

@endsection
