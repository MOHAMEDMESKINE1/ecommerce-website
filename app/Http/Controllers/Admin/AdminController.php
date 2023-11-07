<?php

namespace App\Http\Controllers\Admin;

use App\Charts\AreaChartProduct;
use App\Charts\BarChartProduct;
use App\Charts\LineProductChart;
use Exception;

use Illuminate\Http\Request;
use App\Charts\PieProductChart;
use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function index(
        PieProductChart $products_pie,
        BarChartProduct $products_bar,
        LineProductChart $products_line,
        AreaChartProduct $products_area,
        )
    {
        
        try {

            return view('users.admin.dashboard',[
                'products_pie' => $products_pie->build(),
                'products_bar' => $products_bar->build(),
                'products_line' => $products_line->build(),
                'products_area' => $products_area->build(),
            ]);
        } catch (Exception $ex) {
          
             
        }
    }
    public function categoryChart()
    {
        

        // return view('users.admin.dashboard', compact('categories'));
    }
    
}
