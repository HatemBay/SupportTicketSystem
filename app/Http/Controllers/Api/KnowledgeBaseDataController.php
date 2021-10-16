<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KnowledgeBaseDataResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\KnowledgeBase;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class KnowledgeBaseDataController extends Controller
{
    public function subCategories()
    {
        // $categories = Category::all();

        // return response()->json($categories);
        return KnowledgeBaseDataResource::collection(KnowledgeBase::with('subCategory')->get());
    }
}
