@extends('client.layouts.master')


@section('title', trans('translation.Menu2'))
@section('description', trans('translation.Menu2_Description'))
@section('breadcrumbs', Breadcrumbs::render('about'))

@section('content')
   <div class="page_content">
      <div class="container">
         <div class="page_section">
            <div class="row">
               @if(!empty($about))
                  @php $aboutDetails = $about->aboutDetail()->where('lang', App::getLocale())->first(); @endphp
                  <div class="col-md-12">
                     <div class="section_image about_image" style="background-image: url({{asset($about->image)}})"></div>
                     <div class="about_text">
                        <h1>{{$aboutDetails->title}}</h1>
                        <div class="kera_text">
                           {!! $aboutDetails->description !!}
                        </div>
                     </div>
                  </div>
               @endif
            </div>
        </div>
     </div>
   </div>

@endsection
