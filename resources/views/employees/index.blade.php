@extends('layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Employees</div>
            
            <div class="card-body">
            <a class="btn btn-success btn-sm" href="{{ route('create-employees') }}">Create New</a>
            <br/>
                @if(session()->has('success'))
                    <br/>
                    <label class="alert alert-success w-100">{{session('success')}}</label>
                @elseif(session()->has('error'))
                    <label class="alert alert-danger w-100">{{session('error')}}</label>
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($employees as $employee)
                        <tr>
                            <td><img width="50" height="50" src="{{ asset('storage/'.$employee->photo) }}" class="img-thumbnail" alt="Image"></td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <a href="{{ route('edit-employees', ['id' => $employee->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('show-employees', ['id' => $employee->id]) }}" class="btn btn-info btn-sm">Show</a>
                                <form action="{{ route('delete-employees', ['id' => $employee->id]) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <div class="d-flex justify-content-between">
                    {{ $employees->render() }}
                </div>
                
            </div>
        </div>
    </div>    
</div>
@endsection