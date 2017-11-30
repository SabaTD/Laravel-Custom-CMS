@extends('client.layouts.master')

@section('content')


   <div class="page_content">
   	<div class="container">

         @if(!empty($aboutUs))
            @php $aboutUsDetails= $aboutUs->aboutDetail()->where('lang',App::getLocale())->first(); @endphp
            @if(!empty($aboutUsDetails))
         		<div class="row">
         			<div class="page_section">
      		         <div class="col-md-6">
      			         <a href="{{ url('/about') }}"><div class="section_image" style="background-image: url({{asset($aboutUs->image)}})"></div></a>
      		         </div>
      		         <div class="col-md-6">
      		            <section class="section_intro">
         					   <h1><a href="{{ url('/about') }}">{{$aboutUsDetails->title}}</a></h1>
         					   <div class="kera_text">
         					  	   {!! $aboutUsDetails->description !!}
      			            </div>
      			            <a href="{{ url('/about') }}" class="section_dtl">@lang('translation.detailed')</a>
      			         </section>
         			   </div>
         		   </div>
         		</div>
            @endif
         @endif

         @if(!empty($workingTechnology))
            @php $workingTechnologyDetails= $workingTechnology->workingTechnologyDetail()->where('lang',App::getLocale())->first(); @endphp
            @if(!empty($workingTechnologyDetails))
         		<div class="row">
         			<div class="page_section">
            			<div class="col-md-6">
            				<section class="section_intro section_intr2">
            					<h1><a href="{{ url('/workingTechnology')}}">{{$workingTechnologyDetails->title}}</a></h1>
            					<div class="kera_text">
            						{!! $workingTechnologyDetails->description !!}
            					</div>
            				<a href="{{ url('/workingTechnology')}}" class="section_dtl">@lang('translation.detailed')</a>
            				</section>
            			</div>
            			<div class="col-md-6">
            				<a href="{{ url('/workingTechnology')}}"><div class="section_image" style="background-image: url({{asset($workingTechnology->image)}})"></div></a>
            			</div>
         		   </div>
         		</div>
            @endif
         @endif
   	</div>

      @if(!empty($brick))
         @php $brickDetails= $brick->brickDetail()->where('lang',App::getLocale())->first(); @endphp
         @if(!empty($brickDetails))
         	<div class="container">
         		<div class="row">
         			<div class="map_section" style="background-image: url({{asset($brick->image)}})">
         				<div class="col-md-4">
         					<div class="map_section_title">
         						<h1>ბრიკეტის <br>საწარმოების რუკა</h1>
         					</div>
         				</div>
         				<div class="col-md-8">
         					<div class="map_section_button">
         						<a href="{{url('/brikets')}}">{{$brickDetails->title}}</a>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         @endif
      @endif

      <div class="product_section">
   			<div class="container">
               @if(!$categories->isEmpty())
      				<div class="row">
                     @foreach($categories as $category)
                        @php $categoryDetails= $category->categoryDetail()->where('lang',App::getLocale())->first(); @endphp
      						<div class="col-md-3 col-sm-4 col-xs-12">
      							<a href="{{url('/category/'.$category->id)}}">
      								<div class="product_item" style="background-image: url({{asset($category->image)}});">
      									<h3>{{$categoryDetails->title}}</h3>
      								</div>
      							</a>
      						</div>
                     @endforeach
   					</div>
               @endif


					<div class="row">
						<div class="prodict_carusel">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h1 class="section_title">@lang('translation.Menu3')</h1>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<a href="{{url('/category')}}" class="all_products">@lang('translation.seeAll')</a>
							</div>
						</div>
					</div>

               @if(!$products->isEmpty())
					<div class="row">
						<div class="col-md-12">
							<div id="products" class="owl-carousel owl-theme">
							   <div class="item">

                           @foreach($products as $key => $product)
                              @php
                                 $productDetails= $product->productDetail()->where('lang',App::getLocale())->first();
                                 $productCategory = \App\Category::find($product->category_id);
                                 $productCategoryDetails = $productCategory->categoryDetail()->where('lang', App::getLocale())->first();
                              @endphp
                              @section('breadcrumbs'.$key, Breadcrumbs::render('ChildCategories', $productCategory->id, $productCategoryDetails->title, $productCategory->parent_id))

   							    	<div class="products_item">
   							    		<div class="product_img">

       			                        <img src="{{asset($product->image)}}" class="img-responsive">

   							    		</div>
   							    		<div class="product_title">
                                    <a href="{{url('/product/'.$product->id)}}">
       			                        <h3>{{$productDetails->title}}</h3>
                                    </a>
   							    			<div class="cat_road">
   							    				@yield('breadcrumbs'.$key)
   							    			</div>
   							    		</div>
   							    	</div>
                           @endforeach

							   </div>
							</div>
						</div>
					</div>
               @endif
				</div>
		</div>
   </div>

@endsection
