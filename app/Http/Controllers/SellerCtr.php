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
use App\Models\model_address;
//MAIL
use App\Mail\VerificationMail;
use App\model_dretur;
//ADDON LIBRARY
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SellerCtr extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function myItem(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['sneaker'] = model_sneaker::where('id_user',$data['user_logon']->id_user)->get();
        $data['kategori'] = model_kategori::get();
        return view('seller/myitem',$data);
    }

    public function addItem(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['msg'] = "add";
        $data['kategori'] = model_kategori::get();

        return view('seller/addedititem',$data);
    }

    public function handleNewItem(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $validate = $req->validate([
            'nama' => ['required'],
            'brand' => ['required'],
            'kategori' => ['required'],
            'harga' => ['required'],
        ]);
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];

        $param = [
            'id_sneaker' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_kategori' => $kategori,
            'brand_sneaker' => $brand,
            'nama_sneaker' => $nama,
            'harga_sneaker' => $harga
        ];
        model_sneaker::create($param);
        $up_s = model_sneaker::orderBy('id_sneaker','desc')->first();

        $file = $req->file('img-def');
        $des = public_path().'/assets/images/sneakers/';
        $file->move($des,$up_s->id_sneaker.'-left.jpg');

        if(!empty($req->file('img-up'))){
            $file = $req->file('img-up');
            $des = public_path().'/assets/images/sneakers/';
            $file->move($des,$up_s->id_sneaker.'-top.jpg');
        }

        if(!empty($req->file('img-back'))){
            $file = $req->file('img-back');
            $des = public_path().'/assets/images/sneakers/';
            $file->move($des,$up_s->id_sneaker.'-right.jpg');
        }
        return redirect('myItem');
    }

    public function editItem(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['msg'] = "edit";
        $data['sneaker'] = model_sneaker::where('id_sneaker',$_GET['id_sneaker'])->first();
        $data['kategori'] = model_kategori::get();
        $data['dsneaker'] = model_dsneaker::where('id_sneaker',$_GET['id_sneaker'])->get();

        return view('seller/addedititem',$data);
    }

    public function handleEditItem(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $validate = $req->validate([
            'nama' => ['required'],
            'brand' => ['required'],
            'kategori' => ['required'],
            'harga' => ['required']
        ]);
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];

        $param = [
            'id_kategori' => $kategori,
            'brand_sneaker' => $brand,
            'nama_sneaker' => $nama,
            'harga_sneaker' => $harga
        ];
        model_sneaker::where('id_sneaker',$_POST['id_sneaker'])->update($param);
        $up_s = model_sneaker::where('id_sneaker',$_POST['id_sneaker'])->first();

        //UPLOAD IMAGE
        if(!empty($req->file('img-def'))){
            $file = $req->file('img-def');
            $des = public_path().'/assets/images/sneakers/';
            $file->move($des,$up_s->id_sneaker.'-side.jpeg');
        }

        if(!empty($req->file('img-up'))){
            $file = $req->file('img-up');
            $des = public_path().'/assets/images/sneakers/';
            $file->move($des,$up_s->id_sneaker.'-up.jpeg');
        }

        if(!empty($req->file('img-back'))){
            $file = $req->file('img-back');
            $des = public_path().'/assets/images/sneakers/';
            $file->move($des,$up_s->id_sneaker.'-back.jpeg');
        }

        return redirect('myItem');
    }

    public function deleteItem(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_sneaker=$_GET['id_sneaker'];

        model_sneaker::where('id_sneaker',$id_sneaker)->delete();
        return redirect('myItem');
    }

    public function addDsneaker(Request $req){
        $id_sneaker = $_POST['id_sneaker'];

        $validate = $req->validate([
            'warna' => ['required'],
            'ukuran' => ['required']
        ]);
        $warna = $_POST['warna'];
        $ukuran = $_POST['ukuran'];

        $param = [
            'id_dsneaker' => null,
            'id_sneaker' => $id_sneaker,
            'warna_sneaker' => $warna,
            'ukuran_sneaker' => $ukuran,
            'status_stok' => 1
        ];

        model_dsneaker::create($param);

        return redirect('myItem');
    }

    public function deleteDsneaker(Request $req){
        $id_dsneaker = $_POST['id_dsneaker'];

        model_dsneaker::where('id_dsneaker',$id_dsneaker)->delete();

        return redirect('myItem');
    }

    public function myOrderAdmin(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data['user'] = model_user::get();
        $data['htrans'] = model_htrans::where('id_seller',$data['user_logon']->id_user)->get();
        $data['provinsi'] = model_provinsi::get();
        $data['kota'] = model_kota::get();
        $data['address'] = model_address::get();


        return view('seller/myorderadmin',$data);
    }

    public function responPengembalian(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_trans = $_POST['id_trans'];
        $id_seller = $_POST['id_seller'];
        $ctr = $_POST['ctr'];
        for ($i=0; $i < $ctr; $i++) {
            $respon = $_POST['respon-'.$i];
            $note = "";
            if(isset($_POST['note-'.$i])){
                $note = $_POST['note-'.$i];
            }
            $id_dsneaker = $_POST['id_dsneaker-'.$i];

            if($respon == "terima"){
                $respon = "DITERIMA";
            }else{
                $respon = "DITOLAK";
            }

            model_dretur::where('id_transaksi',$id_trans)->where('id_dsneaker',$id_dsneaker)->update(['status_pengembalian' => $respon, 'resi_pengembalian' => $note]);
            model_htrans::where('id_transaksi',$id_trans)->update(['status_pengiriman' => 'PENGEMBALIAN DIRESPON']);
        }

        return redirect('myOrderAdmin');
    }

    public function detailOrderSeller(request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_trans = $_GET['id_trans'];
        $data['htrans'] = model_htrans::where('id_transaksi',$id_trans)->first();
        $data['dtrans'] = model_dtrans::where('id_transaksi',$id_trans)->get();
        $data['provinsi'] = model_provinsi::get();
        $data['kota'] = model_kota::get();
        $data['address'] = model_address::get();
        $data['user'] = model_user::get();
        $data['sneaker'] = model_sneaker::get();
        $data['dsneaker'] = model_dsneaker::get();
        $data['dretur'] = model_dretur::where('id_transaksi',$id_trans)->get();

        return view('seller/detailmyorder',$data);
    }

    public function konfirmasiPengembalian(Request $req){
        $id_trans = $_POST['id_trans'];

        model_htrans::where('id_transaksi',$id_trans)->update(['status_pengiriman' => 'DIKEMBALIKAN']);

        return redirect('myOrderAdmin');
    }

    public function konfirmasiPengiriman(Request $req){
        $id_trans = $_POST['id_trans'];

        $validate = $req->validate([
            'img-resi' => ['required'],
            'resi' => ['required']
        ]);
        $resi = $_POST['resi'];

        if(!empty($req->file('img-resi'))){
            $file = $req->file('img-resi');
            $des = public_path().'/assets/images/transaksi/';
            $file->move($des,'resi-'.$id_trans.'.jpg');
        }

        model_htrans::where('id_transaksi',$id_trans)->update(['status_pengiriman' => 'SENDING','resi' => $resi]);

        return redirect('myOrderAdmin');
    }
}
