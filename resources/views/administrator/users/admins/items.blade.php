@extends('administrator.inc.layout')
@section('title', 'ადმინისტრატორები')
@section('content')
@include('administrator.inc.message')


<div class="page-title">



<div class="title_left">



<h3>ადმინისტრატორები</h3>



</div>



</div>



<div class="row">



<div class="col-md-12">



<div class="x_panel">



<div class="x_title">



  <a href="{{url('admin/admins/create')}}" data-remote="false" data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-success pull-right">



    <i class="fa fa-plus"></i> დამატება



  </a>



    <div class="clearfix"></div>



  </div>



  <div class="x_content">



	 @if(count($admins))




<table class="table table-striped jambo_table bulk_action">



<thead>



<tr>

  <th width="40" class="text-center">ID</th>



  <th class="column-title">სახელი, გვარი</th>



  <th>ელ-ფოსტა</th>



  <th>რეგ.თარიღი</th>



  <th></th>



</tr>







</thead>



<tbody>



@foreach($admins as $user)
<tr>



  <td class="text-center">{{$user->id}}</td>



  <td>{{$user->name}}</td>



  <td>{{$user->email}}</td>



  <td>{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i')}} </td>



  <td align="right">



        <a href="{{url('admin/admins')}}/edit/{{$user->id}}" data-remote="false" data-toggle="modal" data-target="#modal" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> რედაქტირება</a>



        <a href="{{url('admin/admins')}}/delete/{{$user->id}}" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  წაშლა</a>



  </td>



</tr>

@endforeach







</tbody>



</table>





{{ $admins->links() }}



@else



<div class="alert alert-info">



  ადმინისტრატორები ვერ მოიძებნა



</div>



@endif

</div>

</div>

</div>

</div>

</div>

@endsection







@section('style')



<!-- Select2 -->



    <link href="{{asset('public/assets/admin')}}/vendors/select2/dist/css/select2.min.css" rel="stylesheet">



    <!-- Switchery -->



    <link href="{{asset('public/assets/admin')}}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">







    <link href="{{asset('public/assets/admin')}}/vendors/redactor/redactor1.css" rel="stylesheet">







@endsection



@section('script')







<!-- jQuery Tags Input -->



    <script src="{{asset('public/assets/admin')}}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>



 <!-- Switchery -->



    <script src="{{asset('public/assets/admin')}}/vendors/switchery/dist/switchery.min.js"></script>



    <!-- Select2 -->



    <script src="{{asset('public/assets/admin')}}/vendors/select2/dist/js/select2.full.min.js"></script>



    <!-- Parsley -->



    <script src="{{asset('public/assets/admin')}}/vendors/parsleyjs/dist/parsley.min.js"></script>



    <!-- Autosize -->



    <script src="{{asset('public/assets/admin')}}/vendors/autosize/dist/autosize.min.js"></script>



    <!-- jQuery autocomplete -->



    <script src="{{asset('public/assets/admin')}}/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>



    <!-- starrr -->



    <script src="{{asset('public/assets/admin')}}/vendors/starrr/dist/starrr.js"></script>



  	<!--



    <script src="{{asset('public/assets/admin')}}/vendors/ckeditor/ckeditor.js"></script>



 -->



  	<script src="{{asset('public/assets/admin')}}/vendors/redactor/redactor1.js"></script>







@endsection



@section('js')



<script>



$(document).ready(function() {



  $('.delete').click(function(e) {



    var target = $(this).attr('href');



    e.preventDefault();







    $.confirm({



        title: 'დასტური',



        content: 'დარწმუნებული ხართ, რომ გურთ ადმინისტრატორის სამუდამოდ წაშლა?',



        buttons: {



            confirm: {



                text: 'წაშლა',



                btnClass: 'btn-red',



                action: function(){



                  location.replace(target)



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
