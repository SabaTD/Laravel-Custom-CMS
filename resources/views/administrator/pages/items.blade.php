@extends('administrator.inc.layout')

@section('title', 'გვერდები')



@section('content')

@include('administrator.inc.message')

<div class="page-title">

<div class="title_left">

<h3>გვერდები</h3>

</div>

</div>

<div class="row">

<div class="col-md-12">

<div class="x_panel">

<div class="x_title">

<h4>ყველა გვერდი</h4>

<div class="clearfix"></div>

</div>

<div class="x_content">

<table class="table table-striped jambo_table bulk_action">

<thead>

<tr>

<th class="column-title text-center" width="40">ID</th>

<th class="column-title">სათაური</th>

<th></th>

</tr>



</thead>

<tbody>

<tr>

<td class="text-center">1</td>

<td><a href="{{url('admin/pages/edit/about')}}">ჩვენ შესახებ</a></td>

<td align="right">

<a href="{{url('admin/pages/edit/about')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> რედაქტირება</a>

</td>

</tr>




<tr>

<td class="text-center">2</td>

<td><a href="{{url('admin/pages/edit/contact')}}">კონტაქტი</a></td>

<td align="right">

<a href="{{url('admin/pages/edit/contact')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> რედაქტირება</a>

</td>

</tr>


</tbody>

</table>


</div>

</div>

</div>

</div>

</div>

</div>
</div>
</div>

@endsection



@section('style')

<!-- Select2 -->

<link href="{{asset('assets/admin')}}/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

<!-- Switchery -->

<link href="{{asset('assets/admin')}}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

<link href="{{asset('assets/admin')}}/vendors/redactor/redactor1.css" rel="stylesheet">

@endsection

@section('script')

<!-- jQuery Tags Input -->

<script src="{{asset('assets/admin')}}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>

<!-- Switchery -->

<script src="{{asset('assets/admin')}}/vendors/switchery/dist/switchery.min.js"></script>

<!-- Select2 -->

<script src="{{asset('assets/admin')}}/vendors/select2/dist/js/select2.full.min.js"></script>

<!-- Parsley -->

<script src="{{asset('assets/admin')}}/vendors/parsleyjs/dist/parsley.min.js"></script>

<!-- Autosize -->

<script src="{{asset('assets/admin')}}/vendors/autosize/dist/autosize.min.js"></script>

<!-- jQuery autocomplete -->

<script src="{{asset('assets/admin')}}/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

<!-- starrr -->

<script src="{{asset('assets/admin')}}/vendors/starrr/dist/starrr.js"></script>


<script src="{{asset('assets/admin')}}/vendors/redactor/redactor1.js"></script>

@endsection
