<?php

namespace App\Http\Controllers;

use App\Repositories\AdRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PublishAdController extends Controller
{
    protected $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function index()
    {
        $ad_pic = $this->adRepository->findAdPic();

        return view('ads.publish_ad',compact('ad_pic'));
    }


    public function publish_ad(Request $request)
    {
        $file = $request->file('img');
        $filename = md5(time().Auth::id()).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('image'),$filename);

        $ad_pic = $this->adRepository->findAdPic();
        $ad_pic->ad_pic = '/image/'.$filename;
        $ad_pic->update();

        return ['url'=> $ad_pic->ad_pic];
    }
}
