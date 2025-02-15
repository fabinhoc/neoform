<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

        // Rodar as migrações para o banco SQLite
        $this->artisan('migrate');
    }
}
