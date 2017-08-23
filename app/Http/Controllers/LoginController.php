<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Overtrue\Socialite\SocialiteManager;

class LoginController extends Controller
{
    protected $config = [
        'github' => [
            'client_id'     => 'fe2025873264af48993d',
            'client_secret' => '44752e174c85b3bd4be375a5f34e0dc5afd932cc',
            'redirect'      => 'http://localhost/github/login',
        ],
    ];
    public function github()
    {
        $socialite = new SocialiteManager($this->config);

        return $socialite->driver('github')->redirect();
    }

    public function githubLogin()
    {
        $socialite = new SocialiteManager($this->config);
        $githubUser =$socialite->driver('github')->user();
        $user = User::create([
           'name'=>$githubUser->getNickname(),
            'email'=>$githubUser->getEmail(),
            'avatar' => '/image/avatars/default.png',
            'confirmation_token' =>str_random(40),
            'password' => bcrypt(str_random(60)),
            'api_token' => str_random(60),
        ]);
        Auth::login($user);

        return redirect('/');
    }
}
