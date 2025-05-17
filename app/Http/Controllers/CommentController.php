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
        $userId = auth()->id();
        $recipe = Recipe::find($recipe);
        if(!$recipe)
        {
            return redirect()->back()->with('error', 'Recipe does not exist.');
        }

        $comment = Comment::create([
            "user_id" => $userId,
            "recipe_id" => $recipe->id,
            "comments" => request()->comment,
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
            return redirect()->back()->with('error', 'Recipe does not exist.');
        }

        $commentOwnerId = $comment->id;
        if(Gate::denies("delete-comment", $commentOwnerId))
        {
            return redirect()->back()->with('error', 'Unauthorized.');
        }

        $comment->delete();

        return redirect()->back();
    }
}
