<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $users = (new User)->getUserQualifications();

        return response()->view('students.dashboard', ['users' => $users]);
    }
}
