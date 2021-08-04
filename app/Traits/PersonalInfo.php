<?php

namespace App\Traits;

use DB;


trait PersonalInfo
{
    public function BenefitsStore($id, $data)
    {
        DB::table('pa_benefits')->updateOrInsert(['user_id' => $id], $data);
    }
    public function EmploymentStore($id, $data)
    {
        for ($x = 0; $x < count($data); $x++) {
            DB::table('pa_employment')->updateOrInsert(['user_id' => $id, 'position' => $data[$x]["position"], 'company' => $data[$x]["company"], 'date_from' => $data[$x]["date_from"]], $data[$x]);
        }
    }
    public function ReferenceStore($id, $data)
    {
        for ($x = 0; $x < count($data); $x++) {
            DB::table('pa_reference')->updateOrInsert(['user_id' => $id, 'name' => $data[$x]["name"], 'company' => $data[$x]["company"]], $data[$x]);
        }
    }

    public function BenefitsGet($id)
    {
        $data = DB::select("SELECT * FROM pa_benefits WHERE user_id = ?", [$id]);
        return $data;
    }

    public function EmploymentGet($id)
    {
        $data = DB::select("SELECT * FROM pa_employment WHERE user_id = ?", [$id]);
        return $data;
    }

    public function ReferenceGet($id)
    {
        $data = DB::select("SELECT * FROM pa_reference WHERE user_id = ?", [$id]);
        return $data;
    }
    public function UpdatePersonalinfo($user_id, $data)
    {
        DB::table('pa_personalinfo')->updateOrInsert(['id' => $user_id], $data);
    }

    public function BasicInfoGet()
    {
        $data = DB::select("SELECT pi.*, t.Title FROM pa_personalinfo pi, pa_title t where t.id=pi.job_title");
        return $data;
    }
}
