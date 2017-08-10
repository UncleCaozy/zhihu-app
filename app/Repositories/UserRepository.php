<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10
 * Time: 14:17
 */

namespace App\Repositories;
use App\User;

class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }
}