@if(session()->has('success'))
    {{-- <div class="w-full max-w-[90%] mx-auto bg-green-500 rounded-sm p-1 mb-6"> --}}
        <span class="text-green-600 text-center">{{ session('success') }}</span>
    {{-- </div> --}}
@endif
