<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price',
        'sales_agent_id',
        'datetime'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function salesAgent()
    {
        return $this->belongsTo(SalesAgent::class);
    }

    /**
     * Retrieve daily sales statistics for all products from DB
     */
    public static function retrieveDailyProductSalesStatistics()
    {
        return self::with('product')
            ->selectRaw('DATE(datetime) as date, product_id, COUNT(*) as sales_count, SUM(price) as total_price')
            ->groupBy('date', 'product_id')
            ->get();
    }

    /**
     * Retrieve daily sales statistics for all agents from DB
     */
    public static function retrieveDailyAgentsSalesStatistics()
    {
        return self::with('salesAgent')
            ->selectRaw('DATE(datetime) as date, sales_agent_id, COUNT(*) as sales_count, SUM(price) as total_price')
            ->groupBy('date', 'sales_agent_id')
            ->get();
    }

    /**
     * Retrieve daily sales statistics for all customers from DB
     */
    public static function retrieveDailyCustomersSalesStatistics()
    {
        return self::with('customer')
            ->selectRaw('DATE(datetime) as date, customer_id, COUNT(*) as sales_count, SUM(price) as total_price')
            ->groupBy('date', 'customer_id')
            ->get();
    }
}
