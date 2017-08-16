<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    protected $message;

    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }

    public function store()
    {
        $message = $this->message->create([
            'to_user_id'=>request('user'),
            'from_user_id'=>Auth::guard('api')->user()->id,
            'body'=>request('body'),
            'dialog_id'=>time().Auth::id()
//            'dialog_id'=>(user('api')->id+request('user')).(0).(user('api')->id*request('user'))
        ]);
        if($message){
            return response()->json(['status'=>true]);
        }
        return response()->json(['status'=>false]);
    }
}
