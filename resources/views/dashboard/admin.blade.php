@extends('template.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div id="header">
        Selamat datang <b>{{ Auth::user()->user_name }}</b> dengan role <b>{{ Auth::user()->user_role }}</b>
    </div>
@endsection