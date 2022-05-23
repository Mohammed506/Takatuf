<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">

                        <x-jet-label value="{{ __('First Name') }}" />

                        <x-jet-input class="{{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text"
                            placeholder="Mohammed" name="first_name" :value="old('first_name')" required autofocus
                            autocomplete="first_name" />
                        <x-jet-input-error for="first_name"></x-jet-input-error>

                    </div>
                    <div class="col-md-6 mb-4">

                        <x-jet-label value="{{ __('Last Name') }}" />

                        <x-jet-input class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text"
                            placeholder="alaqil" name="last_name" :value="old('last_name')" required autofocus
                            autocomplete="last_name" />
                        <x-jet-input-error for="last_name"></x-jet-input-error>

                    </div>
                </div>
                <x-jet-input type="hidden" name="role_id" value="2" />


                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        placeholder="example@example.com" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <x-jet-label value="{{ __('Username') }}" />
                        <x-jet-input class="{{ $errors->has('volunteer_username') ? 'is-invalid' : '' }}" type="text"
                            placeholder="Mohammed123" name="volunteer_username" :value="old('volunteer_username')" required autofocus
                            autocomplete="volunteer_username" />
                        <x-jet-input-error for="volunteer_username"></x-jet-input-error>
                    </div>
                    <div class="col-md-6 mb-4">

                        <h6 class="mb-2 pb-1">Gender: </h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="volunteer_gender" id="femaleGender"
                                value="female" checked />
                            <label class="form-check-label" for="femaleGender">Female</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="volunteer_gender" id="maleGender"
                                value="male" />
                            <label class="form-check-label" for="maleGender">Male</label>
                        </div>



                    </div>
                </div>
                <div class="mb-3">
                    <x-jet-label value="{{ __('Phone Number') }}" />

                    <x-jet-input class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="tel"
                        placeholder="0504555540" name="volunteer_phonenumber" :value="old('volunteer_phonenumber')" required />

                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <x-jet-label value="{{ __('Password') }}" />

                        <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            placeholder="Enter your password" name="password" required autocomplete="new-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>

                    <div class="col-md-6 mb-4">
                        <x-jet-label value="{{ __('Confirm Password') }}" />

                        <x-jet-input class="form-control" type="password" name="password_confirmation" required
                            placeholder="Repeat your password" autocomplete="new-password" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '">' . __('Privacy Policy') . '</a>',
]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class=" me-3 text-decoration-none" href="{{ route('login') }}" style="color: #43425d">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button>
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
