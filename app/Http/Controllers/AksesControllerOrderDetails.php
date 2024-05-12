<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AksesControllerOrderDetails extends Controller
{
    public function memanggilApiGetAllData()
    {
        $token = '3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/ordersDetails');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiGetDetailData($orderNumber, $productCode)
    {
        $token = '3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('http://1201220012.test/api/ordersDetails/' . $orderNumber . '/' . $productCode);
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
        ])->post('http://1201220012.test/api/ordersDetailsCreate', $data);

        return $response->json();
    }

    public function memanggilApiUpdate(Request $request, $orderNumber, $productCode)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $data = $request->all();



        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->put('http://1201220012.test/api/ordersDetailsUpdate/' . $orderNumber . '/' . $productCode, $data);

        return $response->json();
    }

    public function memanggilApiDelete($orderNumber, $productCode)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->delete(
            'http://1201220012.test/api/ordersDetailsDelete/' . $orderNumber . '/' . $productCode
        );

        return $response->json();
    }
}
