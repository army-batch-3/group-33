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
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\DataTables\rolesDataTableEditor;



class AdminController extends Controller
{
    use PersonalInfo;
    public function transportations(){
      //   dd(User::with('permissions')->get());
        return view('layouts.transportations');
     }

    public function manageUser(){
      //   dd(User::with('permissions')->get());
        return view('users.manage-emp');
     }

     public function permission_role()
     {
       return view('admin.permission-role');
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

      public function getPermission(Request $request)
      {
        $permission = DB::select("select id, name from permissions");
        $role = DB::select("select permission_id, role_id from role_has_permissions where role_id=?",[$request->input('id')]);
        if( $permission !=null){
           for($z=0; $z<count($permission); $z++){
              for($x=0; $x<count($role); $x++){
                 if($permission[$z]->id == $role[$x]->permission_id){
                    $convert = json_decode(json_encode($permission[$z]),true);
                    $convert += array("permission"=>"checked");
                    $permission[$z] = (object)$convert;
                    break;
                 }
              }
              $convert = json_decode(json_encode($permission[$z]),true);
              $convert += array("permission"=>"");
              $permission[$z] = (object)$convert;
           }
        }

        return $permission;
      }

      public function getRolesAvailable(Request $request)
      {
        $roles_available = DB::select("select id, name from roles");
        $role_has_permit = DB::select("select role_id, model_type from model_has_roles where model_id=?",[$request->input('id')]);
        if( $roles_available !=null){
           for($z=0; $z<count($roles_available); $z++){
              for($x=0; $x<count($role_has_permit); $x++){
                 if($roles_available[$z]->id == $role_has_permit[$x]->role_id){
                    $convert = json_decode(json_encode($roles_available[$z]),true);
                    $convert += array("roles_available"=>"checked");
                    $roles_available[$z] = (object)$convert;
                    break;
                 }
              }
              $convert = json_decode(json_encode($roles_available[$z]),true);
              $convert += array("roles_available"=>"");
              $roles_available[$z] = (object)$convert;
           }
        }
           return $roles_available;
      }
      public function storeRoleSelect(Request $request){
        //Dont delete all records to insert new permission... Since we want to preserve the created_at/updated_at column
        $role_name = $request->input('role_name');
        $role_id = $request->input('role_id');
        $role_unset = $request->input('role_unset');
        $users = User::find($role_id);

        $users->assignRole($role_name);
        if( $role_unset != null){//prevent revocation off all role for role
            for($z=0; $z<count($role_unset); $z++){
                 $users->removeRole($role_unset[$z]);
            }
         }
        $result['Store']=$role_name;
        $result['Remove']=$role_unset;



        return $result;
    }
    public function storePermission(Request $request)
    {
       //Dont delete all records to insert new permission... Since we want to preserve the created_at/updated_at column
       $permission_name = $request->input('permission_name');
       $role_id = $request->input('role_id');
       $permission_unset = $request->input('permission_unset');

      $role = Role::find($role_id);
      $role->givePermissionTo($permission_name);
      if( $permission_unset != null)//prevent revocation off all permission for role
         $role->revokePermissionTo($permission_unset);
      $result['Store']=$permission_name;
      $result['Remove']=$permission_unset;

      return $result;
    }
    public function storeRole(rolesDataTableEditor $role_store)
    {
      return $role_store->process(request());
    }

    public function getRoles()
    {
        $emp = DB::select("select id, name, created_at, updated_at from roles");
        return Datatables::of($emp)->make(true);
    }

    public function getLogin()
    {
        return Datatables::eloquent(User::query())->make(true);
    }

}
