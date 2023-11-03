@extends('layouts.app')
@section('title', 'Recipe Show')

@section('content')

    @include('components.frontend.breadcrumb')
    <div class="container">
        <div class="row pt-5">
            @include('components.frontend.recipe.recipes-show')
            @include('components.frontend.right-sidebar')
        </div>
        @include('components.frontend.recipe.comment')
    </div>

    @include('components.frontend.recipe.reply-modal')
@endsection
