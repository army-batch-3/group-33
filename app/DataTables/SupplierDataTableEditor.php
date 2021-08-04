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
            'email' => 'required',
            'contact_number' => 'required',
            'contact_person' => 'required',
            'address' => 'required',
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
