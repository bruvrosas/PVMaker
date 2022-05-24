{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 23.05.2022
Description: Hamburger menu
--}}

{{-- Inspired by Breeze's default dropdown --}}

<div class="">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="">
                <span class="iconify" data-icon="ci:hamburger" style="color: black;" data-width="36" data-height="36"></span>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Pages -->
            <x-dropdown-link :href="route('index')" >
                {{ __('Accueil') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('index')" >
                {{ __('Créer un PV') }}
            </x-dropdown-link>
            @if (Auth::check())
                <x-dropdown-link :href="route('index')" >
                    {{ __('Mes PVs') }}
                </x-dropdown-link>
            @endif
            <x-dropdown-link :href="route('contact')">
                {{ __('Contact') }}
            </x-dropdown-link>
            <!-- Authentication -->
            @if (Route::has('login'))
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Se déconnecter') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <x-dropdown-link :href="route('login')">
                        {{ __('Login') }}
                    </x-dropdown-link>
                    @if (Route::has('register'))
                        <x-dropdown-link :href="route('register')">
                            {{ __("S'enregistrer") }}
                        </x-dropdown-link>
                    @endif
                @endauth
            @endif
        </x-slot>
    </x-dropdown>
</div>
