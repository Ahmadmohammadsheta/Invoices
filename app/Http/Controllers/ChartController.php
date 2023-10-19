<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChartController extends Controller
{
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Product',
            'group_by_field' => 'created_at',
            'group_by_string ' => 'code',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('charts.index', compact('chart1'));
    }

    /**
     * A list of chart_types
     */
    // Line Chart
    // Bar Chart
    // Pie Chart

    ///////////////// there are dose not work /////////////////////
    // Area Chart
    // Scatter Plot
    // Bubble Chart
    // Column Chart
    // Stacked Column Chart
    // Waterfall Chart
    // Radar Chart
    // Polar Chart
    // Donut Chart
    // Gantt Chart
    // Heatmap Chart
    // Treemap Chart
    // Boxplot Chart
    // Funnel Chart
    // Gauge Chart
    // Bullet Chart
    // Stock Chart
}
