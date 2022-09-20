<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Resources\V1\OrderResource;
use App\Http\Resources\V1\OrderCollection;

class OrderController extends Controller
{
    public function index()
    {
        return new OrderCollection(Order::All());
    }

    public function store(Request $request)
    {
        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyNjU4NzgzMCIsIm5hbWUiOiJWb3JhbCBBZG1pbiIsIm1lc3NhZ2UiOiJuZXZlciBoYWNrZWQgeWVhaGhoIn0.lNOVNhvQ2S7_bjiIL0vkHThmGIDDlUwxHs9GdRGoxvY";

        if($token!==$request->header('apiKey')){
            return [
                "message"=>"Unauthenticated."
            ];
        };
        $Order = Order::create([
            'cart' => $request->cart,
            'addressInfo' => $request->addressInfo,
            'contactInfo' => $request->contactInfo,
            'paymentInfo' => $request->paymentInfo,
            'status' => $request->status,
        ]);
        return new OrderResource($Order);
    }
}

