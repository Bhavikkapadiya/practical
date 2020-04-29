@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">Edit Employee</h1>
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
      <form method="post" action="{{ route('employee.update',$employee->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">    
              <label for="name">First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" value="{{$employee->fname}}" name="fname" required/>
          </div>
          <div class="form-group">
              <label for="name">Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" value="{{$employee->lname}}" name="lname" required/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" placeholder="Email" value="{{$employee->email}}" name="email"/>
          </div>
          <div class="form-group">
              <label for="email">Phone:</label>
              <input type="number" class="form-control" placeholder="Phone" value="{{$employee->phone}}" name="phone"/>
          </div>
          <div class="form-group">
              <label for="email">Company:</label>
              <select name="company" id="company" class="form-control">
                <option value="">select company</option>
                <?php 
                  foreach($company as $key){?>
                    <option value="<?=$key['id']?>" <?php if($key['id'] == $employee->company_id){echo "selected";}?>><?=$key['name']?></option>
                  <?php }
                ?>
              </select>
          </div>

          <button type="submit" class="btn btn-primary-outline">Update</button>
      </form>
  </div>
</div>
</div>
@endsection