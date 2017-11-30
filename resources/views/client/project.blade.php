@extends('client.layouts.master')

@section('title', trans('translation.Menu5'))
@section('description', trans('translation.Menu5_Description'))
@section('breadcrumbs', Breadcrumbs::render('project', $project))

@section('content')

   @if(!empty($project))
      @php
         $projectDetails = $project->projectDetail()->where('lang', App::getLocale())->first();
         $projectImages = $project->projectImage;

      @endphp
      <div class="page_content">
      	<div class="container">
      		<div class="briket_section">
      			<div class="row">
      				<div class="col-md-12">

      					<div class="category_gallery project_gallery">

      				      <div id="photogallery" class="carousel slide" data-ride="carousel" data-interval="false">
      							<div class="bigPhoto category-gallery carousel-inner">
                              @if(!$projectImages->isEmpty())
                                   @for($i=0; $i<sizeof($projectImages); $i++)
                                        <div class="item @if($i==0) active @endif">
                                           <a href="{{$projectImages[$i]->image}}">
                                              <img src="{{$projectImages[$i]->image}}" class="img-responsive">
                                           </a>
                                     </div>
                                   @endfor
                              @else
                                   <div class="item active">
                                        <a href="{{$project->image}}">
                                             <img src="{{$project->image}}" class="img-responsive">
                                        </a>
                                   </div>
                              @endif
      							</div>
      						</div>

                        @if(!$projectImages->isEmpty())
         						<div class="small_images">
         							<div id="imageMin" class="carousel-indicators  owl-carousel owl-theme">
                                 @foreach ($projectImages as $key => $projectImage)
                                    <div class="item @if($key==0) active @endif" data-target="#photogallery" data-slide-to="{{$key}}">
             			     					<div class="plus_box_img">
             			     						<img src="{{$projectImage->image}}" class="img-responsive">
             			     					</div>
             			     				</div>
                                 @endforeach
      								</div>
      							</div>
                        @endif


      					</div>

      					<div class="category_text project_text">
      						<h2>{{$projectDetails->title}}</h2>
      							<div class="kera_text">
				                 {!! $projectDetails->description !!}
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
   @endif

@endsection
