@extends('layouts.app')
@section('title', 'Users')

@section('content')
    @include('components.backend.user.table')
    @include('components.backend.user.user-info')
    @include('components.backend.user.user-delete')
@endsection
