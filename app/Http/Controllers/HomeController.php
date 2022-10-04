<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // dd(Auth::user());

        $campus = Campus::all();

        $data = [
            'campus' => $campus,
            'user' => Auth::user(),
        ];

        if (Auth::user()->role == 0) {

            return view('student.dashboard', $data);
        }
    }
}