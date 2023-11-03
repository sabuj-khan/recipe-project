@extends('layouts.app')
@section('title', 'Author Recipes')


@section('content')

    @include('components.frontend.breadcrumb')
    <div class="container">
        <div class="row py-5">
            @include('components.frontend.author_recipe.author-recipes')
            @include('components.frontend.right-sidebar')
        </div>
    </div>
    <!-- Modal -->
    @include('components.frontend.author_recipe.recipe-edit-modal')
    @include('components.frontend.author_recipe.recipe-delete-modal')
@endsection
