<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function uploadAssignment(Request $request)
    {
        //semua gambar disimpan di storage, path disimpan di array dan array nya dijadiin string
        dd($request->image);
        $paths =[];
        foreach ($request->image as $image) {
            $path = $image->store('public/image/assignment');
            array_push($paths, str_replace('public/', '', $path));
        }

        Assignment::create([
            'nama' => $request->grade,
            'paths' => implode('|',$paths)
        ]);
        return redirect()->back();
    }


}
