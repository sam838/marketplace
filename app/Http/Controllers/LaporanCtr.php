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
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LaporanCtr extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function community(Request $req){
        $data['t_post'] = DB::table('post')->select('*')->orderBy('total_up','desc')->get(10);
        $data['t_user'] = model_user::get();
        $data['t_rpost'] = model_review_post::whereNotNull('komentar_post')->get();
        $data['total_senin'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 0')->first();
        $data['total_selasa'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 1')->first();
        $data['total_rabu'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 2')->first();
        $data['total_kamis'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 3')->first();
        $data['total_jumat'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 4')->first();
        $data['total_sabtu'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 5')->first();
        $data['total_minggu'] = DB::table('post')->selectRaw('count(*) as total')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 6')->first();

        return view('laporan/community',$data);
    }

    public function keuangan(Request $req){
        $data['total_senin'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 0')->first();
        $data['total_selasa'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 1')->first();
        $data['total_rabu'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 2')->first();
        $data['total_kamis'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 3')->first();
        $data['total_jumat'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 4')->first();
        $data['total_sabtu'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 5')->first();
        $data['total_minggu'] = DB::table('htrans')->selectRaw('sum(total) as Htotal')->whereMonth('created_at','=',date('m'))->whereRaw('WEEKDAY(created_at) = 6')->first();

        $data['htrans'] = DB::table('htrans')->whereMonth('created_at','=',date('m'))->get();
        $data['user'] = DB::table('user')->get();
        return view('laporan/keuangan',$data);
    }

    public function transaksi(Request $req){
        $data['t_custTOP'] = DB::table('htrans')->selectRaw('id_user, sum(total) as Htotal, sum(jumlah_barang) as Hjumlah')->whereMonth('created_at','=',date('m'))->groupBy('id_user')->orderBy('total','desc')->get(10);
        $data['t_sellerTOP'] = DB::table('htrans')->selectRaw('id_seller, sum(total) as Htotal, sum(jumlah_barang) as Hjumlah')->whereMonth('created_at','=',date('m'))->groupBy('id_seller')->orderBy('total','desc')->get(10);
        $data['t_user'] = model_user::get();
        $data['t_htrans'] = model_htrans::get();
        $data['t_dtrans'] = model_dtrans::get();
        $data['sneaker'] = model_sneaker::get();
        $data['dsneaker'] = model_dsneaker::get();
        $data['countTransaksi'] = DB::table('htrans')->selectRaw('count(*) as Htotal')->first();
        $data['htrans_paginate'] = model_htrans::paginate(5);

        return view('laporan/transaksi',$data);
    }

    public function seller(Request $req){
        $data['user'] = model_user::where('jenis_user','seller')->paginate(5);
        $data['htrans'] = model_htrans::get();

        return view('laporan/seller', $data);
    }

    public function barang(Request $req){
        //CHART TOP BARANG
        $arrDSNEAKERALL = [];
        $dsneakerAll = model_dtrans::select('id_dsneaker')->distinct()->get();
        foreach ($dsneakerAll as $ds) {
            array_push($arrDSNEAKERALL,$ds->id_dsneaker);
        }
        $arrSNEAKERADA = [];
        $sneakerAda = model_dsneaker::select('id_sneaker')->whereIn('id_dsneaker',$arrDSNEAKERALL)->distinct()->get();
        foreach ($sneakerAda as $s) {
            array_push($arrSNEAKERADA,$s->id_sneaker);
        }
        $listSneaker = DB::table('sneaker')->whereIn('id_sneaker',$arrSNEAKERADA)->get();
        $data['listTop'] = [];
        $data['totalTop'] = [];
        $data['rgbTop'] = [];
        foreach ($listSneaker as $s) {
            array_push($data['listTop'],$s->nama_sneaker);
            $tempTotal = 0;
            foreach($dsneakerAll as $ds){
                $tempDS = model_dsneaker::where('id_dsneaker',$ds->id_dsneaker)->first();
                if($tempDS->id_sneaker == $s->id_sneaker){
                    $totalan = DB::table('dtrans')->selectRaw('sum(jumlah) as total')->where('id_dsneaker',$ds->id_dsneaker)->first();
                    $tempTotal += intval($totalan->total);
                }
            }
            array_push($data['totalTop'],$tempTotal);
            $rgba = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';
            array_push($data['rgbTop'],$rgba);
        }

        //CHART WISHLIST BARANG
        $arrDSNEAKERALLW = [];
        $dsneakerAllW = model_wishlist::select('id_dsneaker')->distinct()->get();
        foreach ($dsneakerAllW as $ds) {
            array_push($arrDSNEAKERALLW, $ds->id_dsneaker);
        }
        $arrSNEAKERADAW = [];
        $sneakerAdaW = model_dsneaker::select('id_sneaker')->whereIn('id_dsneaker',$arrDSNEAKERALLW)->distinct()->get();
        foreach ($sneakerAdaW as $s) {
            array_push($arrSNEAKERADAW, $s->id_sneaker);
        }
        $listSneakerW = model_sneaker::whereIn('id_sneaker',$arrSNEAKERADAW)->get();
        $data['listTopW'] = [];
        $data['totalTopW'] = [];
        $data['rgbTopW'] = [];
        foreach ($listSneakerW as $s) {
            array_push($data['listTopW'],$s->nama_sneaker);
            $tempTotalW = 0;
            foreach($dsneakerAllW as $ds){
                $tempDSW = model_dsneaker::where('id_dsneaker',$ds->id_dsneaker)->first();
                if(isset($tempDSW["id_sneaker"]) == $s->id_sneaker){
                    $totalanW = DB::table('wishlist')->selectRaw('count(*) as total')->where('id_dsneaker',$ds->id_dsneaker)->first();
                    $tempTotalW += intval($totalanW->total);
                }
            }
            array_push($data['totalTopW'],$tempTotalW);
            $rgba = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';
            array_push($data['rgbTopW'],$rgba);
        }

        //TABLE
        $data['t_wishlist'] = model_wishlist::get();
        $data['t_dtrans'] = model_dtrans::get();
        $data['t_dsneaker'] = model_dsneaker::get();
        $data['t_sneaker'] = model_sneaker::paginate(5);
        $data['t_review_sneaker'] = model_review_sneaker::get();
        $data['t_user'] = model_user::get();


        return view('laporan/barang',$data);
    }

    public function user(Request $req){
        //CHART CUSTOMER DI KOTA
        $data['KotaAda'] = model_user::select('id_kota')->where('jenis_user','customer')->distinct()->get();
        $listKota = DB::table('kota')->whereIn('id_kota',$data['KotaAda'])->get();
        $data['listKota'] = [];
        $data['totalKota'] = [];
        $data['rgbKota'] = [];
        foreach ($listKota as $kota) {
            array_push($data['listKota'],$kota->nama_kota);
            $tempTotal = DB::table('user')->selectRaw('count(*) as total')->where('id_kota',$kota->id_kota)->where('jenis_user','customer')->first();
            array_push($data['totalKota'],$tempTotal->total);
            $rgba = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';
            array_push($data['rgbKota'],$rgba);
        }

        //CHART SELLER DI KOTA
        $data['KotaAdaS'] = model_user::select('id_kota')->where('jenis_user','seller')->distinct()->get();
        $listKota = DB::table('kota')->whereIn('id_kota',$data['KotaAdaS'])->get();
        $data['listKotaS'] = [];
        $data['totalKotaS'] = [];
        $data['rgbKotaS'] = [];
        foreach ($listKota as $kota) {
            array_push($data['listKotaS'],$kota->nama_kota);
            $tempTotal = DB::table('user')->selectRaw('count(*) as total')->where('id_kota',$kota->id_kota)->where('jenis_user','seller')->first();
            array_push($data['totalKotaS'],$tempTotal->total);
            $rgba = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.73)';
            array_push($data['rgbKotaS'],$rgba);
        }

        //CHART VISIT
        $visit = DB::table('visit')->whereMonth('date_visit', '=', date('m'))->get();
        $data['listVisit'] = [];
        $data['totalVisit'] = [];
        foreach ($visit as $v) {
            array_push($data['listVisit'],substr($v->date_visit,8));
            array_push($data['totalVisit'],$v->total_visit);
        }

        //TABLE INFO
        $data['t_user'] = model_user::paginate(5);


        return view('laporan/user',$data);
    }
}
