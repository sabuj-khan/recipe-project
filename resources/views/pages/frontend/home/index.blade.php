@extends('layouts.app')
@section('title', 'Home')

@section('content')

    @include('components.frontend.home.hero')
    @include('components.frontend.home.recipes')

@endsection
