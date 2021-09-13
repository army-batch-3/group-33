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
            'photo' => 'required|sometimes',
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
            'photo' => 'required|sometimes',
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

    public function uploadRules()
    {
        return [
            'photo' => 'required|image',
        ];
    }

    public function created(Model $model, array $data)
    {
        $fix = $model->join('pa_suppliers', 'pa_suppliers.id', '=', "pa_assets.supplier_id")
            ->join("pa_warehouses", "pa_warehouses.id", "=", "pa_assets.warehouse_id")
            ->select(
                'pa_assets.id',
                'pa_assets.name',
                'pa_assets.photo',
                'pa_assets.number_of_stocks',
                'pa_assets.type',
                'pa_assets.supplier_id',
                "pa_assets.warehouse_id",
                'pa_assets.price',
                'pa_assets.created_at',
                'pa_assets.updated_at',
                'pa_suppliers.name AS supplierdb',
                'pa_warehouses.name as warehousedb'
            )
            ->get()->toBase();
        return $fix[count($fix) - 1];
    }
}
