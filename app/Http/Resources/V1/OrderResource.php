<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->id,
            'cart' => $this->cart,
            'addressInfo' => $this->addressInfo,
            'contactInfo' => $this->contactInfo,
            'paymentInfo' => $this->paymentInfo,
            'status' => $this->status,
        ];
    }
}
