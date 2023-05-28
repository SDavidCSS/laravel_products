<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $query = Product::query();
        $queryString = $request->query('search', '');

        if (!empty($queryString)) {
            $query->where('name', 'like', "%$queryString%");
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.index', compact('products'));
    }
}
