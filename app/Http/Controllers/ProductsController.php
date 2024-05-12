<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Products as ProductsResource;
use App\Http\Controllers\BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        $products = Products::all();
        return $this->sendResponse(ProductsResource::collection($products), 'Products Fetched');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::table('products')->insert($input);

        $products = DB::table('products')->where('productCode', $input['productCode'])->first();

        return $this->sendResponse(new ProductsResource($products), 'Product Created.');
    }

    public function show($productCode)
    {
        $products = Products::where('productCode', $productCode)->first();
        if (is_null($products)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new ProductsResource($products), 'Product Fetched.');
    }

    public function update(Request $request, $productCode)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required|numeric',
            'buyPrice' => 'required|numeric',
            'MSRP' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = DB::table('products')
            ->where('productCode', $productCode)
            ->first();

        if (is_null($product)) {
            return $this->sendError('Product does not exist.');
        }

        DB::table('products')
            ->where('productCode', $productCode)
            ->update($input);

        $updatedProduct = DB::table('products')
            ->where('productCode', $input['productCode'])
            ->first();

        return $this->sendResponse(new ProductsResource($updatedProduct), 'Product updated.');
    }

    public function destroy($productCode)
    {
        $product = DB::table('products')
            ->where('productCode', $productCode)
            ->first();

        if (is_null($product)) {
            return $this->sendError('Product does not exist.');
        }

        DB::table('products')
            ->where('productCode', $productCode)
            ->delete();

        return $this->sendResponse([], 'Product deleted.');
    }
}
