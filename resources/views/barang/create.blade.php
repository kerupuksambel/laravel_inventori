@extends('template.dashboard')

@section('title', 'Dashboard - Tambah Barang')

@section('content')
    <form action="add/post" method="post">
        {{ csrf_field() }}

        @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="field">
            <label class="label">Nama Barang</label>
            <div class="control">
                <input class='input' type="text" name="barang_nama" placeholder="Nama Barang">
            </div>
        </div>
        <div class="columns">
            <div class="field column is-8">
                <label class="label">Harga Barang</label>
                <div class="control has-icons-left">
                    <span class="icon is-left has-text-black">Rp.</span>
                    <input class='input' type="text" name="barang_harga" placeholder="Harga Barang">
                </div>
            </div>
            <div class="field column is-4">
                <label class="label">Stok Barang</label>
                <div class="control">
                    <input class='input' type="number" name="barang_stok" placeholder="Stok Barang">
                </div>
            </div>
        </div>
        <input type="submit" value="Tambah Data" class="button is-primary">
    </form>
@endsection