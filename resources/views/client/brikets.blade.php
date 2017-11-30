@extends('client.layouts.master')

@section('title', trans('translation.Menu4'))
@section('description', trans('translation.Menu4_Description'))
@section('breadcrumbs', Breadcrumbs::render('brikets'))

@section('content')
   <div class="page_content">
      <div class="container">
         <div class="briket_section">
            @if(!empty($brikets))
               @php $bricketsDetail = $brikets->briketsDetail()->where('lang', App::getLocale())->first(); @endphp
               <div class="row">
                 <div class="col-md-4">
                     <div class="brikets_img">
                        <img src="{{asset($brikets->image)}}" class="img-responsive">
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="briket_text">
                        <h2>{{$bricketsDetail->title}}</h2>
                        <div class="kera_text">
                           {!! $bricketsDetail->description !!}
                        </div>
                     </div>
                  </div>
               </div>
            @endif

            @if(!empty($categories))
               <div class="row">
                  @foreach ($categories as $category)
                     @php $categoryDetail = $category->categoryDetail->where('lang', App::getLocale())->first(); @endphp
                     <div class="col-md-4">
                        <a href="category.html">
                           <div class="brikets_item product_item" style="background-image: url({{asset($category->image)}});">
                              <h3>{{$categoryDetail->title}}</h3>
                           </div>
                        </a>
                     </div>
                  @endforeach
               </div>
            @endif
        </div>
     </div>
   </div>

@endsection
