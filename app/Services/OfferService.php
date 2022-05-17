<?php

namespace App\Services;

use App\Models\Offer;

class OfferService
{

    public function __construct()
    {
    }


    public function createOffer($a)
    {

        return Offer::insert([
            'offer_name' => $a['offer_name'], 'item_id' => $a['item_id'],
            'quantity' => $a['quantity'], 'offer_price'  => $a['offer_price']
        ]);
    }

    public function getOffer($a)
    {
        $serachArray = [];
        if (isset($a['id'])) {
            $serachArray['id'] = $a['id'];
        }

        if (isset($a['offer_name'])) {
            $serachArray['offer_name'] = $a['offer_name'];
        }

        if (count($a) > 0) {
            return  Offer::where($serachArray)
                ->get();
        } else {
            return $this->getAllOffers();
        }
    }

    public function updateOffer($a)
    {
        $updateArray = [];

        if (isset($a['quantity'])) {
            $updateArray['quantity'] = $a['quantity'];
        }

        if (isset($a['offer_price'])) {
            $updateArray['offer_price'] = $a['offer_price'];
        }

        if (isset($a['offer_name'])) {
            $updateArray['offer_name'] = $a['offer_name'];
        }

        if (count($a) > 0) {

            return  Offer::where('id', $a['id'])
                ->update($updateArray);
        }
    }

    public function deleteOffer($a)
    {
        return Offer::where('is_deleted', 'InActive')
            ->update('id', $a['id']);
    }

    public function getAllOffers()
    {
        return Offer::where('is_deleted', 'InActive')
            ->get();
    }
}
