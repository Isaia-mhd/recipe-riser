<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold text-amber-400">RecipeRiser</h1>
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
                <a
                    href="{{ route('recipe.index') }}"
                    class="text-gray-300 text-2xl hover:text-amber-400 transition"
                >Recipes</a>

                <a
                    href="{{ route('recipe.create') }}"
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

                <form action="{{ route('auth.logout') }}" method="POST">
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
