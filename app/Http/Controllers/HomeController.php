<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chart_products = [
            'chart_title' => 'Products by daily stocks',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Stock',
            'group_by_field' => 'created_at',
            'group_by_string ' => 'code',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_products);

        $chart_invoices = [
            'chart_title' => 'Invoices by days',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Invoice',
            'group_by_field' => 'created_at',
            'group_by_string ' => 'code',
            'group_by_period' => 'day',
            'chart_type' => 'pie',
        ];
        $chart2 = new LaravelChart($chart_invoices);

        $chart_traders = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_string ' => 'code',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        $chart3 = new LaravelChart($chart_traders);

        $productToday = Stock::whereDate('created_at', Carbon::today())->get();
        $invoices = Invoice::all();
        $today = Invoice::whereDate('created_at', Carbon::today())->first();
        $yesterday = Invoice::whereDate('created_at', Carbon::yesterday())->get();
        // $yesterday = Invoice::where(['invoice_date' => Carbon::yesterday()])->get();
        $thisWeek = Invoice::whereBetween('invoice_date', [Carbon::today(), Carbon::yesterday()])->get();
        return view('home', compact('invoices', 'today', 'yesterday', 'productToday', 'chart1', 'chart2', 'chart3'));
    }
}
