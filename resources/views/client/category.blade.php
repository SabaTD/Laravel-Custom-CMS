@extends('client.layouts.master')

@php
   if(!empty($categoryDetails)){
      $title = $categoryDetails->title;
   }else{
      $title = trans('translation.Menu3');
   }
@endphp
@section('title', $title)
@section('description', trans('translation.Menu3_Description'))
@section('breadcrumbs', Breadcrumbs::render('category', $categoryDetails))

@section('content')
   <div class="page_content">
   	<div class="container">

         @if(!empty($categories))
      		<div class="row">
      			<div class="col-md-12">
      				<div class="category_list">
      					<ul>
                        @foreach($categories as $mcCategory)
                           @php $categoryDetails = $mcCategory->categoryDetail()->where('lang',App::getLocale())->first();  @endphp
                           @if($mcCategory->children)
                              <li class="drop_catmenu @if($category->id == $mcCategory->id)active @endif">
                                 <a href="{{ url('/category/'.$mcCategory->id)}} ">{{$categoryDetails->title}}</a>
                                 <ul>
                                    @foreach($mcCategory->children as $child)
                                        @php $mcCategoryDetails = $child->categoryDetail()->where('lang',App::getLocale())->get(); @endphp
                                              @foreach($mcCategoryDetails as $mcCategoryDetail)
                                                   <li class="@if($category->id == $child->id)active @else '' @endif">
                                                      <a href=" {{ url('/category/'.$child->id)}} ">{{ str_limit($mcCategoryDetail->title, 75) }}</a>
                                                   </li>
                                              @endforeach
                                    @endforeach
                                 </ul>
                              </li>
                           @else
            						<li><a href="{{ url('/category/'.$mcCategory->id)}}">{{$categoryDetails->title}}</a></li>
                           @endif
                        @endforeach
      					</ul>
      				</div>
      			</div>
      		</div>
         @endif

         @if(!$products->isEmpty())
      		<div class="row category_row">
               @foreach($products as $key => $product)
                  @php
                     $productDetails = $product->productDetail()->where('lang', App::getLocale())->first();
                     $productCategory = \App\Category::find($product->category_id);
                     $productCategoryDetails = $productCategory->categoryDetail()->where('lang', App::getLocale())->first();
                  @endphp
                  @section('breadcrumbs'.$key, Breadcrumbs::render('ChildCategories', $productCategory->id, $productCategoryDetails->title, $productCategory->parent_id))

         			<div class="col-md-4 category_col">
   							<div class="product_img">
                           <a href="{{ url('/product/'.$product->id)}}">
				                  <img src="{{asset($product->image)}}" class="img-responsive">
                           </a>
   							</div>
   							<div class="product_title">
                           <a href="{{ url('/product/'.$product->id)}}">
				                  <h3>{{$productDetails->title}}</h3>
                           </a>
      							<div class="cat_road">
         							@yield('breadcrumbs'.$key)
				               </div>
			               </div>
				         </a>
         			</div>
               @endforeach
      		</div>
         @endif

   		<div class="row">
   			<div class="col-md-12">
   				<div class="pagination_section">
   					{{$products->links()}}
   				</div>
   			</div>
   		</div>

   	</div>
   </div>
@endsection
