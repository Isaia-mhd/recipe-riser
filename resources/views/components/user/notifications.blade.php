
<div class="max-w-2xl mx-auto mt-6">
    <!-- Notifications -->
    <h2 class="text-white text-2xl py-2">Notifications</h2>
    <div class="space-y-1">
        @forelse ($notifications as $notification)
            <div class="p-4 text-white bg-gray-800 rounded-xl shadow">
                {!! $notification->data['message'] !!}
                <div class="text-xs text-blue-600 mt-1">
                    {{ $notification->created_at->diffForHumans() }}
                </div>
            </div>
        @empty
            <p class="text-gray-500">No notifications available.</p>
        @endforelse
    </div>
</div>

