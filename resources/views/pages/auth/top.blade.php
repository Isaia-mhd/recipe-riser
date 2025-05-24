<div class="w-full hidden xl:block xl:max-w-[20%] bg-slate-800 rounded-lg  container mx-auto">
    <h2 class="py-4 px-2 text-2xl font-bold">Top Users</h2>
    <div class="w-full max-w-[90%] md:max-w-[95%] mx-auto flex flex-col gap-2">
        @foreach ($users as $user )
        <a href="{{ route('profile', $user->id) }}">
            <div class="w-full py-1 px-2 bg-blue-900 rounded-2xl">
                <h2 class="text-2xl text-amber-400">{{ $user->name }}</h2>
                <p>{{ count($user->recipes) }} Recipe Posted</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
