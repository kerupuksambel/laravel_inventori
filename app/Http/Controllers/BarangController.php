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
            $data[$key]->barang_creator_name = $data[$key]->find(1)->barang_creator_name->user_name;
        }

        return view('barang.view', ['data' => $data, 'page_now' => $page_now]);
    }

    public function create_post(Request $request)
    {
        // dd($request);
        $sent = [
            'barang_nama' => $request->barang_nama,
            'barang_harga' => $request->barang_harga,
            'barang_stok' => $request->barang_stok,
            'barang_creator_id' => Auth::user()->id,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        
        return redirect('/'.Auth::user()->user_role.'/barang/view');
        Barang::create($sent);

    }
    
    public function create()
    {
        $page_now = 'barang/add';

        return view('barang.create');
    }
}
