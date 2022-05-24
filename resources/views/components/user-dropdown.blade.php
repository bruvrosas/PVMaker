{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 20.05.2022
Description: Connected user dropdown menu
--}}

{{-- Inspired by Breeze's default dropdown and from my preparation project --}}
<div class="">
<x-dropdown align="right" width="48">
    <!-- Appearance -->
    <x-slot name="trigger">
        <button class="flex items-center font-semibold bg-PVred px-4 py-1 rounded-xl border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">
            <div>{{ Auth::user()->name }}</div>

            <div class="ml-1">
                <span class="iconify" data-icon="mdi:account-circle" style="color: white;" data-width="32" data-height="32"></span>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                {{ __('Se déconnecter') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>
</div>
