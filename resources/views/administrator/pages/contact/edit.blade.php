@extends('administrator.inc.layout')

@section('title', 'კონტაქტი')



@section('content')

@include('administrator.inc.message')



<div class="page-title">

<div class="title_left">

<h3>კონტაქტი</h3>

</div>

</div>

<div class="row">

<div class="col-md-12">

<div class="x_panel">

  <div class="x_content">

	<form method="POST" action="" data-parsley-validate class="form-horizontal"  enctype="multipart/form-data">

  	 	{{ csrf_field() }}

		<div class="col-md-10 col-sm-12">

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

            <div class="tab-pane @if($localeCode == 'ge') active @endif" id="{{$localeCode}}">

               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">მისამართი<span>*</span></label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" name="address_{{$localeCode}}" id="title" class="form-control col-md-7 col-xs-12" required value="{{isset($contact) ? $contact->contactDetail()->where('lang',$localeCode)->first()->address : ''}}">
                  </div>
               </div>

            </div>

          @endforeach


          <div class="form-group">
             <label class="control-label col-md-2 col-sm-2 col-xs-12" for="details">ტელეფონი <span>*</span></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" name="phone" id="details" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->phone)){{$contact->phone}}@endif" required>
             </div>
          </div>

          <div class="form-group">
             <label class="control-label col-md-2 col-sm-2 col-xs-12" for="details">მობილური <span>*</span></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" name="mobile" id="details" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->mobile)){{$contact->mobile}}@endif" required>
             </div>
          </div>

          <div class="form-group">
             <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">ელ.ფოსტა<span>*</span></label>
             <div class="col-md-10 col-sm-10 col-xs-12">
               <input type="text" name="mail" id="details" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->mail)){{$contact->mail}}@endif" required>
             </div>
          </div>

          <div class="form-group">
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="facebook">Facebook ბმული</label>
               <div class="col-md-10 col-sm-10 col-xs-12">
                 <input type="text" name="facebook" id="facebook" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->facebook)){{$contact->facebook}}@endif">
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="youtube">Youtube ბმული</label>
               <div class="col-md-10 col-sm-10 col-xs-12">
                  <input type="text" name="youtube" id="youtube" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->youtube)){{$contact->youtube}}@endif">
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="youtube">Instagram ბმული</label>
               <div class="col-md-10 col-sm-10 col-xs-12">
                 <input type="text" name="instagram" id="instagram" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->instagram)){{$contact->instagram}}@endif">
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="youtube">Twitter ბმული</label>
               <div class="col-md-10 col-sm-10 col-xs-12">
                 <input type="text" name="twitter" id="twitter" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->twitter)){{$contact->twitter}}@endif">
               </div>
            </div>


            <div class="form-group">
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="details">გრძედი <span>*</span></label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" name="longitude" id="details" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->longitude)){{$contact->longitude}}@endif" required>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="details">განედი <span>*</span></label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" name="latitude" id="details" class="form-control col-md-7 col-xs-12" value="@if(isset($contact->latitude)){{$contact->latitude}}@endif" required>
               </div>
            </div>

            <hr>

     	      <div class="form-group">

            <div class="col-md-10 col-md-offset-2">
      	 		<button type="submit" class="btn btn-success btn-add">განახლება</button>
            </div>

  	 	   </div>

     </form>



  </div>

  </div>

@endsection



@section('style')

<!-- Select2 -->

    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">

    <!-- Switchery -->

    <link href="{{asset('assets/admin/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">



    <link href="{{asset('assets/admin/vendors/redactor/redactor1.css')}}" rel="stylesheet">

    <link href="{{asset('assets/admin/vendors/jquery.fileuploader/jquery.fileuploader.css')}}" rel="stylesheet">

<!-- ui -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('script')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- jQuery Tags Input -->

    <script src="{{asset('assets/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>

 <!-- Switchery -->

    <script src="{{asset('assets/admin/vendors/switchery/dist/switchery.min.js')}}"></script>

    <!-- Select2 -->

    <script src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>

    <!-- Parsley -->

    <script src="{{asset('assets/admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- Autosize -->

    <script src="{{asset('assets/admin/vendors/autosize/dist/autosize.min.js')}}"></script>

    <!-- jQuery autocomplete -->

    <script src="{{asset('assets/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>

    <!-- starrr -->

    <script src="{{asset('assets/admin/vendors/starrr/dist/starrr.js')}}"></script>

  	<!--

    <script src="{{asset('assets/admin')}}/vendors/ckeditor/ckeditor.js"></script>

 -->

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{asset('assets/admin/vendors/redactor/redactor1.js')}}"></script>

  	<script src="{{asset('assets/admin/vendors/jquery.fileuploader/jquery.fileuploader.js')}}"></script>



@endsection
