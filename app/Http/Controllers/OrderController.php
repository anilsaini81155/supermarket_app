<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collect;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\OrderService;

class OrderController extends Controller
{

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function createOrder(Request $a)
    {
        $a->validate([
            "item_id" => "required|max:100",
            "quantity" => "required|numeric"
        ]);

        $result = $this->orderService->createOrder($a->all());
        if (!$result) {
            return response()->json([
                "message" => "Order Not Placed"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 201);
    }

}
