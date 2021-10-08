<?php

namespace App\Http\Controllers;
//MODELS

use App\model_cart;
use App\model_dretur;
use App\Models\model_address;
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
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//ADDON LIBRARY
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Throwable;

class CustCtr extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function removewishlist ($id)
    {
        $data["user_logon"] = Session::get('user_logon');
        model_wishlist::where([['id_dsneaker',$id],["id_user",$data["user_logon"]->id_user]])->delete();
        return redirect('/goWishlist');
    }
    public function addtowishlist ($id)
    {
        if(Session::exists('user_logon'))
        {
            $data['user_logon'] = Session::get('user_logon');
        }

        $param = [
            'id_wishlist' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_dsneaker' =>$id
        ];

        model_wishlist::create($param);
        return redirect('/goWishlist');
    }
    public function handleBarang(Request $req){

        if(isset($_POST['btnDetail']))
        {
            return redirect('/detailSneaker/'.$_POST['id_sneaker']);
        }
        else
        {
            $data['user_logon'] = null;
            if(Session::exists('user_logon'))
            {
                $data['user_logon'] = Session::get('user_logon');
            }

            $param = [
                'id_wishlist' => null,
                'id_user' => $data['user_logon']->id_user,
                'id_dsneaker' => $_POST['id_sneaker']
            ];

            model_wishlist::create($param);
            return redirect('/goWishlist');
        }
    }

    public function myPost(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['user'] = model_user::get();
        $data['post'] = model_post::where('id_user',$data['user_logon']->id_user)->get();

        return view('mypost',$data);
    }

    public function detailSneaker($id_sneaker){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data['rsneaker'] = model_review_sneaker::where('id_sneaker',$id_sneaker)->get();
        $data['allUser'] = model_user::get();
        $data["sneaker"] = model_sneaker::where('id_sneaker',$id_sneaker)->first();
        $data["kategori"] = model_kategori::where('id_kategori',$data["sneaker"]->id_kategori)->first();
        $data["dsneaker"] = model_dsneaker::where('id_sneaker',$id_sneaker)->get();
        $data['size'] = model_dsneaker::select('ukuran_sneaker')->distinct()->where('id_sneaker',$id_sneaker)->get();
        return view('detailshop',$data);
    }

    public function saveEpost(Request $req){
        $validate = $req->validate([
            'id_post' => ['required'],
            'judul_post' => ['required'],
            'isi_post' => ['required']
        ]);
        $id_post = $_POST['id_post'];
        $judul_post = $_POST['judul_post'];
        $isi_post = $_POST['isi_post'];

        model_post::where('id_post',$id_post)->update(['judul_post'=>$judul_post,'caption_post'=>$isi_post]);

        return redirect('myPost');
    }

    public function editPost(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_post = $_GET['id_post'];
        $data['post'] = model_post::where('id_post',$id_post)->first();
        $data['rpost'] = model_review_post::where('id_post',$id_post)->get();
        $data['user'] = model_user::get();

        return view ('editpost',$data);
    }

    public function addtocartfromwishlist($id)
    {
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_sneaker = $id;
        $qty = 1;
        $data['grandtotal'] = 0;
        $s_sneaker = model_sneaker::where('id_sneaker',$id_sneaker)->first();
        $s_dsneaker = model_dsneaker::where('id_sneaker',$id_sneaker)->first();
        $myCart = model_cart::where('id_user',$data['user_logon']->id_user)->get();

        $ada = false;
        $bedauser = false;
        foreach ($myCart as $c) {
            if($c->id_seller != $s_sneaker->id_user){
                $ada = false;
                $bedauser = true;
            break;
            }else{
                if($c->id_dsneaker == $s_dsneaker->id_dsneaker){
                    $ada = true;
                    $thisc = model_cart::where('id_cart',$c->id_cart)->first();
                    $qty += $thisc->jumlah;
                    $subtotal = $qty*intval($s_sneaker->harga_sneaker);
                    model_cart::where('id_cart',$c->id_cart)->update(['jumlah'=>$qty,'subtotal'=>$subtotal]);
                }
            }
        }
        if($bedauser){
            model_cart::where('id_user',$data['user_logon']->id_user)->delete();
        }
        if(!$ada){
            $subtotal = $qty*intval($s_sneaker->harga_sneaker);
            model_cart::create([
                'id_cart' => null,
                'id_dsneaker' => $s_dsneaker->id_dsneaker,
                'id_user' => $data['user_logon']->id_user,
                'jumlah' => $qty,
                'subtotal' => $subtotal,
                'id_seller' => $s_sneaker->id_user
            ]);
        }

        if($bedauser){
            return redirect('/myCart/bedauser');
        }else{
            return redirect('/myCart/none');
        }
    }
    public function handleCart(Request $req){
        $validate = $req->validate([
            'size' => ['required']
        ]);
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_sneaker = $_POST['id_sneaker'];
        $qty = 1;
        $size = $_POST['size'];
        $user = model_user::get();
        $data['grandtotal'] = 0;
        $s_sneaker = model_sneaker::where('id_sneaker',$id_sneaker)->first();
        $s_dsneaker = model_dsneaker::where('id_sneaker',$id_sneaker)->where('ukuran_sneaker',$size)->first();
        $myCart = model_cart::where('id_user',$data['user_logon']->id_user)->get();

        $ada = false;
        $bedauser = false;
        foreach ($myCart as $c) {
            if($c->id_seller != $s_sneaker->id_user){
                $ada = false;
                $bedauser = true;
            break;
            }else{
                if($c->id_dsneaker == $s_dsneaker->id_dsneaker){
                    $ada = true;
                    $thisc = model_cart::where('id_cart',$c->id_cart)->first();
                    $qty += $thisc->jumlah;
                    $subtotal = $qty*intval($s_sneaker->harga_sneaker);
                    model_cart::where('id_cart',$c->id_cart)->update(['jumlah'=>$qty,'subtotal'=>$subtotal]);
                }
            }
        }
        if($bedauser){
            model_cart::where('id_user',$data['user_logon']->id_user)->delete();
        }
        if(!$ada){
            $subtotal = $qty*intval($s_sneaker->harga_sneaker);
            model_cart::create([
                'id_cart' => null,
                'id_dsneaker' => $s_dsneaker->id_dsneaker,
                'id_user' => $data['user_logon']->id_user,
                'jumlah' => $qty,
                'subtotal' => $subtotal,
                'id_seller' => $s_sneaker->id_user
            ]);
        }

        if($bedauser){
            return redirect('/myCart/bedauser');
        }else{
            return redirect('/myCart/none');
        }
    }

    public function goCart(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
            $myCart = model_cart::where('id_user',$data['user_logon']->id_user)->get();
        }

        try{
            if(count($myCart)> 0){
                return redirect('/myCart/none');
            }else{
                return redirect('/myCart/kosong');
            }
        }
        catch(Throwable $x)
        {
            return back();
        }
    }

    public function goCheckout(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data['user'] = model_user::get();
        $data['id_seller'] = 0;
        $data['grandtotal'] = 0;
        $data['jumlah'] = 0;
        $data['dsneaker'] = model_dsneaker::get();
        $data['sneaker'] = model_sneaker::get();
        $data['cart'] = model_cart::where('id_user',$data['user_logon']->id_user)->get();
        $data['address'] = model_address::where('id_user',$data['user_logon']->id_user)->get();
        $data['kota'] = model_kota::get();
        $data['provinsi'] = model_provinsi::get();
        foreach ($data['cart'] as $c) {
            $data['jumlah'] += $c->jumlah;
            $data['grandtotal'] += $c->subtotal;
            $data['id_seller'] = $c->id_seller;
        }

        return view('checkout',$data);
    }

    public function konfirmasiPenerimaan(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $ctr = $_POST['ctr'];
        $id_user = $data['user_logon']->id_user;
        $id_transaksi = $_POST['id_trans'];

        for ($i=0; $i < $ctr; $i++) {
            $komentar = "";
            $rate = -1;
            $nambahReview = false;
            if(!empty($req->file('img-terima-'.$i))){
                $nambahReview = true;
                $file = $req->file('img-terima-'.$i);
                $des = public_path().'/assets/images/transaksi/';
                $file->move($des,'transaksi-'.$id_transaksi.'terima-'.$i.'.jpg');
            }
            if(isset($_POST['komentar-'.$i])){
                if(!empty($_POST['komentar-'.$i])){
                    $nambahReview = true;
                    $komentar = $_POST['komentar-'.$i];
                }
            }
            if(isset($_POST['rate-'.$i])){
                if(!empty($_POST['rate-'.$i])){
                    $nambahReview = true;
                    $rate = $_POST['rate-'.$i];
                }
            }

            if($nambahReview){
                $params = [
                    'id_rsneaker' => null,
                    'id_sneaker' => $_POST['id_sneaker-'.$i],
                    'id_user' => $id_user,
                    'rate' => $rate,
                    'komentar_sneaker' => $komentar
                ];
                model_review_sneaker::create($params);
            }
        }
        model_htrans::where('id_transaksi',$id_transaksi)->update(['status_pengiriman' => 'DONE']);

        return redirect('goMyorder');
    }

    public function myCart($msg){
        $data['user_logon'] = null;
        $data['grandtotal'] = 0;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['id_seller'] = 0;
        $data['user'] = model_user::get();
        $data['sneaker'] = model_sneaker::get();
        $data['dsneaker'] = model_dsneaker::get();
        $data['cart'] = model_cart::where('id_user',$data['user_logon']->id_user)->get();

        $data['bedauser'] = null;
        if($msg == "bedauser"){
            $data['bedauser'] = Session::flash('userbeda','Membuat cart baru karena order pada seller yang berbeda.');
        }else if($msg == 'kosong'){
            $data['bedauser'] = Session::flash('userbeda','Cart kosong. Belanja Sekarang!');
        }

        foreach ($data['cart'] as $c) {
            $data['grandtotal'] += $c->subtotal;
            $data['id_seller'] = $c->id_seller;
        }
        return view('cart',$data);
    }

    public function konfirmasiBayar(Request $req){
        $id_trans = $_POST['id_trans'];

        $validate = $req->validate([
            'img-bukti' => ['required'],
            'referensi' => ['required']
        ]);
        $resi = $_POST['referensi'];

        if(!empty($req->file('img-bukti'))){
            $file = $req->file('img-bukti');
            $des = public_path().'/assets/images/transaksi/';
            $file->move($des,'bukti-'.$id_trans.'.jpg');
        }

        model_htrans::where('id_transaksi',$id_trans)->update(['status_pengiriman' => 'DIKEMAS','resi' => $resi]);

        return redirect('goMyorder');
    }

    public function ajukanPengembalian(Request $req){
        $adBarang = false;
        $ctr = $_POST['ctr'];
        $id_trans = $_POST['id_trans'];

        for ($i=0; $i < $ctr; $i++) {
            if(isset($_POST['list-kembali-'.$i])){
                $adBarang = true;
                $alasan = "";
                $jumlah = $_POST['qty-'.$i];
                $id_dsneaker = $_POST['list-kembali-'.$i];
                $id_seller = $_POST['id_seller'];

                if(isset($_POST['alasan-'.$i])){
                    $alasan = $_POST['alasan-'.$i];
                }
                if(!empty($req->file('foto_kembali-'.$i))){
                    $file = $req->file('foto_kembali-'.$i);
                    $des = public_path().'/assets/images/transaksi/';
                    $file->move($des,'foto_kembali-'.$id_trans.'-'.$id_dsneaker.'.jpg');
                }

                $param = [
                    'id_transaksi' => $id_trans,
                    'id_dsneaker' => $id_dsneaker,
                    'jumlah' => $jumlah,
                    'alasan_pengembalian' => $alasan,
                    'status_pengembalian' => 'AJUAN',
                    'resi_pengembalian' => 'none',
                    'id_seller' => $id_seller
                ];
                model_dretur::create($param);
            }
        }

        if($adBarang){
            model_htrans::where('id_transaksi',$id_trans)->update(['status_pengiriman'=>'KEMBALI']);
            return redirect('goMyorder');
        }else{
            return redirect('goMyorder');
        }
    }

    public function kirimPengembalian(Request $req){
        $id_trans = $_POST['id_trans'];

        $validate = $req->validate([
            'resi' => ['required']
        ]);
        $resi = $_POST['resi'];

        model_htrans::where('id_transaksi',$id_trans)->update(['status_pengiriman' => 'SENDING PENGEMBALIAN','resi' => $resi]);

        return redirect('goMyorder');
    }

    public function clearCart(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        model_cart::where('id_user',$data['user_logon']->id_user)->delete();
        return redirect('/myCart/kosong');
    }

    public function saveTransaksi(Request $req){
        $validate = $req->validate([
            'kirim' => ['required'],
            'addr_selected' => ['required'],
            'id_seller' => ['required'],
            'total' => ['required'],
            'jumlah' => ['required'],
        ]);



        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $s_address = model_address::where('id_addr',$_POST['addr_selected'])->first();
        $s_kota = model_kota::where('id_kota',$s_address->id_kota)->first();


        $params = [
            'id_cart' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_kota' => $s_kota->id_kota,
            'tgl_beli' => date("Y/m/d"),
            'jumlah_barang' => $_POST['jumlah'],
            'total' => $_POST['total'],
            'detail_pengiriman' => 'none',
            'status_pengiriman' => 'BAYAR',
            'biaya_pengiriman' => $_POST['kirim'],
            'id_seller' => $_POST['id_seller'],
            'id_addr' => $_POST['addr_selected'],
            'resi' => 'none'
        ];

        model_htrans::create($params);

        $last_trans = model_htrans::orderBy('id_transaksi','desc')->first();
        $id_trans = $last_trans->id_transaksi;

        $cart = model_cart::where('id_user',$data['user_logon']->id_user)->get();

        foreach ($cart as $c) {
            $param = [
                'id_transaksi' => $id_trans,
                'id_dsneaker' => $c->id_dsneaker,
                'jumlah' => $c->jumlah,
                'subtotal' => $c->subtotal
            ];

            model_dtrans::create($param);
        }

        model_cart::where('id_user',$data['user_logon']->id_user)->delete();

        return redirect('goMyorder');
    }
}
