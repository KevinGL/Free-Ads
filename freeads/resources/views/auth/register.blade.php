@include('layouts.app')

<div class="container">
    <form method="POST" action="{{ route('register') }}" class="form-group row">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <x-label for="phone_number" :value="__('Phone_number')" />

            <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" required />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
        </div>

        <div class="form-group">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="form-group">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</div>