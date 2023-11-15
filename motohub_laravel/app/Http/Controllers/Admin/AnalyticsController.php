<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Motorcycle;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role.admin', 'lang']);
    }

    public function index(): View
    {
        $viewData['title'] = trans('messages.analyticsTitle');
        $viewData['topSellingMotorcycles'] = $this->getTopSellingMotorcycles();
        $viewData['lowestSellingMotorcycles'] = $this->getLowestSellingMotorcycles();
        $viewData['topSellingBrands'] = $this->getTopSellingBrands();
        $viewData['lowestSellingBrands'] = $this->getLowestSellingBrands();

        return view('admin.analytics.index')->with('viewData', $viewData);
    }

    public function getTopSellingMotorcycles(): Collection
    {
        $motorcycles = OrderItem::with('motorcycle')
            ->select('motorcycle_id', DB::raw('SUM(quantity) as sold_units'))
            ->groupBy('motorcycle_id')
            ->orderBy('sold_units', 'desc')
            ->take(3)
            ->get();

        return $motorcycles;
    }

    public function getLowestSellingMotorcycles(): Collection
    {
        $motorcycles = OrderItem::with('motorcycle')
            ->select('motorcycle_id', DB::raw('SUM(quantity) as sold_units'))
            ->groupBy('motorcycle_id')
            ->orderBy('sold_units', 'asc')
            ->take(3)
            ->get();

        return $motorcycles;
    }

    public function getTopSellingBrands(): Collection
    {
        $motorcycles = Motorcycle::with('brand')
            ->select('brand_id', DB::raw('SUM(order_items.quantity) AS total_sold'))
            ->join('order_items', 'motorcycles.id', '=', 'order_items.motorcycle_id')
            ->groupBy('brand_id')
            ->orderBy('total_sold', 'desc')
            ->take(3)
            ->get();
        $brands = new Collection();
        foreach($motorcycles as $motorcycle) {
            $brand = $motorcycle->getBrand();
            $brand->total_sold = $motorcycle->total_sold;
            $brands->push($brand);
        }

        return $brands;
    }

    public function getLowestSellingBrands(): Collection
    {
        $motorcycles = Motorcycle::with('brand')
            ->select('brand_id', DB::raw('SUM(order_items.quantity) AS total_sold'))
            ->join('order_items', 'motorcycles.id', '=', 'order_items.motorcycle_id')
            ->groupBy('brand_id')
            ->orderBy('total_sold', 'asc')
            ->take(3)
            ->get();
        $brands = new Collection();
        foreach($motorcycles as $motorcycle) {
            $brand = $motorcycle->getBrand();
            $brand->total_sold = $motorcycle->total_sold;
            $brands->push($brand);
        }

        return $brands;

    }
}
