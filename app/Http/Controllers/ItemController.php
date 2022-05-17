<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collect;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ItemService;

class ItemController extends Controller
{

    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }


    public function createItem(Request $a)
    {
        $a->validate([
            "name" => "required|max:100",
            "unit_price" => "required|numeric"
        ]);

        $result = $this->itemService->createItem($a->all());
        if ($result == false) {
            return response()->json([
                "message" => "Record not created"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 201);
    }

    public function getItem(Request $a)
    {
        $a->validate([
            "id" => "required|numeric"
        ]);

        $result = $this->itemService->getItem($a->all());
        if ($result->isEmpty()) {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 200);
    }

    public function updateItem(Request $a)
    {
        $a->validate([
            "id" => "required|numeric",
            "unit_price" => "nullable|numeric",
            "name" => "nullable|max:100"
        ]);

        $result = $this->itemService->updateItem($a->all());
        if ($result == false) {
            return response()->json([
                "message" => "Record not updated"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 200);
    }

    public function deleteItem(Request $a)
    {
        $a->validate([
            "id" => "required"
        ]);

        $result =  $this->itemService->deleteItem($a->all());
        if ($result == false) {
            return response()->json([
                "message" => "Record not updated"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 202);
    }

    public function getAllItems()
    {
        $result = $this->itemService->getALlItems();
        if($result->isEmpty()){
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 200);
    }
}
