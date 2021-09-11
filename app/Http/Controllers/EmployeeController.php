<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTableEditor;


class EmployeeController extends Controller
{
    protected $employee;
    public function __construct(Employee $data)
    {
        $this->employee = $data;
    }

    public function index()
    {
        return view('employee');
    }

    public function getEmployee()
    {
        return Datatables::of($this->employee->all())
        ->make(true);
    }

    public function storeEmployee(EmployeeDataTableEditor $employeeData)
    {
        return $employeeData->process(request());
    }
}
