<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApplicationHealthTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_passes_health_check(): void
    {
        $this->get('/healthz')
            ->assertNoContent();
    }
}
