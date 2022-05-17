<?php

namespace App\Services;

use App\Models\Offer;
use App\Models\Item;
use Illuminate\Support\Collection as Collect;

class OrderService
{

    public function __construct()
    {
    }


    public function createOrder($a)
    {

        $result =  Item::where('id', $a['item_id'])
            ->get();

        if ($result->isEmpty()) {
            return [];
        }

        $offerDetails =  Offer::where('item_id', $a['item_id'])
            ->get();

        if ($offerDetails->isEmpty()) {

            $result = $result->all();
            return [$result['unit_price'] * $a['quantity']];
        } else {
            $offerDetails = $offerDetails->all();

            if ($a['quantity'] == $offerDetails['quantity']) {

                return [$a['quantity'] * $offerDetails['offer_price']];
            } elseif (($a['quantity'] % $offerDetails['quantity']) == 0) {

                return [(($offerDetails['quantity'] / $a['quantity']) * $offerDetails['offer_price'])];
            } else {
                return [$result['unit_price'] * $a['quantity']];
            }
        }
    }
}
