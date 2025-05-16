<div class="w-full max-w-[99%] lg:max-w-[70%] xl:max-w-[50%] container mx-auto">
    <div class="w-full max-w-[90%] mx-auto flex flex-col gap-2">
        @foreach($recipes as $recipe)
            <div
                class="bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all"
            >
                <div class="flex justify-between">
                    <div class="">
                        <h3 class="text-xl font-bold text-amber-300 mb-2">
                            {{ $recipe->title }}
                        </h3>
                        <p class="text-gray-400 text-sm mb-2">
                            by {{ $recipe->user->username }} | {{ $recipe->created_at }}
                        </p>
                    </div>
                    <button id="dropdown-button" class="hover:text-blue-600 cursor-pointer">
                        <i class="fa fa-ellipsis-vertical"></i>
                    </button>
                </div>

                @if($recipe->description)
                    <p class="text-white pb-2">{{ $recipe->description }}</p>
                @endif


                {{-- <p class="text-gray-300 pb-4">
                    @if($recipe->ingredients)
                        <span class="text-gray-400 text-lg font-bold underline cursor-pointer">
                            Instructions: <span class="text-sm text-white">{{ $recipe->ingredients }}</span>
                        </span>
                    @endif
                </p> --}}

                {{-- <p class="text-gray-300 pb-4">
                    @if($recipe->instructions)
                        <span class="text-gray-400 text-lg font-bold underline cursor-pointer">
                            Instructions: <span class="text-sm text-white">{{ $recipe->instructions }}</span>
                        </span>
                    @endif
                </p> --}}

                @php
                    $images = json_decode($recipe->image, true);
                @endphp
                @if(count($images) == 1)
                    <div class="flex justify-between gap-1">
                        <a href="{{ asset('storage/' . $images[0]) }}" class="w-full">
                            <img
                                src="{{ asset('storage/' . $images[0]) }}"
                                alt="{{ $recipe->title }}"
                                class="w-full object-cover rounded-t-lg mb-4"
                            />
                        </a>

                    </div>
                @endif
                @if(count($images) == 2)
                    <div class="flex justify-between gap-1">
                        <a href="{{ asset('storage/' . $images[0]) }}" class="w-full">
                            <img
                                src="{{ asset('storage/' . $images[0]) }}"
                                alt="{{ $recipe->title }}"
                                class="w-full object-cover rounded-t-lg mb-4"
                            />
                        </a>
                        <a href="{{ asset('storage/' . $images[1]) }}" class="w-full">
                            <img
                                src="{{ asset('storage/' . $images[1]) }}"
                                alt="{{ $recipe->title }}"
                                class="w-full object-cover rounded-t-lg mb-4"
                            />
                        </a>
                    </div>
                @endif

                <div class="flex justify-between items-center gap-4 text-2xl">
                    <div class="flex items-center justify-start gap-6">
                        <a><i class="fa fa-thumbs-up cursor-pointer"></i></a>
                        <a><i class="fa fa-heart cursor-pointer"></i></a>
                        <a><i class="fa fa-share cursor-pointer"></i></a>
                    </div>

                    <div class="flex justify-end items-center gap-2">
                        <span class="text-[16px]">{{ count($recipe->comments) }}</span>
                        <p class="cursor-pointer text-blue-500"><i class="fa fa-comment"></i></p>
                    </div>
                </div>

                @include('components.recipe.commentCard')
            </div>
        @endforeach
    </div>
</div>
