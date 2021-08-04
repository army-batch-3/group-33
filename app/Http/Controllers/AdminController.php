<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\User;
use App\Models\Benefits;
use App\Models\Personal;
use App\Models\JobSalary;
use App\Traits\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    use PersonalInfo;
    public function manageUser(){
      //   dd(User::with('permissions')->get());
        return view('users.manage-emp');
     }
     public function storeBenefits(Request $request){
        $this->BenefitsStore($request->input('id'), $request->input('data'));
        return $request->input('data');
     }

   public function storeEmployment(Request $request){
        $this->EmploymentStore($request->input('id'), $request->input('data'));
        return $request->input('data');
    }

    public function storeReference(Request $request){
        $this->ReferenceStore($request->input('id'), $request->input('data'));
        return $request->input('data');
    }

    public function getPersonalAllInfo(Request $request){
        $data["Benefits"] = $this->BenefitsGet($request->input('id'));
        $data["Employment"] = $this->EmploymentGet($request->input('id'));
        $data["Reference"] = $this->ReferenceGet($request->input('id'));
        return $data;
    }

    public function getPersonalinfo()
   {
      $jobtitle =  Datatables::of(JobSalary::select('id AS value','title AS label'))->make()->original["data"];
      $select["job_title"] =$jobtitle;
      return Datatables::of($this->BasicInfoGet())
      ->with('options', $select)
      ->make();
   }

   public function storePersonalinfo(Request $request)
   {
      $data = $request->input('data');
      $action = $request->input('action');
      if($action == "edit"){
         $user_id = array_keys($data);
         $id;
         foreach($user_id as $user_key){
            $id = $user_key;
            foreach($data[$user_key] as $key => $value) {
               $this->UpdatePersonalinfo($user_key, $data[$user_key]);
            }
         }
         $table = Personal::join("pa_title", "pa_title.id","=","pa_personalinfo.job_title")
         ->select(['pa_personalinfo.id','pa_personalinfo.given_name','pa_personalinfo.middle_name','pa_personalinfo.last_name','pa_personalinfo.email','pa_personalinfo.contact',
         'pa_personalinfo.address','pa_personalinfo.company','pa_personalinfo.job_title','pa_personalinfo.country','pa_personalinfo.city','pa_personalinfo.active','pa_title.Title'])
         ->where("pa_personalinfo.id","=",$id);
      }else if($action == "create"){
         foreach($data as $item){
            unset($item["id"]);
            $id = DB::table('pa_personalinfo')->insertGetId($item);
            // dd($id);
            $table = Personal::join("pa_title", "pa_title.id","=","pa_personalinfo.job_title")
            ->select(['pa_personalinfo.id','pa_personalinfo.given_name','pa_personalinfo.middle_name','pa_personalinfo.last_name','pa_personalinfo.email','pa_personalinfo.contact',
            'pa_personalinfo.address','pa_personalinfo.company','pa_personalinfo.job_title','pa_personalinfo.country','pa_personalinfo.city','pa_personalinfo.active','pa_title.Title',
            'pa_personalinfo.date_created','pa_personalinfo.update_at'])
            ->where("pa_personalinfo.id","=",$id);

         }
      }else{
         $user_id = array_keys($data);
         Personal::whereIn('id',$user_id)->delete();
         $table["data"] = [];
      }
      return Datatables::of($table)->make();
   }

   public function infoUpdate(Request $request)
    {
      $data_id = Personal::query()->where("user_id","=",Auth::user()["id"])->get();
      $id=0;
      for($z=0; $z<count($data_id); $z++){
         $id = $data_id[$z]->id;
      }
      $data = $request->input('data');
      $re["data"] = $data["keyless"];
      $key = array_keys($data["keyless"]);

      if($key[0] == "sss" || $key[0] == "pagibig"|| $key[0] == "philhealth"|| $key[0] == "savings"|| $key[0] == "tin")
         DB::table('pa_benefits')->updateOrInsert(['user_id'=>$id],$data["keyless"]);
      else
         DB::table('pa_personalinfo')->updateOrInsert(['user_id'=>Auth::user()["id"]],$data["keyless"]);

      return Datatables::of($re)->make();

    }

    public function getAllPersonal(){
        $data["PersonalInfo"] = Personal::join("pa_title", "pa_title.id","=","pa_personalinfo.job_title")
           ->select(['pa_personalinfo.id','pa_personalinfo.given_name','pa_personalinfo.middle_name','pa_personalinfo.last_name','pa_personalinfo.email','pa_personalinfo.contact',
           'pa_personalinfo.address','pa_personalinfo.company','pa_personalinfo.job_title','pa_personalinfo.country','pa_personalinfo.city','pa_personalinfo.active','pa_title.Title'])
           ->where("pa_personalinfo.user_id","=",Auth::user()["id"])->get();
           // dd($data["PersonalInfo"]);
        $emp_id=0;
        for($z=0; $z<count($data["PersonalInfo"]); $z++){
           $emp_id = $data["PersonalInfo"][$z]->id;
           $data["Benefit"] = Benefits::query()->where("user_id","=",$emp_id)->get();
        }
        return $data;
      }
}
