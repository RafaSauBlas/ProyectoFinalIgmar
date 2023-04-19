<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disco;

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
        $discos = Disco::paginate();
        // return view('home');
        return view('home', compact('discos'))
            ->with('i', (request()->input('page', 1) - 1) * $discos->perPage());
    }
}
