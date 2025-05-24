<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-end lg:justify-between items-center">
        <h1 class="hidden lg:block text-2xl font-bold text-amber-400">RecipeRiser</h1>
        <div class="space-x-4 flex gap-3">
            @guest()
                <a
                    href="{{ route('home') }}"
                    class="text-gray-300 hover:text-amber-400 transition"
                > Home </a>

                <a
                    href="community"
                    class="text-gray-300 hover:text-amber-400 transition"
                > Community </a>

                <a
                    href="{{ route('login') }}"
                    class="text-gray-300 hover:text-amber-400 transition"
                > Login </a>
            @endguest

            @auth()
                <a href="{{ route('recipe.index') }}"
                    class="text-gray-300 text-2xl hover:text-amber-400 transition"
                ><i class="fa fa-home text-3xl"></i></a>

                <a href="{{ route('recipe.create') }}"
                    class="text-gray-300 hover:text-amber-400 transition"
                ><i class="fa fa-add text-3xl"></i></a>

                <a href="{{ route('notifications') }}"
                       class="relative text-gray-300 text-2xl hover:text-amber-400 transition">

                            <!-- Font Awesome bell icon -->
                            <i class="fas fa-bell text-3xl text-white hover:text-amber-400"></i>

                            <!-- Badge -->
                            @if ($unread > 0)
                                <span class="absolute -top-1 -right-1 bg-green-600 text-white text-xs font-bold rounded-full px-1.5 py-0.5">
                                {{ $unread }}
                            </span>
                            @endif

                    </a>

                <a href="{{ route('profile', auth()->id()) }}" class=" text-gray-300 text-2xl hover:text-amber-400 transition">
                        <!-- Image de profil -->
                        <img
                            src="{{ auth()->user()->avatar
                        ? asset('storage/' . auth()->user()->avatar)
                        : 'data:image/jpeg;base64,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' }}"
                            alt="Avatar de {{ auth()->user()->name }}"
                            class="w-8 h-8 rounded-full border border-gray-400 dark:border-gray-600 object-cover"
                        >
                    </a>

                <form action="{{ route('auth.logout') }}" method="POST" class="hidden md:block">
                    @csrf
                    <button
                        type="submit"
                        class="text-white hover:text-amber-400 transition cursor-pointer bg-red-700 px-2 font-semibold py-0.5 rounded-md"
                    ><i class="fa fa-sign-out"></i> </button>
                </form>

            @endauth




    </div>
    </div>
</nav>
