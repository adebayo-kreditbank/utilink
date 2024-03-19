<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CustomerController extends Controller
{
    /**
     * Retrieve statistics from cache or DB if not cached
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        // Retrieve statistics from cache or calculate if not cached
        $sales = Cache::remember('customer_sales_statistics', now()->addHours(24), function () {
            return Sale::retrieveDailyCustomersSalesStatistics();
        });

        return view('customer.index', compact('sales'));
    }
}
