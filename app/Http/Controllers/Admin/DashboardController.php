<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use Charts;


class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $users = Auth::check() ? Auth::user()->name : null;
        $data = Visitor::selectRaw('DATE(visited_at) as date, COUNT(DISTINCT ip_address) as unique_visits')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $dates = $data->pluck('date');
        $uniqueVisits = $data->pluck('unique_visits');

        return view('Admin.dashboard.index', compact('users','dates','uniqueVisits'));
    }
}
