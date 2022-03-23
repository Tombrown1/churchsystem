<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/"  class="d-flex justify-content-center mb-4">
               <img src="{{asset('backend/assets/logos/main_logo2.jpg')}}" width=64 height=64 alt=""> 
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required />
            </div>
 <!-- Gender -->
            <div class="mt-4">
                <x-label for="gender" :value="__('Gender')" />
                <select name="gender" class="form-control">
                    <option >Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <!-- <x-input id="email" class="" type="email" name="email" :value="old('email')" required /> -->
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class=""
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <!-- <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class=""
                                type="password"
                                name="password_confirmation" required />
            </div> -->

            <div class="d-flex justify-content-end mt-4">
                <a class="text-muted" href="{{ route('login') }}" style="margin-right: 15px; margin-top: 15px;">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
