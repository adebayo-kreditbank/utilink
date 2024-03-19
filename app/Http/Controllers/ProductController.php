<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Retrieve statistics from cache or DB if not cached
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $sales = Cache::remember('product_sales_statistics', now()->addHours(24), function () {
            return Sale::retrieveDailyProductSalesStatistics();
        });

        return view('product.index', compact('sales'));
    }
}
