@extends('administrator.inc.layout')


@section('title', 'ვიდეო')



@section('content')

@include('administrator.inc.message')

<div class="page-title">

<div class="title_left">

<h3>ვიდეოს განახლება</h3>

</div>

</div>



<div class="row">

<div class="col-md-12">

<div class="x_panel">

  <div class="x_content">

	 <div class="col-md-10 col-sm-12">

    <form method="POST" action="" data-parsley-validate class="form-horizontal"  enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group" style="margin-top:55px !important;">
           <label class="control-label col-md-2 col-sm-2 col-xs-12" for="images">ვიდეო</label>
           <div class="col-md-10 col-sm-10  col-xs-12">
              <input type="file" name="video" class="form-control" id="video">
           </div>
        </div>

        @if(isset($video))
         <div class="form-group" id="imageCont">
            <div class="col-md-10 col-md-offset-2">
               <div class="panel panel-default" style="border-radius:0">
                  <div class="panel-heading">ატვირთული ვიდეო</div>

                    <video width="320" height="240" controls>
                      <source src="{{asset($video->video)}}" type="video/mp4">
                      <source src="{{asset($video->video)}}" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>

                </div>
            </div>
         </div>
       @endif

        <div class="form-group">
          <div class="col-md-offset-2 col-md-3 col-sm-4 col-xs-12">
            <label>
              <input type="checkbox" name="publish" class="js-switch" {{$video->publish ? 'checked' : ''}} />
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

<!-- Select2 -->

    <link href="{{asset('assets/admin')}}/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Switchery -->

    <link href="{{asset('assets/admin')}}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">



    <link href="{{asset('assets/admin')}}/vendors/redactor/redactor1.css" rel="stylesheet">



<link href="{{asset('assets/admin/vendors/jquery.fileuploader/jquery.fileuploader.css')}}" rel="stylesheet">



@endsection

@section('script')

<!-- jQuery Tags Input -->

    <script src="{{asset('assets/admin')}}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>

 <!-- Switchery -->

    <script src="{{asset('assets/admin')}}/vendors/switchery/dist/switchery.min.js"></script>

    <!-- Select2 -->

    <script src="{{asset('assets/admin')}}/vendors/select2/dist/js/select2.full.min.js"></script>

    <!-- Parsley -->

    <script src="{{asset('assets/admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>

     <!-- Autosize -->

    <script src="{{asset('assets/admin')}}/vendors/autosize/dist/autosize.min.js"></script>

    <!-- jQuery autocomplete -->

    <script src="{{asset('assets/admin')}}/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

    <!-- starrr -->

    <script src="{{asset('assets/admin')}}/vendors/starrr/dist/starrr.js"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <script src="{{asset('assets/admin/vendors/redactor/redactor1.js')}}"></script>

    <script src="{{asset('assets/admin/vendors/jquery.fileuploader/jquery.fileuploader.js')}}"></script>



@endsection

@section('js')

<script>

$(document).ready(function() {

  $('input[name="video"]').fileuploader({addMore: false});

  $('input[name="logo"]').fileuploader({addMore: false});

  $('input[name="images"]').fileuploader({addMore: true});


 $('textarea').redactor({

      imageUpload: "{{url('admin/upload')}}?_token=" + "{{csrf_token()}}",

      fileUpload: "{{url('admin/upload')}}?_token=" + "{{csrf_token()}}",

      lang: 'ka',

      autoresize: true,

      minHeight: 200

  });

});


</script>

@endsection
