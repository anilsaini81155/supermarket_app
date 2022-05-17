<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Offer;

class OfferTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_create_offer(){
        $this->withoutExceptionHandling();
        $response = $this->post('/api/CreateOffer', [
            'offer_name' => 'RiceSale',
            'item_id' => '1',
            'quantity' => '3',
            'offer_price' => '40'
        ]);
        $response->assertStatus(201);
        $this->assertTrue(count(Offer::all()) > 1);
    }

    public function test_update_offer(){
        $this->withoutExceptionHandling();
        $response = $this->patch("/api/UpdateOffer", [
            'id' => '1',
            'quantity' => '3',
            'offer_price' => '35',
            'offer_name' => 'RiceSuperSale'
        ]);
        $this->assertTrue(Offer::findOrFail(1));
        $response->assertStatus(200);
    }

    public function test_delete_offer(){
        
        $this->withoutExceptionHandling();
        $this->delete("/api/DeleteOffer",[
            'id' => '1',
        ]); 
        $this->assertDatabaseMissing('Offer', ['id' => 1]); 
    }
}
