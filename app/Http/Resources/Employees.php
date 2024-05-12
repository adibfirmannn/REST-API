<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Employees extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return [
            'employeeNumber' => $this->employeeNumber,
            'lastName' => $this->lastName,
            'firstName' => $this->firstName,
            'extension' => $this->extension,
            'email' => $this->email,
            'officeCode' => $this->officeCode,
            'reportsTo' => $this->reportsTo,
            'jobTitle' => $this->jobTitle,
            // 'created_at' => $this->created_at->format('Y/m/d'),
            // 'updated_at' => $this->updated_at->format('Y/m/d'),
        ];
    }
}
