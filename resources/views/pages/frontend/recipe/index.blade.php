@extends('layouts.app')
@section('title', 'Recipes')


@section('content')

    @include('components.frontend.breadcrumb')
    {{-- @include('components.frontend.recipe.recipes') --}}
    @include('components.frontend.recipe.recent-recipes')
@endsection
