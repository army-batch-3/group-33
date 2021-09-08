<?php

namespace App\DataTables;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

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
            'created_at' => 'required|sometimes',
            'updated_at' => 'required|sometimes',
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
            'name' => 'required',            
            'floor' => 'required',
            'building' => 'required',
            'room' => 'required',
            'address' => 'required',
            'section' => 'required',
            'contact_number' => 'required',
            'created_at' => 'required|sometimes',
            'updated_at' => 'required|sometimes',
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
