@extends('template.dashboard')

@section('title', 'Dashboard - List Barang')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <h1 class="title">Kasir</h1>
    @if(session('msg'))
    <div class="notification is-{{ session('type') }}">{{ session('msg') }}</div>
    @endif
    
    <form action="kasir/post" method="post">
    <table class="table is-hoverable is-fullwidth" id="table-kasir">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Gambar Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
            {{ csrf_field() }}
        <tbody>
            <tr class="transaksi">
                <td><select class="kasir-nama control borderless" data-kasir-id="0" style="width:300px;" name="nama-0"></select></td>
                <td><div class="kasir-img" data-kasir-id="0"></div></td>
                <td>
                    <div class="kasir-harga" data-kasir-id="0"></div>
                </td>
                <td><input type="number" class="control borderless kasir-jumlah" name="jumlah-0"></div></td>
            </tr>
        </tbody>
    </table>
    <a id="add-trx" onclick="addTrx(0)" class="button">Tambah Barang</a>
    <input type="submit" class="button is-primary" value="Submit Transaksi"/>
    </form>
    @endsection
