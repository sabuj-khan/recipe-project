@extends('layouts.app')
@section('title', 'Recipes')


@section('content')

    @include('components.frontend.breadcrumb')
    <div class="container">
        <div class="row pt-5">
            @include('components.frontend.recipe.recent-recipes')
            @include('components.frontend.right-sidebar')
        </div>
    </div>
@endsection
