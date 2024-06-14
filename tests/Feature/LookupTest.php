<?php

namespace Tests\Feature;

use Illuminate\Testing\TestResponse;
use Tests\CreatesApplication;
use Tests\TestCase;

class LookupTest extends TestCase
{
    use CreatesApplication;

    public function getApiResponse(string $query): TestResponse
    {
        return $this->getJson("/lookup?ip={$query}");
    }

    public function test_empty_ip(): void
    {
        $response = $this->getApiResponse('');
        $response->assertStatus(422);
    }

    public function test_invalid_ip(): void
    {
        $response = $this->getApiResponse('50.a.50.50');
        $response->assertStatus(422);
    }

    public function test_valid_ips(): void
    {
        $response = $this->getApiResponse('1.50.50.50');
        $response->assertStatus(200);
    }
}
