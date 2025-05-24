@extends('layouts.app')
@section('body')
    <div class="max-w-4xl mx-auto p-6 text-center text-2xl">
        @include('layouts.session.success')
    </div>
    <div class="max-w-4xl mx-auto p-6">
        <!-- Profile Card -->
        <div class=" bg-gray-800 rounded-2xl shadow p-6 mb-3">
            <div class="flex items-center gap-6">
                <!-- Profile Picture -->
                <img src="{{ asset("storage/" . $user->avatar) ?? 'data:image/jpeg;base64,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' }}"
                     alt="Avatar"
                     class="w-24 h-24 rounded-full border-4 border-gray-300 dark:border-gray-600 shadow">

                <!-- User Info -->
                <div>
                    <h2 class="text-2xl text-white font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Member since {{ $user->created_at->format('F Y') }}</p>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 mb-6">
                <h3 class="text-xl font-semibold mb-2 text-white">About</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    {{ $user->bio ?? 'Bio not added yet.' }}
                </p>
            </div>

            {{-- Edit --}}
            @if (auth()->id() == $user->id)
                <a href="{{ route('profile.edit', $user->id) }}" class="bg-green-600 text-white text-sm py-2 px-4 rounded-md">Edit</a>
            @endif

        </div>
        <div class=" bg-gray-800 rounded-2xl shadow p-6">
            @include('components.recipe.feed')
        </div>
    </div>
@endsection
