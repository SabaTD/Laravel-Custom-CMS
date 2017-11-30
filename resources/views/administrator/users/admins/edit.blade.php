<form action="admins/store/{{$admin->id}}" class="form" method="post" accept-charset="utf-8">

{{ csrf_field() }}

  <div class="form-group">

     <input type="text" class="form-control" value="{{$admin->name}}" name="name" placeholder="სახელი">

  </div>

  <div class="form-group">

     <input type="email" class="form-control" value="{{$admin->email}}" name="email" placeholder="ელ-ფოსტა">

    </div>

  <div class="form-group">

     <input type="password" class="form-control pass" name="password" placeholder="ახალი პაროლი">

  </div>

  <div class="form-group">

    <button type="submit" id="submit" class="btn btn-success">განახლება</button>

  </div>

</form>
