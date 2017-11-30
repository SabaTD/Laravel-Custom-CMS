<form action="admins/create" class="form" method="post" accept-charset="utf-8">



{{ csrf_field() }}



  <div class="form-group">



     <input type="text" class="form-control" value="" name="name" placeholder="სახელი">



  </div>



  <div class="form-group">



     <input type="email" class="form-control" value="" name="email" placeholder="ელ-ფოსტა">



    </div>



  <div class="form-group">



     <input type="password" class="form-control pass" name="password" placeholder="პაროლი">



  </div>



  <div class="form-group">



    <button type="submit" id="submit" class="btn btn-success">დამატება</button>



  </div>



</form>
