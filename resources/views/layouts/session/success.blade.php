@if(session()->has('success'))
    <div class=" bg-green-500 rounded-sm p-1">
        <span class="text-white text-center">{{ session('success') }}</span>
    </div>
@endif
