
@extends('template.dashboard')

@section('title', 'Dashboard');

@section('content')
    <b>Dashboard untuk Karyawan</b>

    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
@endsection