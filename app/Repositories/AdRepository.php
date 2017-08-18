<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/18
 * Time: 14:37
 */

namespace App\Repositories;


use App\Ad;

class AdRepository
{
    public function findAdPic()
    {
       return Ad::first();
    }
}