@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-5">Employee List</h1>    
    <div>
    <a style="margin: 19px;" href="{{ route('employee.create')}}" class="btn btn-primary">New Employee</a>
    </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>          
          <td>Email</td>
          <td>Phone</td>         
          <td>Company</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php $i=0;?>
        @foreach($employee as $emp)
        <?php $i++;?>
        <tr>
            <td>{{$i}}</td>
            <td>{{$emp->fname}}</td>
            <td>{{$emp->lname}}</td>            
            <td>{{$emp->email}}</td>
            <td>{{$emp->phone}}</td>
            <td>{{$emp->company->name}}</td>
            <td>
                <a href="{{route('employee.edit',$emp->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{route('employee.destroy', $emp->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick=" return confirm('Are you sure?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $employee->links() }}
<div>
</div>
@endsection