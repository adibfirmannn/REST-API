<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AksesControllerOrders extends Controller
{
    public function memanggilApiGetAllData()
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/orders');

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiGetDetailData($orderNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/orders/' . $orderNumber);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiCreate(Request $request)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->post('http://1201220012.test/api/orders', $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiUpdate(Request $request, $orderNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->put('http://1201220012.test/api/orders/' . $orderNumber, $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiDelete($orderNumber)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->delete('http://1201220012.test/api/orders/' . $orderNumber);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
}
