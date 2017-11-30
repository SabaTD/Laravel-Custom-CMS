@extends('client.layouts.master')

@php
   $base = $_SERVER['SERVER_NAME'];
   $category = \App\Category::where('id', $product->category_id)->first();
   $categoryDetails = $category->categoryDetail()->where('lang',App::getLocale())->first();
   $productDetails = $product->productDetail()->where('lang', App::getLocale())->first();
   $productImages = $product->productImage;
@endphp

@section('title', $productDetails->title)
@section('description', trans('translation.Menu3_Description'))
@section('ogimage', $base.$product->image)
@section('breadcrumbs', Breadcrumbs::render('product', $product, $productDetails, $categoryDetails))




@section('content')
   @if(!empty($product))

      <div class="page_content">
        <div class="container">
           <div class="briket_section">
              <div class="row">
                 <div class="col-md-12">
                     <div class="category_gallery">

                        <div id="photogallery" class="carousel slide" data-ride="carousel" data-interval="false">
                           <div class="bigPhoto category-gallery carousel-inner">
                              @if(!$productImages->isEmpty())
                                 @for($i=0; $i<sizeof($productImages); $i++)
                                    <div class="item @if($i==0) active @endif">
                                       <a href="{{$productImages[$i]->image}}">
                                          <img src="{{$productImages[$i]->image}}" class="img-responsive">
                                       </a>
                                    </div>
                                  @endfor
                              @else
                                  <div class="item active">
                                     <a href="{{$product->image}}">
                                          <img src="{{$product->image}}" class="img-responsive">
                                     </a>
                                  </div>
                              @endif
                           </div>
                        </div>

                        @if(!$productImages->isEmpty())
                           <div class="small_images">
                             <div id="galleryMin" class="carousel-indicators  owl-carousel owl-theme">
                                 @foreach ($productImages as $key => $productImage)
                                    <div class="item @if($key==0) active @endif" data-target="#photogallery" data-slide-to="{{$key}}">
           			     				 	   <div class="gallery_box_img">
           			     						   <img src="{{$productImage->image}}" class="img-responsive">
           			     					   </div>
           			     				   </div>
                                 @endforeach
                              </div>
                           </div>
                        @endif
                     </div>


                     <div class="category_text">
                       <h2>{{$productDetails->title}}</h2>
                       <div class="category_dtl">
                           @if(!empty($product->pdf))
                              <div class="category_pdf">
                                 <a href="{{$product->pdf}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> პასპორტის pdf</a>
                              </div>
                           @endif
                           @if(!empty($product->nacrianoba))
                              <div class="category_properties">
                                 <span>@lang('translation.nacrianoba'):</span>
                                 <span>{{$product->nacrianoba}}</span>
                              </div>
                           @endif
                           @if(!empty($product->tenianoba))
                              <div class="category_properties">
                                 <span>@lang('translation.tenianoba'):</span>
                                 <span>{{$product->tenianoba}}</span>
                              </div>
                           @endif
                           @if(!empty($product->tbokaloria))
                              <div class="category_properties">
                                 <span>@lang('translation.tbokaloria'):</span>
                                 <span>{{$product->tbokaloria}}</span>
                              </div>
                           @endif
                           @if(!empty($product->diametri))
                              <div class="category_properties">
                                 <span>@lang('translation.diametri'):</span>
                                 <span>{{$product->diametri}}</span>
                              </div>
                           @endif
                           @if(!empty($product->sigrdze))
                              <div class="category_properties">
                                 <span>@lang('translation.sigrdze'):</span>
                                 <span>{{$product->sigrdze}}</span>
                              </div>
                           @endif
                           @if(!empty($product->kilovati))
                              <div class="category_properties">
                                 <span>@lang('translation.kilovati'):</span>
                                 <span>{{$product->kilovati}}</span>
                              </div>
                           @endif
                        </div>
                        <div class="kera_text">
                           {!! $productDetails->description !!}
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   @endif
@endsection
