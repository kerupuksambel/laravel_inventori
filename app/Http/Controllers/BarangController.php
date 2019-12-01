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
            $data[$key]->gambar = FileBarang::where('gambar_barang_id', $record->barang_id)->select('gambar_path')->get();
        }

        return view('barang.view', ['data' => $data, 'page_now' => $page_now]);
    }

    public function create_post(Request $request)
    {
        // dd($request);   

        $req = $request->validate([
            'barang_nama' => 'required',
            'barang_harga' => 'required|numeric',
            'barang_stok' => 'required|numeric'
        ]);

        $sent = [
            'barang_nama' => $req['barang_nama'],
            'barang_harga' => $req['barang_harga'],
            'barang_stok' => $req['barang_stok'],
            'barang_creator_id' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]; 
        Barang::create($sent);
        $id = Barang::latest('barang_id')->first()->barang_id;
        
        $file_sent = array();
        
        foreach($request->all() as $key => $r){
            if(preg_match('/(?<name>\w+)-(?<digit>\d+)/', $key, $matches)){
                $request->validate([
                    $key => 'nullable|image'
                ]);
                if($request->$key != NULL){
                    $path = '/storage/img/';
                    $filename = md5($request->file($key)->getClientOriginalName()).'-'.date('Ymdhis').'.'.$request->file($key)->getClientOriginalExtension();
                    array_push($file_sent, [
                        'gambar_barang_id' => $id,
                        'gambar_path' => $path.$filename,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    $request->file($key)->storeAs('public/img/', $filename);
                }
            }
        }

        FileBarang::insert($file_sent);
        
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

        $b = Barang::find($id);
        $b->updated_at = date('Y-m-d H:i:s');
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
