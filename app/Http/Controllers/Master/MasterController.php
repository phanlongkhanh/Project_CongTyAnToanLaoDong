<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MasterController extends Controller
{
    public function index(){
        $users = Auth::user();
        return view('Layout.master',compact('users'));
    }
}
