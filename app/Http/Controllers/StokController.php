<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Barang;

class StokController extends Controller
{
    public function view()
    {
        $page_now = 'stok';

        $data = Barang::all();

        return view('stok.view', ['page_now' => $page_now, 'data' => $data]);
    }

    public function add(Request $request)
    {
        $page_now = 'stok';

        $flag = FALSE;
        foreach ($request->all() as $key => $value) {
            if($input_name = explode('-', $key)){
                if($input_name[0] === 'barang'){
                    $input_id = $input_name[1];

                    $barang = Barang::find($input_id);
                    if($barang && $value > 0){
                        $barang->barang_stok += $value;
                        $barang->save();
                        $flag = TRUE;
                    }
                }
            }
        }

        if($flag){
            return redirect('/'.Auth::user()->user_role.'/barang/view')->with('type', 'primary')->with('msg', 'Stok barang sudah diupdate.');
        }else{
            return redirect('/'.Auth::user()->user_role.'/barang/view')->with('type', 'info')->with('msg', 'Tidak ada yang perlu diupdate.');
        }
        // foreach ($request)
    }
}
