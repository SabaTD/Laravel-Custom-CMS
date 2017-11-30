@extends('client.layouts.master')


@section('title', trans('translation.workingTechnology'))
@section('description', trans('translation.workingTechnology_Description'))
@section('breadcrumbs', Breadcrumbs::render('workingTechnology'))

@section('content')
   <div class="page_content">
      <div class="container">
         <div class="page_section">
            <div class="row">
               @if(!empty($workingTechnology))
                  @php $workingTechnologyDetaols = $workingTechnology->workingTechnologyDetail()->where('lang', App::getLocale())->first(); @endphp
                  <div class="col-md-12">
                     <div class="section_image about_image" style="background-image: url({{asset($workingTechnology->image)}})"></div>
                     <div class="about_text">
                        <h1>{{$workingTechnologyDetaols->title}}</h1>
                        <div class="kera_text">
                           {!! $workingTechnologyDetaols->description !!}
                        </div>
                     </div>
                  </div>
               @endif
            </div>
        </div>
     </div>
   </div>

@endsection
