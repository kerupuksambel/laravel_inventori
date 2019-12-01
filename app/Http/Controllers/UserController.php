<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Users;

class UserController extends Controller
{
    public function view()
    {
        $data = Users::all();
        $page_now = 'user/view';

        return view('user.view', ['data' => $data, 'page_now' => $page_now]);
    }

    public function create_post(Request $request)
    {
        // dd($request);   

        $req = $request->validate([
            'user_name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'user_role' => 'required',
            'password' => 'required'
        ]);

        $sent = [
            'user_name' => $req['user_name'],
            'email' => $req['email'],
            'user_role' => $req['user_role'],
            'password' => Hash::make($req['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]; 
        Users::create($sent);
        
        return redirect('/'.Auth::user()->user_role.'/user/view')
        ->with('msg', 'User sudah ditambahkan.')
        ->with('type', 'primary');
    }
    
    public function create()
    {
        $page_now = 'user/add';

        return view('user.create', ['page_now' => $page_now]);
    }

    public function edit($id)
    {
        $res = Users::where('id', $id)->first();
        return view('user.update', ['user' => $res]);
    }

    public function edit_post($id, Request $request){
        $b = Users::find($id);
        $b->updated_at = date('Y-m-d H:i:s');   
        if(!is_null($request['user_name'])){
            $b->user_name = $request['user_name'];
        }
        if(!is_null($request['email'])){
            $b->email = $request['email'];
        }

        if(!is_null($request['user_role'])){
            $b->user_role = $request['user_role'];
        }
        if(!is_null($request['password'])){
            $b->password = Hash::make($request['password']);
        }
        $b->save();
        
        return redirect('/'.Auth::user()->user_role.'/user/view')
        ->with('msg', 'User sudah diedit.')
        ->with('type', 'info');
    }

    public function delete_post($id)
    {
        if($id != Auth::user()->id){
            $b = Users::find($id);
            $b->delete();

            return redirect('/'.Auth::user()->user_role.'/user/view')
            ->with('msg', 'User sudah dihapus.')
            ->with('type', 'danger');
        }else{
            return redirect('/'.Auth::user()->user_role.'/user/view')
            ->with('msg', 'Tidak bisa menghapus akun sendiri.')
            ->with('type', 'danger');
        }

    }
}
