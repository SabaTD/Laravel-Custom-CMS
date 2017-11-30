@extends('administrator.inc.layout')

@section('title', 'ჩვენ შესახებ')



@section('content')

@include('administrator.inc.message')



<div class="page-title">

<div class="title_left">

<h3>ჩვენ შესახებ</h3>

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

                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">სათაური

                  </label>

                  <div class="col-md-10 col-sm-10 col-xs-12">

                    <input type="text" name="title_{{$localeCode}}" id="title" class="form-control col-md-7 col-xs-12" required value="{{isset($about) ? $about->aboutDetail()->where('lang',$localeCode)->first()->title : ''}}">

                  </div>

               </div>



               <div class="form-group">

                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description_{{$localeCode}}">ჩვენ შესახებ</label>

                  <div class="col-md-10 col-sm-10 col-xs-12">

                    <textarea id="description_{{$localeCode}}" class="textarea" required name="description_{{$localeCode}}">{{isset($about) ? $about->aboutDetail()->where('lang',$localeCode)->first()->description : ''}}</textarea>

                  </div>

               </div>

            </div>

            @endforeach

             <div class="form-group" style="margin-top:55px !important;">

                <label class="control-label col-md-2 col-sm-2 col-xs-12" id="image"> სურათი</label>

                <div class="col-md-10 col-sm-10  col-xs-12">

                  <input type="file" name="image" class="form-control">

                 </div>

              </div>



             @if(isset($about))

              <div class="form-group" id="imageCont">

              <div class="col-md-10 col-md-offset-2">

              <div class="panel panel-default" style="border-radius:0">

              <div class="panel-heading">ატვირთული სურათი</div>

              <div class="panel-body">

              <div class="row" >

                  <div class="col-md-4 " data-id="{{$about->id}}">

                    <div class="thumbnail"  style="height:auto;">

                      <div class="image view view-first">

                        <img style="width: 100%; display: block;" src="{{asset($about->image)}}" alt="image" />

                      </div>


                    </div>

                  </div>

                </div>

                </div>

                </div></div>

                </div>

            @endif


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

@section('js')

<script>

$(document).ready(function() {

$('input[name="image"]').fileuploader({addMore: false});

$('input[name="images"]').fileuploader({addMore: true});


});


$('textarea').redactor({

imageUpload: "{{url('administrator/upload')}}?_token=" + "{{csrf_token()}}",

fileUpload: "{{url('administrator/upload')}}?_token=" + "{{csrf_token()}}",

lang: 'ka',

autoresize: true,

minHeight: 300

});


  $('.delImg').click(function(e) {

    var id = $(this).data('id');

    var img = $(this).data('img');

    this_element = $(this);

    $.confirm({

        title: 'დასტური',

        content: 'დარწმუნებული ხართ, რომ გურთ სურათის წაშლა?',

        buttons: {

            confirm: {

                text: 'წაშლა',

                btnClass: 'btn-red',

                action: function(){

                  $.ajax({

                  headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },

                      url: '{{url("administrator/leasing/promise/delimg")}}',

                      type: "post",

                      data: { id: id, img: img, _token: '{{ csrf_token() }}' },

                      success: function (response) {

                        var res = $.parseJSON(response)
                          if (res.status == 'success'){

                            new PNotify({

                                  text: 'სურათი წარმატებით წაიშალა',

                                  type: 'success',

                                  styling: 'bootstrap3'

                                });
                                //console.log(this_element);
                                  //$(this).parents().eq(3).remove();
                                  this_element.closest('.col-md-3').remove();
                            //$('#imgWrap').remove();

                          } else {

                            new PNotify({

                                  text: 'დაფიქსირდა შეცდომა',

                                  type: 'error',

                                  styling: 'bootstrap3'

                                });

                          }

                      },

                      error: function(jqXHR, textStatus, errorThrown) {

                         alert(2)

                      }

                  });

                }

            },

            close: {

                text: 'დახურვა',

              action: function(){

                }

            }

        }

    });

 });

  $('textarea').redactor({

      imageUpload: "{{url('administrator/upload')}}?_token=" + "{{csrf_token()}}",

      fileUpload: "{{url('administrator/upload')}}?_token=" + "{{csrf_token()}}",

      lang: 'ka',

      autoresize: true,

      minHeight: 500

  });

</script>

@endsection
