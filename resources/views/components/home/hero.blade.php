<section class="bg-gray-800 py-20 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-amber-400">
            Share Your Culinary Creations
        </h2>
        <p class="text-lg md:text-xl text-gray-300 mb-8">
            Join RecipeRiser to discover, create, and share recipes with food
            lovers worldwide.
        </p>
        @auth()
            <a href="{{ route('recipe.index') }}" class="bg-amber-400 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-amber-500 transition">
                Get Started
            </a>
        @endauth
        @guest()
            <a href="{{ route('login') }}" class="bg-amber-400 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-amber-500 transition">
                Get Started
            </a>
        @endguest
    </div>
</section>
