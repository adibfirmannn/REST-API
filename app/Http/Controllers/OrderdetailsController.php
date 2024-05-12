<?php

namespace App\Http\Controllers;

use App\Models\Orderdetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Orderdetails as OrderdetailsResource;

class OrderdetailsController extends BaseController
{
    public function index()
    {
        $orderdetails = Orderdetails::all();
        return $this->sendResponse(OrderdetailsResource::collection($orderdetails), 'Post Fetched');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'orderNumber' => 'required',
            'productCode' => 'required',
            'quantityOrdered' => 'required',
            'priceEach' => 'required',
            'orderLineNumber' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::table('orderdetails')->insert($input);

        $orderdetails = DB::table('orderdetails')->where('orderNumber', $input['orderNumber'])->first();

        return $this->sendResponse(new OrderdetailsResource($orderdetails), 'Post Created.');
    }


    public function show($orderNumber, $productCode)
    {
        $orderdetails = Orderdetails::where('orderNumber', $orderNumber)
            ->where('productCode', $productCode)
            ->get();

        if ($orderdetails->isEmpty()) {
            return $this->sendError('No order details with orderNumber ' . $orderNumber . ' and productCode ' . $productCode . ' exist.');
        }
        return $this->sendResponse(
            OrderdetailsResource::collection($orderdetails),
            'Order details fetched.'
        );
    }


    public function update(Request $request, $orderNumber, $productCode)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'quantityOrdered' => 'required',
            'priceEach' => 'required',
            'orderLineNumber' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $existingOrderdetails = DB::table('orderdetails')
            ->where('orderNumber', $orderNumber)
            ->where('productCode', $productCode)
            ->first();

        if (is_null($existingOrderdetails)) {
            return $this->sendError('Product line does not exist.');
        }

        DB::table('orderdetails')
            ->where('orderNumber', $orderNumber)
            ->where('productCode', $productCode)
            ->update($input);

        $updatedOrderdetails = DB::table('orderdetails')
            ->where('orderNumber', $orderNumber)
            ->where('productCode', $productCode)
            ->first();

        return $this->sendResponse(new OrderdetailsResource($updatedOrderdetails), 'Product line updated.');
    }

    public function destroy($orderNumber, $productCode)
    {
        $existingOrderdetails = DB::table('orderdetails')
            ->where('orderNumber', $orderNumber)
            ->where('productCode', $productCode)
            ->first();

        if (is_null($existingOrderdetails)) {
            return $this->sendError('Order details does not exist.');
        }

        DB::table('orderdetails')
            ->where('orderNumber', $orderNumber)
            ->where('productCode', $productCode)
            ->delete();

        return $this->sendResponse([], 'Order details deleted.');
    }
}
