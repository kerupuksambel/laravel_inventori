@extends('template.dashboard')

@section('title', 'Dashboard - List Barang')

@section('content')
    @if(session('msg'))
    <div class="notification is-{{ session('type') }}">{{ session('msg') }}</div>
    @endif
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok Barang</th>
                <th>Gambar Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $record)
            <tr>
                <th>{{ $record->barang_id }}</th>
                <td>{{ $record->barang_nama }}</td>
                <td>Rp. {{ number_format($record->barang_harga,2,',','.') }}</td>
                <td>{{ $record->barang_stok }}</td>
                <td>
                    @foreach ($record->gambar as $r)
                        <img style="width: 200px" src="{{ $r['gambar_path'] }}"/>
                    @endforeach
                </td>
                <td><a href='edit/{{ $record->barang_id }}'>Edit</a> | <a href='delete/{{ $record->barang_id }}'>Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="add" class="button is-primary">Tambah Barang</a>
@endsection