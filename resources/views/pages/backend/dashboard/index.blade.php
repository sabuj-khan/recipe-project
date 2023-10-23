@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    @include('components.backend.dashboard.dashboard-content')
    @include('components.backend.dashboard.create-user')
    @include('components.backend.dashboard.update-user')
    @include('components.backend.dashboard.user-delete')
@endsection
