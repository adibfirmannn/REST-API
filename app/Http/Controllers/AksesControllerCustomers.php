<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AksesControllerCustomers extends Controller
{
    public function memanggilAPIGetAlldata()
    {
        $token = '3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/customers');

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
            ->get('http://1201220012.test/api/customers/' . $customerNumber);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiCreate(Request $request)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://1201220012.test/api/customers', $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiUpdate(Request $request, $customerNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->put('http://1201220012.test/api/customers/' . $customerNumber, $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }


    public function memanggilApiDelete($customerNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->delete('http://1201220012.test/api/customers/' . $customerNumber);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
}
