<?php

namespace App\DataTables;


use App\Models\Assets;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class AssetsDataTableEditor extends DataTablesEditor
{
    protected $model = Assets::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required|sometimes',
            'number_of_stocks' => 'required|sometimes',
            'type' => 'required|sometimes',
            'price' => 'required|sometimes',
            'supplier_id' => 'required|sometimes',
            'warehouse_id' => 'required|sometimes',
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
            'number_of_stocks' => 'required|sometimes',
            'type' => 'required|sometimes',
            'price' => 'required|sometimes',
            'supplier_id' => 'required|sometimes',
            'warehouse_id' => 'required|sometimes',
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
            'avatar' => 'required|image',
            'resume' => 'required|mimes:png',
        ];
    }
}
