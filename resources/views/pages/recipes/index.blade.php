@extends('layouts.app')
@section('body')
    <div class="w-full min-h-screen bg-gray-900 text-white py-12 px-4 flex gap-8">
        {{--TOP Recipes--}}
        @include('pages.auth.top')

        {{--List of Recipes--}}
        <div class="w-full max-w-[99%] lg:max-w-[70%] xl:max-w-[50%] container mx-auto">
            <div class="max-w-4xl mx-auto p-6 text-center text-2xl">
                @include('layouts.session.success')
            </div>
            @include('components.recipe.feed')
        </div>

        {{--Comments of Recipes--}}
        @include('components.user.chat')

    </div>
@endsection
