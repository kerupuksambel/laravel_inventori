<?php

namespace App\Http\Controllers;
use App\kavling;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    function userPost (Request $request) {
        dd($request->input());
        $nama = $request->input('nama');
        return 'User '.$nama;
    }

    function userGet ($id, $umur) {
        return 'User '.$id.'<br>'.'Umur '.$umur;
    }

    public function tambah_kavling(Request $r)
    {
        // dd($r->input());return;
        $post = new Kavling;
        $post->nama = $r->input('nama');
        $post->email= $r->input('email');
        $post->save();
        return Redirect::back();  
    }

    public function read_kavling($id)
    {

        $satudata = Kavling::find($id);
        // dd($satudata);

        // $arr = [
        //     'id' => $id,
        //     'nama' => 'ini nama'
        // ];

        return view('satu',compact('satudata'));
    }
    
    public function all_kavling(){
        $title = "INI LIST NYA SEMUA";
        $data = Kavling::all();
        return view('all')->with('datadepan',$data)->with('title',$title);
    }

    public function delete_kavling($id){
        $hehe = Kavling::find($id);
        $hehe->delete();
        return Redirect::back();
    }

    public function show_update_kavling($id){
        $hehe = Kavling::find($id);
        
        return view('edit')->with('hehe',$hehe);
    }

    public function update_kavling(Request $haha){
        // dd($haha);
        $post = Kavling::find($haha->id_kavling);
        
        $post->nama = $haha->input('nama');
        $post->email= $haha->input('email');

        $post->save();
        
        return Redirect::back();
    }
    
}
