@extends('layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Employees Detail</div>
            
            <div class="card-body">

               
                <div class="form-group mb-3">
                    <label>Name : {{ $employee->name }}</label>
                </div>

                <div class="form-group mb-3">
                    <label>Photo : </label>
                    <img width="200" height="200" src="{{ asset('storage/'.$employee->photo) }}" class="img-thumbnail" alt="Image"> 
                </div>

                <div class="form-group mb-3">
                    <label>Department : {{ $employee->department->name }}</label>
                </div>

                <div class="form-group mb-3">
                    <label>DOB : {{ $employee->dob }}</label>
                </div>

                <div class="form-group mb-3">
                    <label>Phone : {{ $employee->phone }}</label>
                </div>

                <div class="form-group mb-3">
                    <label>Email : {{ $employee->email }}</label>
                </div>

                <div class="form-group mb-3">
                    <label>Salary : {{ $employee->salary }}</label>
                </div>

                
            </div>
        </div>
    </div>    
</div>
@endsection