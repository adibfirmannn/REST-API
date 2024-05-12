<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AksesControllerPayments extends Controller
{
    public function memanggilAPIGetAlldata()
    {
        $token = '3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/payments');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilAPiGetDetailData($customerNumber)
    {
        $token = '3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/paymentsDetail/' . $customerNumber);
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiCreate(Request $request)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $data = $request->all();

        // Buat permintaan POST
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post('1201220012.test/api/paymentsCreate', $data);

        return $response->json();
    }

    public function memanggilApiUpdate(Request $request, $customerNumber, $checkNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $data = $request->all();

        // Buat permintaan PUT atau PATCH
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->put('http://1201220012.test/api/paymentsUpdate/' . $customerNumber . '/' . $checkNumber, $data);

        return $response->json();
    }


    public function memanggilApiDelete($customerNumber, $checkNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";

        // Buat permintaan DELETE
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->delete('http://1201220012.test/api/paymentsDelete/' . $customerNumber . '/' . $checkNumber);

        return $response->json();
    }
}
