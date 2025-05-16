<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold text-amber-400">RecipeRiser</h1>
        <div class="space-x-4 flex">
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
                    class="text-gray-300 hover:text-amber-400 transition"
                >Recipes</a>

                <a
                    href="{{ route('recipe.create') }}"
                    class="text-gray-300 hover:text-amber-400 transition"
                >New</a>

                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="text-white hover:text-amber-400 transition cursor-pointer bg-red-700 px-2 font-semibold py-0.5 rounded-md"
                    > Logout </button>
                </form>

            @endauth




    </div>
    </div>
</nav>
