@if(session()->has('error'))
    <div class="rounded-sm p-1 text-center">
        <span class="text-red-500 text-center">{{ session('error') }}</span>
    </div>
@endif
