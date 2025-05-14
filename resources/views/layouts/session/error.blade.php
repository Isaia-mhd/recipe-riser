@if(session()->has('error'))
    <div class="bg-red-500 rounded-sm p-1 text-center">
        <span class="text-white text-center">{{ session('error') }}</span>
    </div>
@endif
