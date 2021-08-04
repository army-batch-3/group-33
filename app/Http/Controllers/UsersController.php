<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.getUsers');
    }

    public function store(UsersDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
