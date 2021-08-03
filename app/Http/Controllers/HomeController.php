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


        return view("dashboard.list");
    }
}
