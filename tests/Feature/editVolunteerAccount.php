<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Livewire\Livewire;
use Tests\TestCase;

class editVolunteerAccount extends TestCase
{
    use RefreshDatabase;

    public function test_editVolunteer()
    {
        $this->assertTrue(true);
    }
}
