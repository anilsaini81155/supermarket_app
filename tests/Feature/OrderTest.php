<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_create_offer(){
        $this->withoutExceptionHandling();
        $response = $this->post('/api/Checkout', [
            'item_id' => '1',
            'quantity' => '3',
        ]);
        $response->assertStatus(201);
    }

   
}
