{{-- source: https://tailwindcomponents.com/component/header-1 --}}
{{-- source: https://tailwindcomponents.com/component/header-2 --}}

<nav class="w-full py-3 bg-PVblue border-b-2 border-black border-opacity-60">
    <div class="flex items-center justify-between mx-auto xl:max-w-7xl lg:max-w-5xl md:max-w-3xl md:px-2 px-4">
        <section class="flex items-center text-gray-900 space-x-2">
            <a href="/"><img width="100" height="96" src="{{asset("img/logo.png")}}" alt="PVMaker logo"></a>
        </section>
        <section>
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
                        <li class="relative group">@include('components.user-dropdown')</li>
                    @else
                        <li class="relative group"><a href="{{ route('login') }}" class="bg-PVred px-4 py-1 rounded-xl border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">Login</a></li>
                        @if (Route::has('register'))
                            <li class="relative group"><a href="{{ route('register') }}" class="bg-PVred px-4 py-1 rounded-xl border-PVred border-2 text-white hover:bg-red-500 active:bg-PVred focus:ring focus:ring-red-500 focus:ring-opacity-25 outline-none">S'enregistrer</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </section>
    </div>
    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</nav>
