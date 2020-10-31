<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return Product::get();
    }

    public function show($resourceId)
    {
        try {
            $resource = Product::findOrFail($resourceId);
            return response()->json($resource);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());

        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $resource = Product::create($request->all());
            return response()->json($resource);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update(ProductRequest $request, $resourceId)
    {
        try {
            $resource = Product::findOrFail($resourceId);
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
            $resource = Product::findOrFail($resourceId);
            $resource->delete();
            return response()->json([]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
