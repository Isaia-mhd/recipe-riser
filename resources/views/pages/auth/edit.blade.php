@extends('layouts.app')
@section('body')
<form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data" class="bg-slate-800 max-w-lg mx-auto p-6 rounded-xl shadow-md space-y-6 mt-6">
    @csrf
    @method('put')

    <!-- name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-300 pb-2">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
               class="w-full bg-slate-900 py-2 rounded-md border-none outline-blue-700 outline-4 px-3 text-white block">
        @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- bio -->
    <div>
        <label for="bio" class="block text-sm font-medium text-gray-300 pb-2">Bio</label>
        <textarea name="bio" id="description" rows="3" value="{{ $user->bio ?? '' }}"
                  class="w-full bg-slate-900 py-2 rounded-md border-none outline-blue-700 outline-4 px-3 text-white block" placeholder="Tell about you"></textarea>
        @error('bio')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    <!-- avatar -->
    <div>
        <label for="avatar" class="block text-sm font-medium text-gray-300 pb-2">Avatar</label>
        <input type="file" name="avatar" id="avatar"
               class="mt-1 block w-full text-sm text-white file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0 file:text-sm file:font-semibold
                file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer"/>

        @error('avatar')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>

    <!-- Submit -->
    <div class="flex justify-end">
        <button type="submit"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update
        </button>
    </div>
</form>
@endsection
