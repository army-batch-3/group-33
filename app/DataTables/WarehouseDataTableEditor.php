<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Warehouse;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class WarehouseDataTableEditor extends DataTablesEditor
{
    protected $model = Warehouse::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required',
            'floor' => 'required',
            'building' => 'required',
            'room' => 'required',
            'address' => 'required',
            'section' => 'required',
            'contact_number' => 'required',
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
            'name' => 'required|sometimes',
            'floor' => 'required|sometimes',
            'building' => 'required|sometimes',
            'room' => 'required|sometimes',
            'address' => 'required|sometimes',
            'section' => 'required|sometimes',
            'contact_number' => 'required|sometimes',
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
