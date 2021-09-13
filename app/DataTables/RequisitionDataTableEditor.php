<?php

namespace App\DataTables;

use App\Models\Assets;
use App\User;
use Illuminate\Validation\Rule;
use App\Models\RequisitionItems;
use App\Models\Transportation;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class RequisitionDataTableEditor extends DataTablesEditor
{
    protected $model = RequisitionItems::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            "quantity" => "required",
            "supplier_id" => "required",
            "warehouse_id" => "required",
            "transportations_id" => "required",
            "assets_id" => "required",
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
            "transportations_id" => "sometimes",
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

    public function updating(Model $model, array $data) {
        // dd($data);
        $status = Transportation::find($data['transportations_id']);
        $asset = Assets::find($data['assets_id']);
        if ($data['status'] == "Approved") {
            $status->is_available = 0;
            $status->save();
        } else if($data['status'] == "Closed"){
            $status->is_available = 1;
            $status->save();
        }else if($data['status'] == "Received"){
           // add asset quantity
           $asset->number_of_stocks +=  (int)$data['quantity'];
           $asset->save();
        }
        return $data;
    }
}
