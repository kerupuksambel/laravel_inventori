<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
class TeacherController extends Controller
{
    public function teacherPage()
    {
        $assignments = Assignment::all();
        return view('teacher',compact('assignments'));
    }
}
