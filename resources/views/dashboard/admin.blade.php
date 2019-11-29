@extends('template.dashboard')

@section('title', 'Dashboard');

@section('content')
    <b>Dashboard untuk Admin</b>
    <a class="" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection