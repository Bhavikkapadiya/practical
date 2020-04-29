@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">Add Company</h1>
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
      <form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" placeholder="Name" name="name" required/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" placeholder="Email" name="email"/>
          </div>
          <div class="form-group">
              <label for="email">Website:</label>
              <input type="text" class="form-control" placeholder="Website" name="website"/>
          </div>
          <div class="form-group">
              <label for="city">Logo (min 100x100):</label>
              <input type="file" id="logo" name="logo"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Add Company</button>
      </form>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var _URL = window.URL || window.webkitURL;
	$('#logo').change( function(e) {
        
		var file, img;
		if ((file = this.files[0])) {
			img = new Image();
			img.onload = function() {
				if(this.width < 100 || this.height < 100){
				  $("#logo").val(null);
				  alert("Logo size must be min 100*100");
				}
			};
			img.onerror = function() {
                
			};
            img.src = _URL.createObjectURL(file);
		}
	});
});
</script>
@endsection