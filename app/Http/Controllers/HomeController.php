<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $isHost = isset($request->user()->host);

        return $isHost ? view('hosts.my-houses') : view('cleaners.my-cleanings');
    }
}
