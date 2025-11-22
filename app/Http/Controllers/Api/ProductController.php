<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /api/products?category_id=&is_trend=&search=
    public function index(Request $request)
    {
        $query = Product::with('category')
            ->where('status', 1);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('is_trend')) {
            $query->where('is_trend', (int) $request->is_trend);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        $products = $query->orderByDesc('id')
            ->paginate(20);

        return response()->json([
            'status' => true,
            'data'   => ProductResource::collection($products),
            'meta'   => [
                'current_page' => $products->currentPage(),
                'last_page'    => $products->lastPage(),
                'per_page'     => $products->perPage(),
                'total'        => $products->total(),
            ],
        ]);
    }
    // GET /api/products/trending
    public function trending()
    {
        $products = Product::with('category')
            ->where('status', 1)
            ->where('is_trend', 1)
            ->orderByDesc('id')
            ->paginate(15); // 👈 same size as app PAGE_SIZE

        return response()->json([
            'status' => true,
            'data'   => ProductResource::collection($products),
            'meta'   => [
                'current_page' => $products->currentPage(),
                'last_page'    => $products->lastPage(),
                'total'        => $products->total(),
            ]
        ]);
    }


    // GET /api/products/{id}
    public function show($id)
    {
        $product = Product::with('category')
            ->where('status', 1)
            ->findOrFail($id);

        return response()->json([
            'status' => true,
            'data'   => new ProductResource($product),
        ]);
    }
}
