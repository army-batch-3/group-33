<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class EmployeeDataTableEditor extends DataTablesEditor
{
    protected $model = Employee::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'photo' => 'required',
            'employee_type' => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            'first_name' => 'sometimes',
            'middle_name' => 'sometimes',
            'last_name' => 'sometimes',
            'photo' => 'sometimes',
            'employee_type' => 'sometimes',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }

    public function uploadRules() {
        return [
            'photo' => 'required|image',
        ];
    }
}
