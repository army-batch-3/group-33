<?php

namespace App\DataTables;

use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class SupplierDataTableEditor extends DataTablesEditor
{
    protected $model = Suppliers::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'contact_person' => 'required',
            'address' => 'required',
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
            'name' => 'required|sometimes',
            'email' => 'required|sometimes',
            'contact_number' => 'required|sometimes',
            'contact_person' => 'required|sometimes',
            'address' => 'required|sometimes',
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
