@extends('template.dashboard')

@section('title', 'Dashboard - Manajemen User')

@section('content')
    @if(session('msg'))
    <div class="notification is-{{ session('type') }}">{{ session('msg') }}</div>
    @endif
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Role User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $record)
            <tr>
                <th>{{ $record->id }}</th>
                <td>{{ $record->user_name }}</td>
                <td>{{ $record->user_role }}</td>
                <td><a href='edit/{{ $record->id }}'>Edit</a> | <a href='delete/{{ $record->id }}'>Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="add" class="button is-primary">Tambah User</a>
@endsection