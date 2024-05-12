<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AksesControllerProductlines extends Controller
{
    public function memanggilApiGetAllData()
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->get('http://1201220012.test/api/productlines');

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
    public function memanggilAPiGetDetailData($key)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->get('http://1201220012.test/api/productlines/' . $key);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }


    public function memanggilAPICreate(Request $request)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->post('http://1201220012.test/api/productlines', $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiUpdate(Request $request, $productLine)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->put('http://1201220012.test/api/productlines/' . $productLine,  $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
    public function memanggilApiDelete($key)
    {
        $token = "3|0JLCb7sziKTyR4Oa9LhCOZhnLquhNKEeMvE4ub0Wdc7fd3a3";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->delete('http://1201220012.test/api/productlines/' . $key);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
}
