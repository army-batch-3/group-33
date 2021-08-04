<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class HomeController extends Controller
{
    public function profile_view()
    {
        return view("users.profile");
    }
    public function dashboard_lists()
    {

        app(PermissionRegistrar::class)->registerPermissions();
        $data = DB::select('select * from pa_personalinfo where user_id = :user', [Auth::user()["id"]]);
        if ($data == null) {
            Session::put('first_reg', 'None');
            return redirect('update-info');
        } else {
            Session::put('first_reg', 'updated');
        }

        return view("dashboard.list");
    }
    public function update_info()
    {
        return view('auth.first-register');
    }
    public function updateInfo(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        $data["email"] = Auth::user()->email;
        $data["company"] = "";
        $data["job_title"] = 1;
        $response = '';
        try {
            DB::table('pa_personalinfo')
                ->updateOrInsert(
                    ["user_id" => $request->input('user_id')],
                    $data

                );
            $response = "Success!";
        } catch (Exception $ex) {
            $response = $ex->getMessage();
        }

        return response()->json(($response), 200);
    }
}
