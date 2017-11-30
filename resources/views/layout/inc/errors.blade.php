@if (count($errors) > 0)
<div class="container" style="margin-top: 40px;">
<div class="row">
 <div class="col-md-12">
<div class="alert alert-danger alert-dismissible fade in" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
</div>
</div>
@endif