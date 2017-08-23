<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10
 * Time: 14:17
 */

namespace App\Repositories;
use App\Follow;
use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }

    public function my_questions()
    {
        Return Question::where('user_id',Auth::user()->id)->paginate(5);
    }

    public function my_followed_questions()
    {
        Return Follow::where('user_id',Auth::user()->id)->get();
    }
}