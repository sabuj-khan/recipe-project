@extends('layouts.app')
@section('title', 'Recipe Share')

@section('content')
    <style>
        .recipe_share_row {
            position: relative;
        }

        @media only screen and (max-width: 768px) {
            .recipe_share_row {
                position: static;
            }
        }
    </style>
    @include('components.frontend.breadcrumb')
    <div class="container pt-5">
        <div class="row recipe_share_row">
            @include('components.frontend.right-sidebar')
            @include('components.frontend.recipe_share.recipe-form')
        </div>
    </div>
@endsection
