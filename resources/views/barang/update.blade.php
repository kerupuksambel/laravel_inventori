@extends('template.dashboard')

@section('title', 'Dashboard - Tambah Barang')

@section('content')
    <form action="../edit/post/{{ $barang->barang_id }}" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Nama Barang</label>
            <div class="control">
                <input class='input' type="text" name="barang_nama" placeholder="Nama Barang" value="{{ $barang->barang_nama }}">
            </div>
        </div>
        <div class="columns">
            <div class="field column is-6">
                <label class="label">Harga Barang</label>
                <div class="control has-icons-left">
                    <span class="icon is-left has-text-black">Rp.</span>
                <input class='input' type="text" name="barang_harga" placeholder="Harga Barang" value="{{ $barang->barang_harga }}">
                </div>
            </div>
        </div>
        <input type="submit" value="Edit Data" class="button is-primary">
    </form>
@endsection