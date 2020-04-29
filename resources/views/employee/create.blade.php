@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">Add Employee</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" name="fname" required/>
          </div>
          <div class="form-group">
              <label for="name">Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" name="lname" required/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" placeholder="Email" name="email"/>
          </div>
          <div class="form-group">
              <label for="email">Phone:</label>
              <input type="number" class="form-control" placeholder="Phone" name="phone"/>
          </div>
          <div class="form-group">
              <label for="email">Company:</label>
              <select name="company" id="company" class="form-control">
                <option value="">select company</option>
                <?php 
                  foreach($company as $key){?>
                    <option value="<?=$key['id']?>"><?=$key['name']?></option>
                  <?php }
                ?>
              </select>
          </div>

          <button type="submit" class="btn btn-primary-outline">Add Employee</button>
      </form>
  </div>
</div>
</div>
@endsection