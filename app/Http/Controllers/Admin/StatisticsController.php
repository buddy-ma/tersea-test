<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function Dashboard()
    {
        return view('admin.mains-admin.statistics.dashboard');
    }
}
