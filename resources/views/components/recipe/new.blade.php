<form method="POST" action="{{ route('recipe.store') }}" enctype="multipart/form-data" class="bg-slate-800 max-w-lg mx-auto p-6 rounded-xl shadow-md space-y-6 mt-6">
    @csrf

    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-300 pb-2">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $recipe->title ?? '') }}"
               class="w-full bg-slate-900 py-2 rounded-md border-none outline-blue-700 outline-4 px-3 text-white block" placeholder="Recipe's title here">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-300 pb-2">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="w-full bg-slate-900 py-2 rounded-md border-none outline-blue-700 outline-4 px-3 text-white block" placeholder="What's the description"></textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    <!-- Images -->
    <div>
        <label for="images" class="block text-sm font-medium text-gray-300 pb-2">Images</label>
        <input type="file" name="images[]" id="images" multiple accept="image/*"
               class="mt-1 block w-full text-sm text-white file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0 file:text-sm file:font-semibold
                file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" max="6"/>
        @error('images')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        @if ($errors->has('images.*'))
            @foreach ($errors->get('images.*') as $messages)
                @foreach ($messages as $message)
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @endforeach
            @endforeach
        @endif
    </div>

    <!-- Submit -->
    <div class="flex justify-end">
        <button type="submit"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Publish
        </button>
    </div>
</form>
