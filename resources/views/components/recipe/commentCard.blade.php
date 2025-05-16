<div class="max-h-96 overflow-y-auto p-4 mt-2 mb-2">
    <ul>
        @foreach($recipe->comments as $comment)
            <li>
                <div class="bg-slate-900 rounded-md mt-2 mb-2 px-4 py-1">
                    <p class="text-sm text-amber-400">{{ $comment->user->username }}</p>
                    <p>{{ $comment->comments }}</p>
                </div>
            </li>
        @endforeach


    </ul>
    @if(count($recipe->comments) == 0)
        <p class="text-center">Be the first to comment</p>
    @endif
</div>
