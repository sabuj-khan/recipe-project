@extends('layouts.app')
@section('title', 'Account')

@section('content')
    @include('components.frontend.account.account-info')
    @include('components.frontend.account.profile-edit-modal')
@endsection