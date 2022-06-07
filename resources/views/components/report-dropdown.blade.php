{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 23.05.2022
Description: PV options menu
--}}

{{-- Inspired by Breeze's default dropdown --}}

<div class="">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="">
                <span class="iconify" data-icon="heroicons-solid:menu-alt-4" data-width="24"></span>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Options -->
            <x-dropdown-link :href="route('reports.download',$report)" >
                {{ __('Télécharger') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('reports.show',$report)" >
                {{ __('Afficher') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('reports.import',$report)" >
                {{ __('Importer') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('reports.destroy',$report)">
                {{ __('Supprimer') }}
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>
</div>
