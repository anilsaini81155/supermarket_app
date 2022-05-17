<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\OfferService;

class OfferController extends Controller
{

    protected $offerService;


    public function __construct(OfferService $offerService)
    {

        $this->offerService = $offerService;
    }


    public function createOffer(Request $a)
    {
        $a->validate([
            "offer_name" => "required|max:100",
            "item_id" => "required|numeric",
            "quantity" => "required|numeric",
            "offer_price" => "required|numeric"
        ]);

        $result = $this->offerService->createOffer($a->all());
        if ($result == false) {
            return response()->json([
                "message" => "Record not created"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 201);
    }


    public function getOffer(Request $a)
    {
        $a->validate([
            "id" => "nullable|numeric",
            "offer_name" => "nullable|max:100"
        ]);

        $result = $this->offerService->getOffer($a->all());

        if ($result->isEmpty()) {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 200);
    }


    public function updateOffer(Request $a)
    {
        $a->validate([
            "id" => "required|numeric",
            "quantity" => "nullable|numeric",
            "offer_price" => "nullable|numeric",
            "offer_name" => "nullable|max:100"
        ]);

        $result = $this->offerService->updateOffer($a->all());
        if ($result == false) {
            return response()->json([
                "message" => "Record not updated"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 200);
    }


    public function deleteOffer(Request $a)
    {
        $a->validate([
            "id" => "required"
        ]);

        $result =$this->offerService->deleteOffer($a->all());

        if ($result == false) {
            return response()->json([
                "message" => "Record not updated"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 202);
    }


    public function getAllOffers()
    {
        $result = $this->offerService->getAllOffers();

        if($result->isEmpty()){
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
        $result = $result->toJson(JSON_PRETTY_PRINT);
        return response($result, 200);
    }
}
