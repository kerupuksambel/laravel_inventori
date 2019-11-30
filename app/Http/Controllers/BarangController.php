<?php

namespace App\Http\Controllers;

use Auth;

use App\Barang;
use App\FileBarang;
use App\Users;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function view()
    {
        $data = Barang::all();
        $page_now = 'barang/view';
        foreach($data as $key => $record){
            $num = $data[$key]->barang_creator_id;
            // $data[$key]->barang_creator_name = Barang::find($num)->barang_creator_name;
            $data[$key]->barang_creator_name = '-';
        }

        return view('barang.view', ['data' => $data, 'page_now' => $page_now]);
    }

    public function create_post(Request $request)
    {
        $request = $request->validate([
            'barang_nama' => 'required|unique:barang',
            'barang_harga' => 'required|numeric',
            'barang_stok' => 'required|numeric'
        ]);

        $sent = [
            'barang_nama' => $request['barang_nama'],
            'barang_harga' => $request['barang_harga'],
            'barang_stok' => $request['barang_stok'],
            'barang_creator_id' => Auth::user()->id,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        
        Barang::create($sent);
        return redirect('/'.Auth::user()->user_role.'/barang/view')
        ->with('msg', 'Barang sudah ditambahkan.')
        ->with('type', 'primary');

    }
    
    public function create()
    {
        $page_now = 'barang/add';

        return view('barang.create', ['page_now' => $page_now]);
    }

    public function edit($id)
    {
        $res = Barang::where('barang_id', $id)->first();
        return view('barang.update', ['barang' => $res]);
    }

    public function edit_post($id, Request $request){
        $request = $request->validate([
            'barang_nama' => '',
            'barang_harga' => 'numeric'
        ]);

        // dd($request);

        $b = Barang::find($id);
        $b->updated_at = date('Y-m-d h:i:s');
        if(!is_null($request['barang_nama'])){
            $b->barang_nama = $request['barang_nama'];
        }
        if(!is_null($request['barang_harga'])){
            $b->barang_harga = $request['barang_harga'];
        }
        $b->save();
        
        return redirect('/'.Auth::user()->user_role.'/barang/view')
        ->with('msg', 'Barang sudah diedit.')
        ->with('type', 'info');
    }

    public function delete_post($id)
    {
        $b = Barang::find($id);
        $b->delete();

        return redirect('/'.Auth::user()->user_role.'/barang/view')
        ->with('msg', 'Barang sudah dihapus.')
        ->with('type', 'danger');
    }
}
