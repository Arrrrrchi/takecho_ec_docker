<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAbout(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200)
            ->assertViewIs('about');
    }

    public function testNameko(): void
    {
        $response = $this->get(route('nameko'));

        $response->assertStatus(200)
            ->assertViewIs('nameko');
    }

    public function testPolicy(): void
    {
        $response = $this->get(route('policy'));

        $response->assertStatus(200)
            ->assertViewIs('policy');
    }

    public function testLaw(): void
    {
        $response = $this->get(route('law'));

        $response->assertStatus(200)
            ->assertViewIs('specific_trade_law');
    }

    public function testTerms(): void
    {
        $response = $this->get(route('terms'));

        $response->assertStatus(200)
            ->assertViewIs('terms');
    }
}
