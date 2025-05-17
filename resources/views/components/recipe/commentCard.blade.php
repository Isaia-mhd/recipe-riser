<div class="max-h-96 overflow-y-auto p-4 mt-2 mb-2">
    <ul>
        @foreach($recipe->comments as $comment)
            <li>
                <div class="bg-slate-900 rounded-md mt-2 mb-2 px-4 py-1 flex justify-between items-center">
                    <div>

                        <p class="text-sm text-amber-400">{{ $comment->user->username }}</p>
                        <p>{{ $comment->comments }}</p>
                    </div>
                    @include('layouts.session.error')
                    <form action="{{ route('comment.delete', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"><i class="fa fa-trash text-red-800 text-sm cursor-pointer"></i></button>
                    </form>
                </div>
            </li>
        @endforeach


    </ul>
    @if(count($recipe->comments) == 0)
        <p class="text-center">Be the first to comment</p>
    @endif

    <div class="w-full mt-6">
        <form action="{{ route('comment.new', $recipe->id) }}" method="post" class="w-full flex justify-between">
            @csrf
            <textarea type="text" name="comment" placeholder="Comment here..." class="w-[70%] rounded-md py-2 px-3 border-none outline-blue-700 outline-4"></textarea>
            <button type="submit" class="w-[20%] bg-blue-700 py-2 text-white rounded-md px-3 cursor-pointer hover:bg-blue-800 transition duration-150 ease-in-out">Comment</button>
        </form>

    </div>
</div>
