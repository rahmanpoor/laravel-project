<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(){
        $users = User::where('user_type', 0)->get();
        return view('admin.index', compact('users'));
    }
}
