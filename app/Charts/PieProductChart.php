<?php

namespace App\Charts;

use App\Models\Product;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieProductChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
           // Fetch data from the database, adjust the query as needed
    $products = Product::all(); // Assuming you want all products
    $quantities = $products->pluck('quantity')->toArray();
    $productNames = $products->pluck('name')->toArray();

    // Create the chart
    $chart = (new LarapexChart)->pieChart()
        ->setTitle('Products by Quantity')
        ->setSubtitle('Current Inventory')
        ->addData($quantities)
        ->setLabels($productNames);

    // Return the chart instance
    return $chart;
    }
}
