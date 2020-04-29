@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">Edit Company</h1>
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
      <form method="POST" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" placeholder="Name" name="name" value="{{$company->name}}" required/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" placeholder="Email" value="{{$company->email}}" name="email"/>
          </div>
          <div class="form-group">
              <label for="email">Website:</label>
              <input type="text" class="form-control" placeholder="Website" value="{{$company->website}}" name="website"/>
          </div>
          <div class="form-group">
              <label for="city">Logo:</label>
              <input type="file" name="logo"/>
              <img src="{{asset('storage/company/'.$company->logo )}}" height="100px" width="100px">
              
          </div>
          <button type="submit" class="btn btn-primary-outline">Update</button>
      </form>
  </div>
</div>
</div>
@endsection