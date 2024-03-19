<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SalesAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SalesAgentController extends Controller
{
    /**
     * Retrieve statistics from cache or DB if not cached
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        // Retrieve statistics from cache or DB if not cached
        $sales = Cache::remember('agents_sales_statistics', now()->addHours(24), function () {
            return Sale::retrieveDailyAgentsSalesStatistics();
        });

        return view('sales-agent.index', compact('sales'));
    }
}
