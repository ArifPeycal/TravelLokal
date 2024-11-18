<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function customer()
    {
        $users = User::paginate();

        return view('userprofile.index', compact('users'));
    }
}