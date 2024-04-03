@extends('layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Department wise highest salary of employees</div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Highest Salary</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($highest_salarys as $highest_salary)
                        <tr>
                            <td>{{ $highest_salary->name }}</td>
                            <td>{{ $highest_salary->department_name }}</td>
                            <td>{{ $highest_salary->salary }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>             
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-header">Salary range wise employee count</div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Range</th>
                        <th>Employee Count</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($salary_range as $salary)
                        <tr>
                            <td>{{ $salary->salary_range }}</td>
                            <td>{{ $salary->total_employees }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>             
            </div>
        </div>

        <br/>

        <div class="card">
            <div class="card-header">Youngest employee of each department</div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Age</th>
                        <th>Name</th>
                        <th>Department</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($youngest_employees as $youngest_employee)
                        <tr>
                            <td>{{ $youngest_employee->age }}</td>
                            <td>{{ $youngest_employee->name }}</td>
                            <td>{{ $youngest_employee->department_name }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>             
            </div>
        </div>
        <br/>
    </div>    
</div>
@endsection