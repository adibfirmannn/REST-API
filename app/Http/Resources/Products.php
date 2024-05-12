<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Products extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'productCode' => $this->productCode,
            'productName' => $this->productName,
            'productLine' => $this->productLine,
            'productScale' => $this->productScale,
            'productVendor' => $this->productVendor,
            'productDescription' => $this->productDescription,
            'quantityInStock' => $this->quantityInStock,
            'buyPrice' => $this->buyPrice,
            'MSRP' => $this->MSRP,
        ];
    }
}
