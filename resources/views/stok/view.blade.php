@extends('template.dashboard')

@section('title', 'Dashboard - Tambah Stok')

@section('content')
    <h2 class="title">Tambah Stok</h2>
    @if(session('msg'))
    <div class="notification is-{{ session('type') }}">{{ session('msg') }}</div>
    @endif
    <form action="stok/post" method="post">
        {{ csrf_field() }}
        <table class="table is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $record)
                <tr>
                    <th>{{ $record->barang_id }}</th>
                    <td>{{ $record->barang_nama }}</td>
                    <td>Rp. {{ number_format($record->barang_harga,2,',','.') }}</td>
                    <td><input type="number" min="0" class="control borderless" name="barang-{{ $record->barang_id }}" value="0"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="Tambah Stok" class="button is-primary">
    </form>
@endsection