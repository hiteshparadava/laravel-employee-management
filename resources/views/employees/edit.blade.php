@extends('layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Update Employees</div>
            
            <div class="card-body">

               
                @if(session()->has('success'))
                    <label class="alert alert-success w-100">{{session('success')}}</label>
                @elseif(session()->has('error'))
                    <label class="alert alert-danger w-100">{{session('error')}}</label>
                @endif
                <form action="{{ route('update-employees', ['id' => $employee->id]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" required class="form-control" placeholder="name" value="{{ $employee->name }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label>Photo</label>
                        <input class="form-control" type="file" id="photo" name="photo" accept=".jpeg,.jpg,.png" />
                        @if ($errors->has('photo'))
                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <img width="200" height="200" src="{{ asset('storage/'.$employee->photo) }}" class="img-thumbnail" alt="Image"> 
                    </div>
                    
                    <div class="form-group mb-3">
                        <label>Department</label>
                        <select name="department_id" required class="form-control">
                            @foreach ($departments as $department)
                                <option {{ ($employee->department_id==$department->id)?'selected':'' }}  value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department_id'))
                            <span class="text-danger">{{ $errors->first('department_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label>DOB</label>
                        <input type="date" name="dob" value="{{ $employee->dob }}" class="form-control" placeholder="">
                        @if ($errors->has('dob'))
                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label>Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="Phone no" value="{{ $employee->phone }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $employee->email }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label>Salary</label>
                        <input type="number" name="salary" class="form-control" placeholder="Salary" value="{{ $employee->salary }}">
                        @if ($errors->has('salary'))
                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                        @endif
                    </div>
                    
                    <br/>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>
    </div>    
</div>
@endsection