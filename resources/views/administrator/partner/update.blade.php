@extends('administrator.inc.layout')


@section('title', 'პარტნიორი')



@section('content')

@include('administrator.inc.message')

<div class="page-title">

<div class="title_left">

<h3>პარტნიორის განახლება</h3>

</div>

</div>



<div class="row">

<div class="col-md-12">

<div class="x_panel">

  <div class="x_content">

	 <div class="col-md-10 col-sm-12">

    <form method="POST" action="" data-parsley-validate class="form-horizontal"  enctype="multipart/form-data">

      {{ csrf_field() }}

        <ul class="nav nav-tabs">

          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

          <?php if($localeCode == 'en') { $ico = 'gb'; } elseif($localeCode == 'ge') { $ico = 'ge'; } else { $ico = $localeCode; } ?>

                <li @if($localeCode == 'ge') class="active" @endif>

                      <a  href="#{{$localeCode}}" data-toggle="tab"><span class="flag-icon flag-icon-{{$ico}}"></span> {{$properties['native']}}</a>

                </li>

          @endforeach

        </ul>

      <div class="tab-content" style="margin-top:20px;">

          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
             @php $partnerDetails = $item->partnerDetail()->where('lang',$localeCode)->first(); @endphp

          <?php if($localeCode == 'en') { $ico = 'gb'; } else { $ico = $localeCode; } ?>

            <div class="tab-pane @if($localeCode == 'ge') active @endif" id="{{$localeCode}}">

               <div class="form-group">
                   <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title_{{$localeCode}}">სათაური</label>
                   <div class="col-md-10 col-sm-10  col-xs-12">
                     <input type="text" name="title_{{$localeCode}}" class="form-control" id="title_{{$localeCode}}" required value="{{ $partnerDetails->title }}" >
                   </div>
               </div>

               <div class="form-group">
                   <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description_{{$localeCode}}">აღწერა</label>
                   <div class="col-md-10 col-sm-10  col-xs-12">
                      <textarea name="description_{{$localeCode}}" class="textarea" id="description_{{$localeCode}}" required>{{ $partnerDetails->description }}</textarea>
                   </div>
               </div>

            </div>

           @endforeach

      </div>

        <hr/>

        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="link">ლინკი</label>
            <div class="col-md-10 col-sm-10  col-xs-12">
               <input type="text" name="link" class="form-control" id="link" value="{{$item->link}}">
            </div>
        </div>

        <div class="form-group" style="margin-top:55px !important;">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="images">სურათი</label>
            <div class="col-md-10 col-sm-10  col-xs-12">
             <input type="file" name="image" class="form-control" id="image" >
            </div>
        </div>

        @if(isset($item))
         <div class="form-group" id="imageCont">
            <div class="col-md-10 col-md-offset-2">
               <div class="panel panel-default" style="border-radius:0">
                  <div class="panel-heading">ატვირთული სურათი</div>

                  <div class="panel-body">
                     <div class="row" >
                         <div class="col-md-4 " data-id="{{$item->id}}">
                           <div class="thumbnail"  style="height:auto;">
                             <div class="image view view-first">
                               <img style="width: 100%; display: block;" src="{{asset($item->image)}}" alt="image" />
                             </div>
                           </div>
                         </div>
                      </div>
                   </div>

                </div>
            </div>
         </div>
       @endif

        <div class="form-group">
          <div class="col-md-offset-2 col-md-3 col-sm-4 col-xs-12">
            <label>
              <input type="checkbox" name="publish" class="js-switch" {{$item->publish ? 'checked' : ''}} />
              გამოქვეყნებულია
            </label>
           </div>
        </div>



      <hr/>

	 	   <div class="form-group">

	        <div class="col-md-10 col-md-offset-2">

	  	 		<button type="submit" class="btn btn-success btn-add">განახლება</button>



        </div>

  	 	</div>



     </form>



  </div>

@endsection



@section('style')
    <link href="{{asset('assets/admin')}}/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="{{asset('assets/admin')}}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="{{asset('assets/admin')}}/vendors/redactor/redactor1.css" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/jquery.fileuploader/jquery.fileuploader.css')}}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{asset('assets/admin')}}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/switchery/dist/switchery.min.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="{{asset('assets/admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <script src="{{asset('assets/admin')}}/vendors/autosize/dist/autosize.min.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/starrr/dist/starrr.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('assets/admin/vendors/redactor/redactor1.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/jquery.fileuploader/jquery.fileuploader.js')}}"></script>
@endsection

@section('js')

<script>

$(document).ready(function() {
   $('input[name="image"]').fileuploader({addMore: false});
   $('input[name="logo"]').fileuploader({addMore: false});
   $('input[name="images"]').fileuploader({addMore: true});

   $('textarea').redactor({
      imageUpload: "{{url('admin/upload')}}?_token=" + "{{csrf_token()}}",
      fileUpload: "{{url('admin/upload')}}?_token=" + "{{csrf_token()}}",
      lang: 'ka',
      autoresize: true,
      minHeight: 200
   });

   $('.delImg').click(function (e) {
       var id = $(this).data('id');
       $.confirm({
           title: 'დასტური',
           content: 'დარწმუნებული ხართ, რომ გურთ სურათის წაშლა?',
           buttons: {
              confirm: {
                   text: 'წაშლა',
                   btnClass: 'btn-red',
                   action: function () {
                       $.ajax({
                           headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                           url: '{{url("admin/partner/deleteimg/")}}',
                           type: "post",
                           data: {id: id, _token: '{{ csrf_token() }}'},
                           success: function (response) {

                               $('.thumb_' + id).remove();
                               new PNotify({
                                  text: 'სურათი წარმატებით წაიშალა',
                                  type: 'success',
                                  styling: 'bootstrap3'
                               });
                           }
                       });
                   }
              },
              close: {
                   text: 'დახურვა',
                   action: function () {
                   }
              }
           }
       });
   });


});

</script>
@endsection
