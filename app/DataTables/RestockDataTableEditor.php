<?php

namespace App\DataTables;

use Datatables;
use App\Models\Assets;
use App\Models\Restock;
use App\Models\Transportation;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class RestockDataTableEditor extends DataTablesEditor
{
    protected $model = Restock::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            "supplier_id" => "required",
            "warehouse_id" => "required",
            "transportation_id" => "required",
            "assets_id" => "required",
            "quantity" => "required",
            "status" => "required",
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
            "quantity" => "sometimes",
            "supplier_id" => "sometimes",
            "warehouse_id" => "sometimes",
            "transportation_id" => "sometimes",
            "status" => "sometimes",
            "assets_id" => "sometimes",
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

    public function updating(Model $model, array $data)
    {
        $status = Transportation::find($data['transportation_id']);
        $asset = Assets::find($data['assets_id']);
        if ($data['status'] == "Approved") {
            $status->is_available = 0;
            $status->save();
        } else if ($data['status'] == "Closed") {
            $status->is_available = 1;
            $status->save();
        } else if ($data['status'] == "Received") {
            // add asset quantity
            $asset->number_of_stocks +=  (int)$data['quantity'];
            $asset->save();
        }
        return $data;
    }


    public function created(Model $model, array $data)
    {
        $fix = $model
            ->join("pa_suppliers", "pa_suppliers.id", "=", "pa_restock.supplier_id")
            ->join("pa_warehouses", "pa_warehouses.id", "=", "pa_restock.warehouse_id")
            ->join("pa_transportations", "pa_transportations.id", "=", "pa_restock.transportation_id")
            ->join("pa_assets", "pa_assets.id", "=", "pa_restock.assets_id")
            ->select(
                'pa_restock.id',
                'pa_restock.quantity',
                'pa_restock.created_at',
                'pa_restock.updated_at',
                'pa_restock.status',
                'pa_restock.supplier_id',
                'pa_restock.warehouse_id',
                'pa_restock.transportation_id',
                'pa_restock.assets_id',
                'pa_suppliers.name as supplierdb',
                'pa_warehouses.name as warehousedb',
                'pa_assets.name as assetsdb',
                'pa_assets.number_of_stocks',
                'pa_transportations.type AS transportationdb'
            )
            ->get()->toBase();
        return $fix[count($fix) - 1];
    }
}
