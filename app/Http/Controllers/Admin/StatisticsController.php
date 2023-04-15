<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\History;

class StatisticsController extends Controller
{
    public function Dashboard()
    {
        return view('admin.mains-admin.statistics.dashboard');
    }

    public function historique()
    {
        $historique = History::get();
        return view('admin.mains-admin.statistics.history', ['historique' => $historique]);
    }
}
