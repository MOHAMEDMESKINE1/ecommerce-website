<?php

namespace App\Charts;

use App\Models\Product;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LineProductChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $products = Product::all(); // Assuming you want all products
        $quantities = $products->pluck('quantity')->toArray();
        $productNames = $products->pluck('name')->toArray();
    
        // Create the chart
        $chart = (new LarapexChart)->lineChart()
            ->setTitle('Products by Quantity')
            ->setSubtitle('Current Inventory')
            ->addData('Quantity', $quantities)
            ->setLabels($productNames);
    
        // Return the chart instance
        return $chart;
    }
}
