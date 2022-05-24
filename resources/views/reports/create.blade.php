{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 24.05.2022
Description: Report creation folder
--}}

{{-- Inspired by: https://tailwindcomponents.com/component/input-field --}}
@extends('layouts/main')
@section('content')
<div class="relative inline-flex w-full min-h-screen h-full py-4 sm:pt-0">
    <div class="max-w-2xl mx-auto mt-32 p-16">
        <form>
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titre</label>
                <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                <input type="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Heure de début</label>
                    <input type="time" id="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Heure de fin</label>
                    <input type="time" id="end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
            </div>
            <div class="mb-6">
                <label for="participants" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Présents</label>
                <input type="text" id="participants" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="absents" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Absents</label>
                <input type="text" id="absents" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="excused" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Excusés</label>
                <input type="text" id="excused" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            @if (Route::has('login'))
                    @auth
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer PV</button>
                    @else
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Télécharger PDF</button>
                    @endauth
            @endif
        </form>

        <p class="mt-5">These input field components is part of a larger, open-source library of Tailwind CSS components. Learn
            more by going to the official <a class="text-blue-600 hover:underline"
                                             href="https://flowbite.com/docs/getting-started/introduction/" target="_blank">Flowbite
                Documentation</a>.
        </p>
    </div>
</div>

@endsection
