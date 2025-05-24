<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Recipe;
use App\Notifications\NewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store($recipe)
    {

        request()->validate([
            'comments' => 'required|string|max:255'
        ]);

        $userId = auth()->id();
        $recipe = Recipe::find($recipe);
        if(!$recipe)
        {
            return redirect()->back()->with('error', 'Recipe does not exist.');
        }

        $comment = Comment::create([
            "user_id" => $userId,
            "recipe_id" => $recipe->id,
            "comments" => request()->comments,
        ]);

        $comment->recipe->user->notify(new NewComment($comment));


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($comment)
    {
        $comment = Comment::find($comment);

        if(!$comment)
        {
            return redirect()->back()->with('error', 'Comment does not exist.');
        }

        // $commentOwnerId = $comment->user_id;

        if(Gate::denies("delete-comment", $comment->user_id))
        {
            return redirect()->back()->with('error', 'Unauthorized to delete this Comment.');
        }
        // dd($comment);

        $comment->delete();

        return redirect()->back();
    }
}
