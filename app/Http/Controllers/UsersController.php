<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    protected $questions;

    public function __construct(UserRepository $questions)
    {
        $this->questions = $questions;
    }

    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('img');
        $filename = md5(time().Auth::id()).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('image/avatars'),$filename);

        Auth::user()->avatar = '/image/avatars/'.$filename;
        Auth::user()->save();

        return ['url'=>Auth::user()->avatar];
    }

    public function my_questions()
    {
        $questions = $this->questions->my_questions();
        return view('users.my_questions',compact('questions'));
    }

    public function questions_followed()
    {
        return view('users.my_followed_questions');
    }

}
