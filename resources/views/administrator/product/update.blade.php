@extends('administrator.inc.layout')

@section('title', 'პროდუქტი')

@section('content')

@include('administrator.inc.message')

<div class="page-title">
   <div class="title_left">
      <h3>პროდუქტი განახლება</h3>
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
                        @php $productDetails = $product->productDetail()->where('lang',$localeCode)->first(); @endphp

                        <?php if($localeCode == 'en') { $ico = 'gb'; } else { $ico = $localeCode; } ?>

                        <div class="tab-pane @if($localeCode == 'ge') active @endif" id="{{$localeCode}}">

                           <div class="form-group">
                              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title_{{$localeCode}}">სათაური</label>
                              <div class="col-md-10 col-sm-10  col-xs-12">
                                 <input type="text" name="title_{{$localeCode}}" class="form-control" id="title_{{$localeCode}}" required value="{{$productDetails->title}}">
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description_{{$localeCode}}">აღწერა</label>
                              <div class="col-md-10 col-sm-10  col-xs-12">
                                 <textarea name="description_{{$localeCode}}" class="textarea" id="description_{{$localeCode}}" required>@if(!empty($productDetails->description)) {{ $productDetails->description }}  @endif</textarea>
                              </div>
                           </div>

                        </div>

                       @endforeach
                  </div>

                  <hr/>

                  <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="details">კატეგორია</label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                         <select name="category_id">
                              @foreach($categories as $category)
                                 @php
                                    $categoryDetails = $category->categoryDetail()->where('lang', 'ge')->first();
                                    $checked = (($categoryDetails->category_id == $product->category_id)) ? "selected" : ""
                                 @endphp
                                 <option value="{{$categoryDetails->category_id}}" {{ $checked }} >{{$categoryDetails->title}}</option>
                              @endforeach
                         </select>
                      </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nacrianoba">ნაცრიანობა</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="text" name="nacrianoba" class="form-control" id="nacrianoba" value="{{$product->nacrianoba}}">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tenianoba">ტენიანობა</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="text" name="tenianoba" class="form-control" id="tenianoba" value="{{$product->tenianoba}}">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tbokaloria">თბოკალორია</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="text" name="tbokaloria" class="form-control" id="tbokaloria" value="{{$product->tbokaloria}}">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="diametri">დიამეტრი</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="text" name="diametri" class="form-control" id="diametri" value="{{$product->diametri}}">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="sigrdze">სიგრძე</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="text" name="sigrdze" class="form-control" id="sigrdze" value="{{$product->sigrdze}}">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kilovati">კილოვატი</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="text" name="kilovati" class="form-control" id="kilovati" value="{{$product->kilovati}}">
                     </div>
                  </div>

                  <div class="form-group" style="margin-top:55px !important;">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="images">სურათი</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="file" name="image" class="form-control" id="image">
                     </div>
                  </div>

                  @if(isset($product))
                     <div class="form-group" id="imageCont">
                        <div class="col-md-10 col-md-offset-2">
                           <div class="panel panel-default" style="border-radius:0">
                              <div class="panel-heading">ატვირთული სურათი</div>

                              <div class="panel-body">
                                 <div class="row" >
                                     <div class="col-md-4 " data-id="{{$product->id}}">
                                       <div class="thumbnail"  style="height:auto;">
                                         <div class="image view view-first">
                                           <img style="width: 100%; display: block;" src="{{asset($product->image)}}" alt="image" />
                                         </div>
                                       </div>
                                     </div>
                                  </div>
                               </div>

                            </div>
                        </div>
                     </div>
                  @endif

                  <div class="form-group" style="margin-top:55px !important;">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="images">სურათები</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="file" name="images" class="form-control" id="images">
                     </div>
                  </div>

                  @if(count($product->productImage) > 0)
                      <div class="form-group" id="imgWrap">
                         <div class="col-md-10 col-md-offset-2">
                            <div class="panel panel-default" style="border-radius:0">
                               <div class="panel-heading">ატვირთული სურათი</div>
                               <div class="panel-body">
                                  <div class="row">
                                     @foreach ($product->productImage as $key => $value)
                                        <div class="col-md-4  thumb_{{$value->id}}">
                                           <div class="thumbnail">

                                              <div class="image view view-first" data-id="{{$value->id}}" data-main="{{$product->id}}">
                                                 <img src="{{asset($value->image)}}">
                                              </div>
                                              <div class="caption">
                                                 <div class="btn btn-danger delImg" data-img="{{asset($value->image)}}" data-id="{{$value->id}}" data-main="{{$product->id}}"><i class="fa fa-close"></i> სურათის წაშლა</div>
                                              </div>

                                           </div>
                                        </div>
                                     @endforeach
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                  @endif

                  <div class="form-group" style="margin-top:55px !important;">
                     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pfd">PDF ფაილი</label>
                     <div class="col-md-10 col-sm-10  col-xs-12">
                        <input type="file" name="pdf" class="form-control" id="pdf">
                     </div>
                  </div>

                  @if(isset($product->pdf))
                     <div class="form-group" id="pdfCont">
                        <div class="col-md-10 col-md-offset-2">
                           <div class="panel panel-default" style="border-radius:0">
                              <div class="panel-heading"><a href="{{$product->pdf}}" target="_blank">ატვირთული PDF</a></div>
                           </div>
                         </div>
                     </div>
                  @endif

                  <div class="form-group">
                     <div class="col-md-offset-2 col-md-3 col-sm-4 col-xs-12">
                     <label>
                           <input type="checkbox" name="publish" class="js-switch" {{$product->publish ? 'checked' : ''}} />
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
         </div>
      </div>
   </div>
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
      $('input[name="pdf"]').fileuploader({addMore: false});
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
                              url: '{{url("admin/product/deleteimg/")}}',
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
