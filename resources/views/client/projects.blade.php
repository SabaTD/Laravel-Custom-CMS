@extends('client.layouts.master')

@section('title', trans('translation.Menu5'))
@section('description', trans('translation.Menu5_Description'))
@section('breadcrumbs', Breadcrumbs::render('projects'))

@section('content')

   @if(!$projects->isEmpty())
   <div class="page_content">
     <div class="container">
        <div class="row category_row">
            @foreach ($projects as $project)
               @php $projectDetails = $project->projectDetail()->where('lang', App::getLocale())->first(); @endphp
               <div class="col-md-4 category_col">
                  <div class="project_img" style="background-image: url({{asset($project->image)}})"></div>
                     <div class="project_title">
                         <h3>{{$projectDetails->title}}</h3>
                     </div>
                     <div class="project_dtl">
                        <a href="{{url('/project/'.$project->id)}}">@lang('translation.detailed')</a>
                  </div>
               </div>
            @endforeach
        </div>

        <div class="row">
           <div class="col-md-12">
              <div class="pagination_section">
                 {{ $projects->links() }}
              </div>
           </div>
        </div>
     </div>
   </div>
   @endif

@endsection
