@extends('layouts.app')
@section('body')
    @foreach($recipes as $recipe)
        <p>{{ $recipe->title }}</p>
    @endforeach
@endsection
