<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryDataController extends Controller
{
    public function categories()
    {
        // $categories = Category::all();

        // return response()->json($categories);
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category)
    {
        // $categories = Category::all();

        // return response()->json($categories);
        return new CategoryResource($category);

    }

}
