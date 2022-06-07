{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 02.06.2022
Description: Folder edit form
--}}

@extends('layouts/main')
@section('content')
    <div class="relative inline-flex w-full mx-auto min-h-screen h-full sm:items-top py-4 sm:pt-0">
        <div class="my-auto mx-auto w-1/3">
            <form action="{{ route('folders.update',$folder->id) }}" method="POST">
                @method('PUT')
                @csrf
                {{--Name--}}
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-300">Nom du dossier</label>
                    <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$folder->name}}" required>
                </div>
                <button type="submit" class="font-semibold bg-PVred px-4 py-1 rounded-md border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Mettre à jour le dossier</button>
            </form>
        </div>
    </div>
@endsection
