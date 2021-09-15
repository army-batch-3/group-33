<?php

namespace App\DataTables;

use DB;
use App\User;
use App\Models\Assets;
use App\Models\Restock;
use App\Models\Requisition;
use App\Models\Transportation;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class RequisitionDataTableEditor extends DataTablesEditor
{
    protected $model = Requisition::class;

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

    public function updating(Model $model, array $data)
    {
        $untochTransId = Restock::select('transportation_id')->where("id",$data["id"])->get();
        $status = Transportation::where('id',$untochTransId[0]->transportation_id)->get();
        $data["transportation_id"] = $untochTransId[0]->transportation_id;
        $asset = Assets::find($data['assets_id']);

        if ($data['status'] == "Approved") {
            $status[0]->is_available = 0;
            $status[0]->save();
        } else if ($data['status'] == "Closed") {
            $status[0]->is_available = 1;
            $status[0]->save();
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
            ->join("pa_employees", "pa_employees.id", "=", "pa_requisition.employee_id")
            ->join("pa_transportations", "pa_transportations.id", "=", "pa_requisition.transportation_id")
            ->join("pa_assets", "pa_assets.id", "=", "pa_requisition.assets_id")
            ->select(
                'pa_requisition.id',
                'pa_requisition.quantity',
                'pa_requisition.created_at',
                'pa_requisition.updated_at',
                'pa_requisition.status',
                'pa_requisition.employee_id',
                'pa_requisition.transportation_id',
                'pa_requisition.assets_id',
                DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name) AS employee_name"),
                'pa_assets.name as assetsdb',
                'pa_transportations.type AS transportationdb'
            )
            ->get()->toBase();
        // dd($fix);
        return $fix[count($fix) - 1];
    }
}
