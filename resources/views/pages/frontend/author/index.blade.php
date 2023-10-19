@extends('layouts.app')
@section('title', 'Authors')

@section('content')
    @include('components.frontend.breadcrumb')
    @include('components.frontend.author.authors')
@endsection
