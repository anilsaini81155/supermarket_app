<?php

namespace App\Services;

use App\Models\Item;

class ItemService
{

    public function __construct()
    {
    }


    public function createItem($a)
    {
        return Item::insert(['name' => $a['name'], 'unit_price' => $a['unit_price']]);
    }


    public function getItem($a)
    {
        return Item::where(['id' => $a['id']])->get();
    }

    public function updateItem($a)
    {
        $updateArray = [];
        if (isset($a['name'])) {
            $updateArray['name'] = $a['name'];
        }
        if (isset($a['unit_price'])) {
            $updateArray['unit_price'] = $a['unit_price'];
        }

        if (count($a) > 0) {

            return  Item::where('id', $a['id'])
                ->update($updateArray);
        }
    }

    public function deleteItem($a)
    {
        return Item::where('is_deleted', 'InActive')
            ->update('id', $a['id']);
    }

    public function getALlItems()
    {
        return  Item::where('is_deleted', 'Active')
            ->get();
    }
}
