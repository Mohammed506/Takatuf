<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {



        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'volunteer_username' => ['max:255', 'unique:users'],
            'organization_name' => ['max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([

            'first_name' => $input['first_name'] ?? null,
            'last_name' => $input['last_name'] ?? null,
            'organization_name' => $input['organization_name'] ?? null,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role_id'],
            'volunteer_username' => $input['volunteer_username'] ?? null,
            'volunteer_gender' => $input['volunteer_gender'] ?? null,
            'volunteer_phonenumber' => $input['volunteer_phonenumber'] ?? null,



        ]);
    }
}
