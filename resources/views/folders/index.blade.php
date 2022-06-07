{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 01.06.2022
Description: Folders index page
--}}

{{-- Inspired by https://tailwindcomponents.com/component/free-tailwind-css-list-component --}}

@extends('layouts/main')
@section('content')
    <div class="relative inline-flex w-full mx-auto min-h-screen h-full sm:items-top py-4 sm:pt-0">
        <div class="mt-32 items-center justify-center w-full">
            <div class="w-full md:block md:mx-10 my-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-semibold">Filtrer par: </h1>
                        <form class="flex" action="{{ route('folders.filter') }}">
                            <select id="folders" name="tag_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Filtrer</button>
                        </form>
                    </div>
                    <div>
                        <h1 class="text-2xl font-semibold">Téléchargement groupé</h1>
                        <form class="flex" action="{{ route('reports.compressedDownload') }}">
                            <select id="folders" name="tag_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Enregistrer PV</button>
                        </form>
                    </div>
                    <a class="sm: flex md:flex md:block md:mr-20 items-center font-semibold cursor-pointer bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none" href="{{route('folders.create')}}">
                        <div class="mr-1">
                            <span class="iconify" data-icon="carbon:add" style="color: white;" data-width="32" data-height="32"></span>
                        </div>
                        <div>Créer un dossier</div>
                    </a>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 md:grid-cols-1 md:mx-10 mb-10">
                @foreach($folders as $folder)
                   <x-folder-card :folder="$folder" />
                @endforeach
            </div>
        </div>
    </div>
@endsection

