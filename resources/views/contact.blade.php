{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 20.05.2022
Description: Contact page
--}}

@extends('layouts/main')
@section('content')
    <div class="relative inline-flex w-full mx-auto min-h-screen h-full sm:items-top py-4 sm:pt-0">
        <div class="my-auto mx-auto">
            <h1 class="text-3xl font-bold">
                Contact:
            </h1>
            <ul class="pt-4 space-y-2">
                <li class="flex items-center">
                    <div>
                        <span class="iconify" data-icon="ci:mail" style="color: black;" data-width="32" data-height="32"></span>
                    </div>
                    <div class="ml-4">
                        brunomanuel.vieirarosas@eduvaud.ch
                    </div>
                </li>
                <li class="flex items-center">
                    <div>
                        <a href="https://github.com/bruvrosas"><span class="iconify" data-icon="akar-icons:github-fill" style="color: black;" data-width="32" data-height="32"></span></a>
                    </div>
                    <div class="ml-4">
                        <a href="https://github.com/bruvrosas">github.com/bruvrosas</a>
                    </div>
                </li>
                <li class="flex items-center">
                    <div>
                        <span class="iconify" data-icon="ci:phone" style="color: black;" data-width="32" data-height="32"></span>
                    </div>
                    <div class="ml-4">
                        +071 123 45 67
                    </div>
                </li><li class="flex items-center">
                <div>
                        <span class="iconify" data-icon="carbon:location-filled" style="color: black;" data-width="32" data-height="32"></span>
                    </div>
                    <div class="ml-4">
                        Ecole des Métiers de Lausanne
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
