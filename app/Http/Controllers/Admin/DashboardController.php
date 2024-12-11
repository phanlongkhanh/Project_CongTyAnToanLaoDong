<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){
        $users = Auth::check() ? Auth::user()->name : null;
        return view('Admin.dashboard.index',compact('users'));
    }
}
