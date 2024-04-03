<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function __construct()
    {
    }

    function index()
    { 
        $highest_salarys = DB::select("SELECT department_id, employees.name, salary,departments.name as department_name  FROM employees INNER JOIN departments ON departments.id = employees.department_id  WHERE (department_id,salary) IN (SELECT department_id, MAX(salary) FROM employees GROUP BY department_id)");

        $salary_range = DB::select("SELECT '0-50000' as salary_range,count(*)  As total_employees  FROM employees WHERE `salary` BETWEEN 0 AND 50000
        UNION
        SELECT '50001-100000' as salary_range,count(*)  As total_employees  FROM employees WHERE `salary` BETWEEN 50001 AND 100000
        UNION
        SELECT '100000+' as salary_range,count(*)  As total_employees  FROM employees WHERE `salary` > 100000");

        $youngest_employees = DB::select("SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), `dob`)), '%Y') + 0 AS age,department_id, employees.name, salary,departments.name as department_name FROM employees INNER JOIN departments ON departments.id = employees.department_id WHERE (department_id,dob) IN (SELECT department_id, MAX(dob) FROM employees GROUP BY department_id)");

        return view('statistics.index',compact('highest_salarys','salary_range','youngest_employees'));
    }
}
