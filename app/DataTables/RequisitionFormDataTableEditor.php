<?php

namespace App\DataTables;

use App\User;
use App\Models\Requisitionform;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class RequisitionFormDataTableEditor extends DataTablesEditor
{
    protected $model = Requisitionform::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'transportation_id' => 'required',
            'employee_id' => 'required',
            'assets_id' => 'required',
            'quantity' => 'required',
            'status' => 'required',
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
            'transportation_id' => 'sometimes',
            'employee_id' => 'sometimes',
            'assets_id' => 'sometimes',
            'quantity' => 'sometimes',
            'status' => 'sometimes',
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
}
