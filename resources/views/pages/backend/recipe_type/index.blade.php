@extends('layouts.app')
@section('title', 'Recipe Type')

@section('content')
    @include('components.backend.recipe_type.table')
    @include('components.backend.recipe_type.create')
    @include('components.backend.recipe_type.edit')
    @include('components.backend.recipe_type.delete')
@endsection
