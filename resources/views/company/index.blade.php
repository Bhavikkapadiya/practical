@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-5">Company List</h1>    
    <div>
    <a style="margin: 19px;" href="{{ route('company.create')}}" class="btn btn-primary">New Company</a>
    <a style="margin: 19px;" href="{{ route('employee.index')}}" class="btn btn-primary">New Employee</a>
    </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Website</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php $i=0;?>
        @foreach($company as $comp)
        <?php $i++;?>
        <tr>
            <td>{{$i}}</td>
            <td>{{$comp->name}}</td>
            <td>{{$comp->email}}</td>
            <td>{{$comp->website}}</td>
            <td>
                <a href="{{route('company.edit',$comp->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{route('company.destroy', $comp->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick=" return confirm('Are you sure?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $company->links() }}
<div>
</div>
@endsection