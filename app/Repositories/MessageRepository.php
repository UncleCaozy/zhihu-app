<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 10:46
 */

namespace App\Repositories;


use App\Message;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Auth;

class MessageRepository
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }

    public function dialog()
    {
        return Message::where('to_user_id',Auth::id())
            ->orwhere('from_user_id',Auth::id())
            ->with(['fromUser','toUser'])->latest()->get();
    }

    public function showDialog($dialogId)
    {
        return Message::where('dialog_id',$dialogId)->latest()->paginate(5);
    }


    public function getSingleMessageBy($dialogId)
    {
        return Message::where('dialog_id',$dialogId)->first();
    }



}