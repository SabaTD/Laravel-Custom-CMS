@extends('administrator.inc.layout')
@section('title', 'სერვისები')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>სერვისები</h3>
	</div>
</div>

@include('administrator.inc.message')

<div class="row">
	<div class="col-md-12">
		<div class="x_panel">

			<div class="x_title">
				<h2>პარტნიორები</h2>
				<a href="{{url('admin/service/create?model=Service')}}" class="btn btn-sm btn-success pull-right">
					<i class="fa fa-plus"></i> დამატება
				</a>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">

				@if($items->first())

					<table class="table table-striped jambo_table bulk_action">

						<thead>
							<tr class="headings">
								<th class="text-center column-title" width="70px">ID</th>
								<th class="text-center column-title" width="90px">სტატუსი</th>
								<th class="column-title" >სახელი</th>
								<th class="column-title"></th>
							</tr>
						</thead>

						<tbody>
							@foreach($items as $item)
								<tr>
									<td class="text-center">
										{{$item->id}}
									</td>

									<td class="text-center">
										<input type="checkbox" value="publish" id="{{$item->id}}" class="js-switch publish" @if($item->publish) checked  @endif />
									</td>

									<td class="text-left">
										<a href="{{url('admin/service/edit/'.$item->id.'?model=Service')}}" title="რედაქტირება">
											@php
												$names = $item->serviceDetail()->where('lang', 'ge')->first();
												echo $names->title;
											@endphp
										</a>
									</td>

									<td align="right">
										<a href="{{url('admin/service/edit/'.$item->id.'?model=Service')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> </a>
										<a href="{{url('admin/service/delete/'.$item->id.'?model=Service')}}" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  </a>
									</td>

								</tr>
							@endforeach
						</tbody>
					</table>

				@else
					<div class="alert alert-info">
						სერვისი ვერ მოიძებნა
					</div>
				@endif
			</div>

		</div>
	</div>
</div>



@endsection


@section('js')

	<script type="text/javascript">

        $(document).ready(function() {



            $('.delete').click(function(e) {

                var target = $(this).attr('href');

                e.preventDefault();



                $.confirm({

                    title: 'დასტური',

                    content: 'დარწმუნებული ხართ, რომ გურთ ატრიბუტის სამუდამოდ წაშლა?',

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





            $('.publish').change(function(event) {

                var id = $(this).attr('id');

                var publish = ($(this).is(':checked')) ? 1 : 0;

                $.ajax({

                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },

                    url: '{{url("admin/service/publish?model=Service")}}',

                    type: "POST",

                    data: { id: id, publish: publish, _token: '{{ csrf_token() }}' },

                    success: function (response) {
                        console.log('success');
                    },

                    error: function() {
                        console.log('error');
                    }

                });

            });





        });

	</script>

@endsection

@section('css')

	<style type="text/css">

		.post { width: 30px; height: 30px; vertical-align: middle; margin-right: 10px;}

		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{ vertical-align: middle;}

		.table>thead .iCheck-helper{background: #101010 !important;}

	</style>

@endsection
