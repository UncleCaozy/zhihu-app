<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/15
 * Time: 16:36
 */
namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class MessageCollection extends Collection
{
    public function markAsRead()
    {
        $this->each(function ($message){
            if($message->to_user_id === Auth::id()){
                $message->markAsRead();
            }
        });
    }
}