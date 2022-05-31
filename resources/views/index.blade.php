{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 20.05.2022
Description: Homepage
--}}

@extends('layouts/main')
@section('content')
        <div class="relative inline-flex w-full mx-auto min-h-screen h-full py-4 ">
            <div class="my-auto mx-auto">
                <h1 class="text-3xl font-bold">
                    Bienvenue à PVMaker
                </h1>
                <h2 class="text-xl">L'outil de création de procès-verbaux.</h2>
                <p>Vous pouvez en créer grâce au formulaire de la page "Créer un PV" et l'exporter au format PDF.</p>
                <p>Si vous vous connectez, vous pourriez aussi stocker vos procès-verbaux en ligne organisés dans des dossiers<br>ainsi que les filtrer par tags et les exporter en masse en fichier compressé.</p>
            </div>
        </div>
@endsection
