<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //get all recipes
    public function index()
    {
        $users = User::all();
        $recipes = Recipe::with('user', 'comments')->orderBy('created_at', 'DESC')->get();
        return view('pages.recipes.index', compact('recipes', 'users'));
    }

    //show one recipe
    public function show($recipe)
    {
        $recipe = Recipe::find($recipe);

        if(!$recipe)
        {
            return redirect()->back()->with('error', 'Recipe does not exist.');
        }

        return view('pages.recipes.view', compact($recipe));
    }

    //create new recipe
    public  function create()
    {
        return view('pages.recipes.new');
    }

    //Store a recipe
    public  function store()
    {

        $validated = request()->validate([
            'title' => 'required|string|min:3',
            'description' => 'string|max:250',
            'images.*' => 'image|mimes:png,jpeg,jpg,avif,gif,svg|max:2048'
        ]);

        $url = [];
        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $image) {
                $path = $image->store('recipes', 'public');
                $url[] = $path;
            }
        }
        Recipe::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => json_encode($url, JSON_FORCE_OBJECT)
        ]);



        return redirect()->route('recipe.index')->with('success', 'New Recipe Created.');
    }

    // Edit a Recipe
    public  function edit($recipe)
    {
        $recipe = Recipe::find($recipe);
        if(!$recipe)
        {
            return redirect()->back()->with('error', 'Recipe does not exist.');
        }

        return view('pages.recipes.edit', compact($recipe));

    }

    //Update a Recipe
    public  function update(Recipe $recipe)
    {
        request()->validate([
            'title' => 'required|string|min:3',
            'description' => 'string|max:250',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image.*' => 'image|mimes:png,jpeg,jpg,avif,gif,svg|max:2048'
        ]);

        $urls = [];
        if(request()->hasFile('image'))
        {
            $images = request()->file('image');
            foreach ($images as $image)
            {
                $path = $image->store('recipes', 'public');
                $urls[] = $path;
            }
        }

        $recipe->update(
            [
                'user_id' => auth()->user()->id,
                'image' => $urls
            ],
            request()->all()
        );

        return redirect()->route('home')->with('success', 'Recipe Updated.');
    }

    //Delete a Recipe
    public  function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->back()->with('success', 'Recipe Deleted.');
    }
}
