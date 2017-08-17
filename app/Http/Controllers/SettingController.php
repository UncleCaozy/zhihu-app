<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        return view('users.setting');
    }

    public function page()
    {
        return view('users.self_page');
    }

    public function store(Request $request)
    {
        Auth::user()->update([
            'city' => $request->get('city'),
            'job' => $request->get('job'),
            'love' => $request->get('love'),
            'introduce' => $request->get('introduce'),
            'page' => $request->get('page'),
            'tel' => $request->get('tel'),
        ]);
        return view('users.self_page');
    }
}
