<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/register.js') }}"></script>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('messages.email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('messages.password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('messages.confirm_password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Radios buttons -->

            <div class="mt-4">
                <x-label for="rol" :value="__('Rol')" />

                <x-input id="usuario" class="mt-1"
                                type="radio"
                                name="rol" value="usuario" />{{__('messages.user')}}
                <br>
                
                <x-input id="empresa" class="mt-1"
                                type="radio"
                                name="rol" value="empresa" />{{__('messages.business')}}
            </div>

            <!-- Inputs segun rol -->

            <div class="mt-4">
                <x-label for="nombre" class="nombre" :value="__('messages.business_name')" />

                <x-input class="block mt-1 w-full nombre" type="text" name="nombre" :value="old('name')" />
            </div>

            <div class="mt-4">
                <x-label for="ultimos_estudios" class="ultimos_estudios" :value="__('messages.studies')" />
                
                <textarea name="ultimos_estudios" class="ultimos_estudios" cols="40" rows="5"></textarea>

            </div>

            <div class="mt-4">
                <x-label for="descripcion" class="descripcion" :value="__('messages.description')" />

                <textarea name="descripcion" class="descripcion" cols="40" rows="5"></textarea>

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('messages.already_registered') }}
                </a>

                <x-button class="ml-4">
                    {{ __('messages.register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
