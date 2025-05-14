@extends('layouts.app')
@section('body')
    <section class="bg-gray-800 min-h-screen flex items-center justify-center py-16">

    <div class="container mx-auto px-4 max-w-md">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-6 text-amber-400">
                Sign In
            </h2>

            @include('layouts.session.error')
            @include('layouts.session.success')

            <button class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg flex items-center justify-center gap-2 cursor-pointer mb-4 hover:bg-gray-600 transition  ">
                <i class="fa fa-google"></i>
                Sign in with Google
            </button>

            <div class="text-center text-gray-400 my-4">OR</div>


            <form action="{{ route('auth.login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-300 mb-1">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                    class="w-full bg-gray-700 text-gray-200 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400"
                    placeholder="Enter your email"
                    />
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label id="password" class="block text-gray-300 mb-1">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                    class="w-full bg-gray-700 text-gray-200 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400"
                    placeholder="Enter your password"
                    />
                    @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button
                    type="submit"
                    class="w-full bg-amber-400 text-gray-900 px-4 py-3 rounded-lg font-semibold hover:bg-amber-500 transition cursor-pointer"
                >
                    Sign In
                </button>
            </form>
            <div class="text-center mt-3">
                <a
                    href="/forgot-password"
                    class="transform text-center font-semibold text-blue-500 duration-300 hover:text-blue-600 cursor-pointer"
                >
                FORGOT PASSWORD?
                </a>
            </div>
            <p class="text-center text-gray-300 mt-4">
                Don’t have an account?
                <a
                    href="{{ route('register') }}"
                    class="text-amber-400 hover:underline cursor-pointer"
                >
                Sign up
                </a>
            </p>
        </div>
    </div>
</section>
@endsection
