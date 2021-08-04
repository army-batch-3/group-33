<?php

namespace App\DataTables;


use App\Models\Roles;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class rolesDataTableEditor extends DataTablesEditor
{
    protected $model = Roles::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name'  => 'required|unique:' . $this->resolveModel()->getTable(),
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
            'id' => 'required',
            'name'  => 'required|unique:' . $this->resolveModel()->getTable(),
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
