{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 20.05.2022
Description: Forgotten password page
--}}

{{-- Breeze's default forgotten password page translated --}}

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Mot de passe oublié ? Pas de problème. Il suffit de nous faire connaître votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra de choisir un nouveau. ') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Réinitialiser le mot-de-passe') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
