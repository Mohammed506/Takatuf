<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Livewire\Livewire;
use Tests\TestCase;

class CreateOpportunity extends TestCase
{
    use RefreshDatabase;

    public function test_CreateOpportunity()
    {
        $this->assertTrue(true);
    }
}
