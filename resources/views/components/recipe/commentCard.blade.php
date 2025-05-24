<div class="max-h-96 overflow-y-auto p-4 mt-2 mb-2">
    <ul>
        @foreach($recipe->comments as $comment)
            <li>
                <div class="bg-slate-900 rounded-md mt-2 mb-2 px-4 py-1 flex justify-between items-center">
                    <div>

                        <p class="text-sm text-amber-400">{{ $comment->user->name }}</p>
                        <p>{{ $comment->comments }}</p>
                    </div>

                    <form action="{{ route('comment.delete', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"><i class="fa fa-trash text-red-800 text-sm cursor-pointer"></i></button>
                    </form>
                </div>
            </li>
        @endforeach
        @include('layouts.session.error')



    </ul>
    @if(count($recipe->comments) == 0)
        <p class="text-center">Be the first to comment</p>
    @endif

    <div class="w-full mt-6">
        <form action="{{ route('comment.new', $recipe->id) }}" method="post" class="w-full flex justify-between gap-2">
            @csrf
            <input type="text" name="comments" placeholder="Comment here..." class="w-[90%] rounded-md px-3 border-none outline-blue-700 outline-4"/>

            <button type="submit" class="w-[10%] bg-blue-700 py-2 text-white rounded-md px-1 cursor-pointer hover:bg-blue-800 transition duration-150 ease-in-out"><i class="fa fa-send"></i></button>
        </form>
        @error('comments')
                <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>

