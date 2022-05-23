<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $titles = Title::with('courses')->get();

        return view('teachers.dashboard', ['titles' => $titles]);
    }
}
