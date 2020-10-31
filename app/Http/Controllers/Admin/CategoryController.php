<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::get();
    }

    public function show($resourceId)
    {
        try {
            $resource = Category::findOrFail($resourceId);
            return response()->json($resource);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());

        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $resource = Category::create($request->all());
            return response()->json($resource);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update(CategoryRequest $request, $resourceId)
    {
        try {
            $resource = Category::findOrFail($resourceId);
            $resource->fill($request->all());
            $resource->save();
            return response()->json($resource);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function delete($resourceId)
    {
        try {
            $resource = Category::findOrFail($resourceId);
            $resource->delete();
            return response()->json([]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
