<?php

namespace App\DataTables;

use App\Models\Transportation;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTablesEditor;

class TransportationDataTableEditor extends DataTablesEditor
{
    protected $model = Transportation::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'type' => 'required',
            'plate_number' => 'required',
            'is_available' => 'required'
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
            'type' => 'required|sometimes',
            'plate_number' => 'required|sometimes',
            'is_available' => 'required|sometimes'
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
