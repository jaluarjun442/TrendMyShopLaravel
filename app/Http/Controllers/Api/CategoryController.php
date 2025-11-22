<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    // GET /api/categories
    public function index()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => CategoryResource::collection($categories),
        ]);
    }
}
