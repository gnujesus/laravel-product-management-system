<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Filters\v1\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ProductResource;
use App\Http\Resources\v1\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreProductRequest $request)
    {

        $safeParams = [
            'id' => ['eq', 'gt', 'goq', 'loq', 'lt', 'nq'],
            'name' => ['eq'],
            'price' => ['eq', 'gt', 'goq', 'loq', 'lt', 'nq'],
        ];

        $filter = new ProductFilter($safeParams);
        $queryItems = $filter->transform($request) ?? [];

        if (count($queryItems) == 0) {
            return new ProductCollection(Product::paginate());
        }

        return new ProductCollection(Product::where($queryItems)->paginate());


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
