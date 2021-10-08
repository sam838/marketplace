<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PrototypeCtr extends BaseController
{
    public function tryAddressbook(Request $request)
    {
        return view('addressbook');
    }

    public function tryCart(Request $request)
    {
        return view('cart');
    }

    public function tryChat(Request $request)
    {
        return view('chat');
    }

    public function tryAccdash(Request $request)
    {
        return view('accdash');
    }

    public function tryDetailshop(Request $request)
    {
        return view('detailshop');
    }

    public function tryDhistory(Request $request)
    {
        return view('dhistory');
    }

    public function tryDpost(Request $request)
    {
        return view('dpost');
    }

    public function tryEditacc(Request $request)
    {
        return view('editacc');
    }

    public function tryEditpost(Request $request)
    {
        return view('editpost');
    }

    public function tryForum(Request $request)
    {
        return view('forum');
    }

    public function tryHome(Request $request)
    {
        return view('home');
    }

    public function tryLogin(Request $request)
    {
        return view('login');
    }

    public function tryMypost(Request $request)
    {
        return view('mypost');
    }

    public function tryMyorder(Request $request)
    {
        return view('myorder');
    }

    public function tryPayment(Request $request)
    {
        return view('payment');
    }

    public function tryPost(Request $request)
    {
        return view('post');
    }

    public function tryRetur(Request $request)
    {
        return view('retur');
    }

    public function tryReviewcart(Request $request)
    {
        return view('reviewcart');
    }

    public function tryShippinginfo(Request $request)
    {
        return view('shippinginfo');
    }

    public function tryShippingmethod(Request $request)
    {
        return view('shippingmethod');
    }

    public function tryShop(Request $request)
    {
        return view('shop');
    }

    public function trySignup(Request $request)
    {
        return view('signup');
    }

    public function tryVer_signup(Request $request)
    {
        return view('ver_signup');
    }

    public function tryWishlist(Request $request)
    {
        return view('wishlist');
    }
}
