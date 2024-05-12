<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Payments as PaymentsResource;

class PaymentsController extends BaseController
{
    public function index()
    {
        $payments = Payments::all();
        return $this->sendResponse(PaymentsResource::collection($payments), 'Post Fetched');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'customerNumber' => 'required',
            'checkNumber' => 'required',
            'paymentDate' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::table('payments')->insert($input);

        $payments = DB::table('payments')->where('customerNumber', $input['customerNumber'])
            ->first();
        return $this->sendResponse(new PaymentsResource($payments), 'Post Created.');
    }

    public function show($customerNumber)
    {
        $payments = Payments::where('customerNumber', $customerNumber)->get();
        if ($payments->isEmpty()) {
            return $this->sendError('Payments do not exist.');
        }
        return $this->sendResponse(PaymentsResource::collection($payments), 'Payments Fetched.');
    }

    public function update(Request $request, $customerNumber, $checkNumber)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'customerNumber' => 'nullable',
            'checkNumber' => 'nullable',
            'paymentDate' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $payments = DB::table('payments')
            ->where('customerNumber', $customerNumber)
            ->where('checkNumber', $checkNumber)
            ->first();

        if (is_null($payments)) {
            return $this->sendError('Payment does not exist.');
        }

        DB::table('payments')
            ->where('customerNumber', $customerNumber)
            ->where('checkNumber', $checkNumber)
            ->update($input);

        $updatedPayment = DB::table('payments')
            ->where('customerNumber', $customerNumber)
            ->where('checkNumber', $checkNumber)->first();

        return $this->sendResponse(new PaymentsResource($updatedPayment), 'Payment updated.');
    }

    public function destroy($customerNumber, $checkNumber)
    {
        $payments = DB::table('payments')
            ->where('customerNumber', $customerNumber)
            ->where('checkNumber', $checkNumber)
            ->first();

        if (is_null($payments)) {
            return $this->sendError('Payments does not exist.');
        }

        DB::table('payments')
            ->where('customerNumber', $customerNumber)
            ->where('checkNumber', $checkNumber)->delete();

        return $this->sendResponse([], 'Payment deleted.');
    }
}
