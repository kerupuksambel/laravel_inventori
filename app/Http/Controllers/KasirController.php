<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\FileBarang;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class KasirController extends Controller
{
    public function view()
    {
        $page_now = 'kasir';

        $data = Barang::all();

        foreach($data as $key => $record){
            $data[$key]->gambar = FileBarang::where('gambar_barang_id', $record->barang_id)->select('gambar_path')->get();
        }
        // dd($data);

        return view('kasir.view', ['page_now' => $page_now, 'data' => $data]);
    }

    public function ajax_search()
    {
        if(Input::get('q')){
            $nama = Input::get('q');
            $res = Barang::where('barang_nama', 'like', '%'.$nama.'%')->select('barang_nama', 'barang_id')->get();
            return response()->json($res);
        }
    }

    public function ajax_result(){
        if(Input::get('id')){
            $id = Input::get('id');
            $res = Barang::where('barang_id', $id)->get();
            $result = array();
            foreach($res as $key => $record){
                $gambar = array();
                $tmp = FileBarang::where('gambar_barang_id', $record->barang_id)->select('gambar_path')->get();
                // dd($tmp);
                foreach($tmp as $r){
                    array_push($gambar, $r['gambar_path']);
                }
                $sub = [
                    'stok' => $record->barang_id,
                    'harga' => $record->barang_harga,
                    'nama' => $record->barang_nama,
                    'gambar' => $gambar,
                ];
                return json_encode($sub);
            }
        }
    }

    public function kasir_post(Request $request)
    {
        $valid = 0;
        foreach($request->all() as $validation){
            if($validation){
                $valid++;
            }
        }
        if($valid > 1){
            $r = array();
            foreach ($request->all() as $key => $record) {
                if(preg_match('/(?<name>\w+)-(?<digit>\d+)/', $key, $parsed)){
                    if($parsed['name'] == 'nama'){
                        $r[$parsed['digit']]['id'] = $record;
                    }elseif($parsed['name'] == 'jumlah'){
                        $r[$parsed['digit']]['jumlah'] = $record;
                    }
                }
            }
            foreach($r as $req){
                if(isset($req['id']) && isset($req['jumlah'])){
                    $barang = Barang::find($req['id']);
                    $barang->barang_stok -= $req['jumlah'];
                    $barang->save();
                }
            }
    
            return redirect('/'.Auth::user()->user_role.'/kasir')
            ->with('msg', 'Transaksi sudah diinput.')
            ->with('type', 'info');
        }else{
            return redirect('/'.Auth::user()->user_role.'/kasir')
            ->with('msg', 'Masukkan minimal 1 transaksi.')
            ->with('type', 'danger');
        }
    }
}
