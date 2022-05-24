{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 20.05.2022
Description: Webpage Header
--}}

{{-- Inspired by: https://tailwindcomponents.com/component/header-1 --}}
{{-- Inspired by: https://tailwindcomponents.com/component/header-2 --}}
{{-- Responsive from https://larainfo.com/blogs/tailwind-css-hamburger-menu-examples --}}

<nav class="w-full py-3 bg-PVblue border-b-2 border-black border-opacity-60">
    <div class="flex items-center justify-between mx-auto xl:max-w-7xl lg:max-w-5xl md:max-w-3xl md:px-2 px-4">
        <section class="flex items-center text-gray-900 space-x-2">
            <a href="/"><img width="100" height="96" src="{{asset("img/logo.png")}}" alt="PVMaker logo"></a>
        </section>
        <!-- Large and above screensize menu -->
        <div class="hidden lg:flex">
            <ul class="items-center md:space-x-8 space-x-6 text-gray-900 font-semibold text-lg hidden md:flex">
                <li class="relative group">
                    <a href="/" >Accueil</a>
                    <div class="w-full h-0.5 bg-transparent group-hover:bg-PVred transition-al absolute bottom-0" />
                </li>
                <li class="relative group">
                    <a href="{{route('reports.create')}}" >Créer un PV</a>
                    <div class="w-full h-0.5 bg-transparent group-hover:bg-PVred transition-al absolute bottom-0" />
                </li>
                @if (Auth::check())
                    <li class="relative group">
                        <a href="#" >Mes PVs</a>
                        <div class="w-full h-0.5 bg-transparent group-hover:bg-PVred transition-al absolute bottom-0" />
                    </li>
                @endif
                <li class="relative group">
                    <a href="/contact">Contact</a>
                    <div class="w-full h-0.5 bg-transparent group-hover:bg-PVred transition-al absolute bottom-0" />
                </li>
                @if (Route::has('login'))
                    @auth
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    @else
                        <li class="relative group"><a href="{{ route('login') }}" class="bg-PVred px-4 py-1 rounded-xl border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Login</a></li>
                        @if (Route::has('register'))
                            <li class="relative group"><a href="{{ route('register') }}" class="bg-PVred px-4 py-1 rounded-xl border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">S'enregistrer</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
        <!-- Below large screensize menu -->
        <div class="flex lg:hidden">
            @include('components.menu-dropdown')
        </div>
    </div>
</nav>
