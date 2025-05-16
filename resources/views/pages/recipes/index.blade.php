@extends('layouts.app')
@section('body')
    <div class="w-full min-h-screen bg-gray-900 text-white py-12 px-4 flex gap-8">
        @include('components.recipe.top')
        @include('components.recipe.feed')
        @include('components.recipe.comments')

    </div>
@endsection
