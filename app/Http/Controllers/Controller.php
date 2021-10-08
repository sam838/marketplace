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
use App\Mail\ResetMail;
use App\model_dretur;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//ADDON LIBRARY
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function handleLogout (Request $req)
    {
        if (Session::exists("user_logon"))
        {
            $req->session()->forget('user_logon');
        }
        return redirect ("goLogin");
    }
    public function goHome(Request $req)
    {
        $data['user_logon'] = null;
        $data["sneaker"] = model_sneaker::get();
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        return view('home',$data);
    }

    public function goLogin(Request $req){
        return view('login');
    }

    public function forgot_password(Request $req){
        return view('forgot_password');
    }

    public function handlerLogin(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "admin")
        {
            $data['user_logon'] = "admin";
            Session::put('user_logon', $data['user_logon']);
            return redirect('masterUser');
        }
        else {
            $data['user_logon'] = model_user::where('username',$username)->first();
            if(empty($data['user_logon'])){
                return redirect('goLogin')->with('msg', 'Username not found!')
                    ->withInput();
            }else{
                if (Hash::check($password, $data['user_logon']->password)) {
                    if($data['user_logon']->status_verifikasi == 0){
                        return redirect('sendVerificationMail/'.$data["user_logon"]->email);
                    }else{
                        if ($data['user_logon']->jenis_user == "seller")
                        {
                            Session::put('user_logon', $data['user_logon']);
                            return redirect('/myItem');
                        }
                        Session::put('user_logon', $data['user_logon']);
                        return redirect('/');
                    }
                }else{
                    return redirect('goLogin')->with('msg', 'Invalid password!')
                    ->withInput();
                }
            }
        }
    }

    public function handleAddAdress(Request $req){
        $req->validate([
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required'
        ]);

        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $alamat = $_POST['alamat'];
        $kodepos = $_POST['kodepos'];
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data = [
            'id_addr' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_kota' => $kota,
            'nama_alamat' => $alamat,
            'kode_pos' => $kodepos
        ];
        model_address::create($data);
        return redirect('/goAdress');
    }

    public function goChat(Request $req){
        $data['user_logon'] = null;
        $data['allUser'] = model_user::get();
        $id_tujuan = $req->session()->get('status');
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        if(isset($_POST['id_tujuan'])){
            $id_tujuan = $_POST['id_tujuan'];
        }

        if($data['user_logon'] == null){
            return redirect('/goLogin');
        }else{
            $data['currChat'] = null;
            if($id_tujuan != null){
                $data['currChat'] = model_chat::where('id_user',$data['user_logon']->id_user)->orWhere('id_tujuan',$data['user_logon']->id_user)->get();
                if(count($data['currChat']) == 0){
                    $param = [
                        'id_chat' => null,
                        'id_user' => $data['user_logon']->id_user,
                        'id_tujuan' => $id_tujuan,
                        'isi_chat' => 'init',
                        'tgl_chat' => date("Y/m/d")
                    ];
                    model_chat::create($param);
                }
                $data['currChat'] = model_chat::whereRaw('(id_user = ? AND id_tujuan = ?) OR (id_user = ? AND id_tujuan = ?)',[$data['user_logon']->id_user,$id_tujuan,$id_tujuan,$data['user_logon']->id_user])->get();
            }
            $data['allChat'] = model_chat::selectRaw('case when id_user = ? then id_tujuan when id_tujuan = ? then id_user end as id_tujuan',[$data['user_logon']->id_user,$data['user_logon']->id_user])->where('id_user',$data['user_logon']->id_user)->orWhere('id_tujuan',$data['user_logon']->id_user)->distinct()->get();

            return view('chat',$data);
        }
    }

    public function sendChat(Request $req){
        $req->validate([
            'msg' => ['required']
        ]);
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $msg = $_POST['msg'];
        $id_tujuan = $_POST['id_tujuan'];

        $param = [
            'id_chat' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_tujuan' => $id_tujuan,
            'isi_chat' => $msg,
            'tgl_chat' => date("Y/m/d")
        ];
        model_chat::create($param);
        return redirect('/goChat')->with('status',$id_tujuan);
    }

    public function goAdress(Request $req){
        $data['user_logon'] = null;
        $data["provinsi"] = model_provinsi::orderBy('nama_provinsi','asc')->get();
        $data["kota"] = model_kota::orderBy('nama_kota','asc')->get();
        $data["address"] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data["address"] = model_address::where('id_user',$data["user_logon"]->id_user)->get();

        return view('addressbook',$data);
    }

    public function goMyorder(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data['user'] = model_user::get();
        $data['htrans'] = model_htrans::where('id_user',$data['user_logon']->id_user)->orderBy('updated_at','desc')->get();
        $data['provinsi'] = model_provinsi::get();
        $data['kota'] = model_kota::get();
        $data['address'] = model_address::get();


        return view('myorder',$data);
    }

    public function detailOrderCustomer(Request $req){
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
        $data['sneaker'] = model_sneaker::withTrashed()->get();
        $data['dsneaker'] = model_dsneaker::get();
        $data['dretur'] = model_dretur::where('id_transaksi',$id_trans)->get();

        return view('detailTransaksi',$data);
    }

    public function logout(Request $req){
        Session::forget('user_logon');
        return redirect('/');
    }

    public function dpost(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $id_post = $_POST['id_post'];

        $data['user'] = model_user::get();
        $data['post'] = model_post::where('id_post',$id_post)->first();
        $data['rpost'] = model_review_post::where('id_post',$id_post)->get();

        return view('dpost',$data);
    }

    public function handleRpost(Request $req){
        $req->validate([
            'comment' => ['required']
        ]);

        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $comment = $_POST['comment'];
        $thumbs = $_POST['thumbs'];
        $id_post = $_POST['id_post'];
        $post = model_post::where('id_post',$id_post)->first();
        if($thumbs == "up"){
            $thumbs = 1;
            $tht = intval($post->total_up) + 1;
            model_post::where('id_post',$id_post)->update(['total_up'=>$tht]);
        }else{
            $thumbs = 0;
            $tht = intval($post->total_down) + 1;
            model_post::where('id_post',$id_post)->update(['total_down'=>$tht]);
        }


        $param = [
            'id_rpost' => null,
            'id_user' => $data["user_logon"]->id_user,
            'id_post' => $id_post,
            'komentar_post' => $comment,
            'thumbs' => $thumbs,
            'status_claim' => 0,
            'rpost_up' => 0,
            'rpost_down' => 0
        ];
        model_review_post::create($param);
        $data['user'] = model_user::get();
        $data['post'] = model_post::where('id_post',$id_post)->first();
        $data['rpost'] = model_review_post::where('id_post',$id_post)->get();

        return view('dpost',$data);
    }

    public function goWishlist(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data["wishlist"] = model_wishlist::where('id_user',$data["user_logon"]->id_user)->select('id_dsneaker')->distinct()->get();
        $data["sneaker"] = model_sneaker::get();

        return view('wishlist',$data);
    }

    public function handlePost(Request $req){
        $judul_post = $_POST['judul_post'];
        $isi_post = $_POST['isi_post'];
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $id = $data["user_logon"]->id_user;

        $param = [
            'id_post' => null,
            'id_user' => $id,
            'total_up' => 0,
            'total_down' => 0,
            'tgl_post' => date("Y/m/d"),
            'judul_post' => $judul_post,
            'caption_post' => $isi_post,
            'id_approver' => 0
        ];
        model_post::create($param);
        $curr_post = model_post::orderBy('id_post','desc')->first();
        $file = $req->file('upload');
        $des = public_path().'/assets/images/post/';
        $file->move($des,$curr_post->id_post.'.jpeg');
        return redirect ("/goForum");
    }

    public function goForum(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['user'] = model_user::get();
        $data['post'] = model_post::orderBy('id_post','desc')->get();
        if ($data['user_logon'] == null)
        {
            return back();
        }
        return view('post',$data);
    }

    public function goEditacc(Request $req)
    {
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        return view('editacc',$data);
    }
    public function goAccdash(Request $req)
    {
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        return view('accdash',$data);
    }

    public function handleEditInfo(Request $req)
    {
        $user_logon = Session::get('user_logon');
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $curr_password = $_POST['curr_password'];
        $password = $_POST['new_password'];
        $req->validate([
            'nama' => ['required'],
            'curr_password' => ['required'],
        ]);
        if(Hash::check($curr_password, $user_logon->password))
        {
            if ($_POST['new_password']!="")
            {
                $req->validate([
                    'confirm_password' => ['required','same:new_password']
                ]);
                model_user::where('id_user',$user_logon->id_user)->update([
                    'nama' => $nama,
                    'email' => $email,
                    'password' => Hash::make($password)
                ]);
                $user_logon = model_user::where('id_user',$user_logon->id_user)->first();
                Session::put('user_logon', $user_logon);
                return redirect('goEditacc');
            }
            else if ($_POST['new_password'] == "" && $_POST['confirm_password'] != "")
            {
                return redirect('goEditacc')->with("msgerror","New Password must be filled");
            }
            else
            {
                model_user::where('id_user',$user_logon->id_user)->update([
                    'nama' => $nama,
                    'email' => $email
                ]);
                $user_logon = model_user::where('id_user',$user_logon->id_user)->first();
                Session::put('user_logon', $user_logon);
                return redirect('goEditacc')->with('msg', 'Account saved!')->withInput();
            }
        }
        else
        {
            return redirect ('goEditacc')->with('msgerror','Password wrong');
        }
    }

    public function handleEditPassword(Request $req){
        $req->validate([
            'curr_password' => ['required'],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password']
        ]);
        $curr_password = $_POST['curr_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $user_logon = Session::get('user_logon');
        if(Hash::check($curr_password, $user_logon->password)){
            model_user::where('id_user',$user_logon->id_user)->update([
                'password' => Hash::make($new_password)
            ]);
            $user_logon = model_user::where('id_user',$user_logon->id_user)->first();
            Session::put('user_logon', $user_logon);
            return redirect('goEditacc')->with('msg_pass', 'Password changed!')
                    ->withInput();
        }else{
            return redirect('goEditacc')->with('msg_pass_error', 'Wrong password!')
                    ->withInput();
        }
    }

    public function q_shop(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data["query"] = $req["query"];
        $data["brand"] = "";
        $data["min"] = 100;
        $data["max"] = 10000;
        if (isset($_GET['filter_price']))
        {
            $data["min"] = (int) $_GET['minimum_price'];
            $data["max"] = (int) $_GET['maximum_price'];
        }
        $data["size"] = "all";
        $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('created_at','desc')->get();
        $data["pilihan"] = "Newest";

        if (isset($_GET['sort']))
        {
            if ($_GET['sort'] == "Newest")
            {
                $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('created_at','desc')->get();
                $data["pilihan"] = $_GET['sort'];
                if (isset($_GET["brand"]))
                {
                    $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],['brand_sneaker','=',strtoupper($_GET["brand"])],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('created_at','desc')->get();
                }
            }
            if ($_GET['sort'] == "Highest Price")
            {
                $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('harga_sneaker','desc')->get();
                $data["pilihan"] = "Highest Price";
                if (isset($_GET["brand"]))
                {
                    $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],['brand_sneaker','=',strtoupper($_GET["brand"])],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('harga_sneaker','desc')->get();
                }
            }
            if ($_GET['sort'] == "Lowest Price")
            {
                $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('harga_sneaker','asc')->get();
                $data["pilihan"] = "Lowest Price";
                if (isset($_GET["brand"]))
                {
                    $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],['brand_sneaker','=',strtoupper($_GET["brand"])],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('harga_sneaker','asc')->get();
                }
            }
            if ($_GET['sort'] == "Alpha-a-z")
            {
                $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('nama_sneaker','asc')->get();
                $data["pilihan"] = "Alphabeth A - Z";
                if (isset($_GET["brand"]))
                {
                    $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],['brand_sneaker','=',strtoupper($_GET["brand"])],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('nama_sneaker','asc')->get();
                }
            }
            if ($_GET['sort'] == "Alpha-z-a")
            {
                $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('nama_sneaker','desc')->get();
                $data["pilihan"] = "Alphabeth Z - A";
                if (isset($_GET["brand"]))
                {
                    $data["sneaker"] = model_sneaker::where([['nama_sneaker','LIKE','%'.$data["query"].'%'],['brand_sneaker','=',strtoupper($_GET["brand"])],["harga_sneaker",">=",$data["min"]*1000],["harga_sneaker","<=",$data["max"]*1000]])->orderBy('nama_sneaker','desc')->get();
                }
            }

        }
        $data["size"] = model_dsneaker::select('ukuran_sneaker')->distinct()->get();
        $data["brand"] = model_sneaker::select('brand_sneaker')->distinct()->take(6)->get();
        return view("shop",$data);
    }

    public function goAbout(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        return view("about",$data);
    }

    public function goContact(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        return view("contact",$data);
    }

    public function goRegister(Request $req){
        $data["provinsi"] = model_provinsi::get();
        $data["kota"] = model_kota::get();
        return view("signup",$data);
    }

    public function handleRegister(Request $req){

        $req->validate([
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_user' => 'required',
            'kota' => 'required',
            'alamat' => 'required'
        ], [

        ]);

        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["first_name"]." ".$_POST["last_name"];
        $email = $_POST["email"];
        $jenis_user = $_POST["jenis_user"];
        $kota = $_POST["kota"];
        $alamat = $_POST["alamat"];

        if(empty(model_user::where("username", $username)->first())){
            if(empty(model_user::where("email",$email)->first())){
                $data = [
                    'id_user' => null,
                    'username' => $username,
                    'nama' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'id_kota' => $kota,
                    'status_verifikasi' => 0,
                    'jenis_user' => $jenis_user,
                    'status_ban' => 0,
                    'alamat_user' => $alamat
                ];

                model_user::create($data);
                return redirect('sendVerificationMail/'.$email);
            }else{
                return redirect ('goRegister')->withErrors(['Email sudah terdaftar']);
            }
        }else{
            return redirect ('goRegister')->withErrors(['Username sudah terdaftar']);
        }

    }

    public function send_reset(Request $req){
        $req->validate([
            'email' => "required"
        ], [

        ]);

        $email = $_POST['email'];

        $ada = model_user::where('email',$email)->get();
        if(count($ada) > 0){
            $user = model_user::where('email', $email)->first();
            Mail::to($user['email'])->send(new ResetMail($user));
            $data["msg"] = "Cek inbox email anda untuk reset password.";
            return view('forgot_password',$data);
        }else{
            $data['msg'] = "Email tidak ditemukan!";
            return view('forgot_password',$data);
        }
    }

    public function sendVerificationMail($email)
    {
        $user = model_user::where('email', $email)->first();
        Mail::to($user['email'])->send(new VerificationMail($user));
        $data["email"] = $email;
        return view('ver_email',$data);
    }

    public function handleReset(Request $req){
        $req->validate([
            'new_password' => ["required","min:8"],
            'confirm_password' => ['required','same:new_password']
        ], [

        ]);

        $email = $_POST['email'];
        $pass = $_POST['new_password'];
        model_user::where('email',$email)->update(['password'=>Hash::make($pass)]);

        $data['msg'] = "Password berhasil diganti.";
        return view('login',$data);
    }

    public function verifyMail($email)
    {
        model_user::where('email', $email)
                    ->update(['status_verifikasi' => 1]);

        return redirect('/goLogin');
    }

    public function resetPass($email){
        $data['email'] = $email;
        return view('reset_password',$data);
    }
}
