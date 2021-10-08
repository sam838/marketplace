<?php

namespace App\Http\Controllers;
//MODELS
use App\Models\model_chat;
use App\Models\model_dsneaker;
use App\Models\model_dtrans;
use App\Models\model_htrans;
use App\Models\model_kategori;
use App\Models\model_kota;
use App\Models\model_post;
use App\Models\model_provinsi;
use App\Models\model_retur;
use App\Models\model_review_post;
use App\Models\model_review_sneaker;
use App\Models\model_sneaker;
use App\Models\model_user;
use App\Models\model_wishlist;

//ADDON LIBRARY
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminCtr extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function masterUser(Request $req){
        $tipe = "";
        $search = "";
        if(isset($_POST['tipe'])){
            $tipe = $_POST['tipe'];
        }
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        $data['user'] = model_user::where('username','LIKE','%'.$search.'%')->where('jenis_user','LIKE','%'.$tipe.'%')->get();
        return view('admin/masteruser',$data);
    }

    public function masterBarang(Request $req){
        $search = "";
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        $data['dsneaker'] = model_dsneaker::get();
        $data['dtrans'] = model_dtrans::get();
        $data['user'] = model_user::get();
        $data['sneaker'] = model_sneaker::get();
        return view('admin/masterbarang',$data);
    }

    public function masterForum(Request $req){
        $search = "";
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        $data['post'] = model_post::get();
        $data['user'] = model_user::get();
        return view('admin/masterforum',$data);
    }

    public function masterTrans(Request $req){
        $data['htrans'] = model_htrans::get();
        $data['user'] = model_user::get();

        return view('admin/mastertransaksi',$data);
    }

    public function editSlider(Request $req){
        return view('admin/editslider');
    }

    public function masterRpost(Request $req){
        $data['post'] = model_post::get();
        $data['rpost'] = model_review_post::get();
        $data['user'] = model_user::get();

        return view('admin/masterrpost',$data);
    }

    public function masterRsneaker(Request $req){
        $data['barang'] = model_sneaker::get();
        $data['rbarang'] = model_review_sneaker::get();
        $data['user'] = model_user::get();

        return view('admin/masterrsneaker',$data);
    }
}
