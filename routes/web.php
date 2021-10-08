<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Prototyping
Route::get('/p_addressbook', 'PrototypeCtr@tryAddressbook');
Route::get('/p_cart', 'PrototypeCtr@tryCart');
Route::get('/p_chat', 'PrototypeCtr@tryChat');
Route::get('/p_accdash', 'PrototypeCtr@tryAccdash');
Route::get('/p_detailshop', 'PrototypeCtr@tryDetailshop');
Route::get('/p_dhistory', 'PrototypeCtr@tryDhistory');
Route::get('/p_dpost', 'PrototypeCtr@tryDpost');
Route::get('/p_editacc', 'PrototypeCtr@tryEditAcc');
Route::get('/p_editpost', 'PrototypeCtr@');
Route::get('/p_forum', 'PrototypeCtr@tryForum');
Route::get('/p_home', 'PrototypeCtr@tryHome');
Route::get('/p_login', 'PrototypeCtr@tryLogin');
Route::get('/p_mypost', 'PrototypeCtr@tryMypost');
Route::get('/p_orderhistory', 'PrototypeCtr@tryMyorder');
Route::get('/p_payment', 'PrototypeCtr@tryPayment');
Route::get('/p_post', 'PrototypeCtr@tryPost');
Route::get('/p_retur', 'PrototypeCtr@tryRetur');
Route::get('/p_reviewcart', 'PrototypeCtr@tryReviewcart');
Route::get('/p_shippinginfo', 'PrototypeCtr@tryShippinginfo');
Route::get('/p_shippingmethod', 'PrototypeCtr@tryShippingmethod');
Route::get('/p_shop', 'PrototypeCtr@tryShop');
Route::get('/p_signup', 'PrototypeCtr@trySignup');
Route::get('/p_ver_signup', 'PrototypeCtr@tryVer_signup');
Route::get('/p_wishlist', 'PrototypeCtr@tryWishlist');

Route::get('/','Controller@goHome');
Route::get('/goLogin','Controller@goLogin')->name("login");
Route::get('/handleLogin',function(){return back();});
Route::post('/handleLogin','Controller@handlerLogin');
Route::get('/goEditacc','Controller@goEditacc')->middleware("WithLogin");
Route::get('/goAccdash','Controller@goAccdash')->middleware("WithLogin");
Route::get('/handleEditInfo',function(){ return back();});
Route::post('/handleEditInfo','Controller@handleEditInfo');
Route::get('/handleEditPassword',function(){ return back();});
Route::post('/handleEditPassword','Controller@handleEditPassword');
Route::get('/q_shop','Controller@q_shop');
Route::get('/search','Controller@q_shop');
Route::get('/goRegister','Controller@goRegister');
Route::get('/handleRegister',function(){ return back();});
Route::post('/handleRegister','Controller@handleRegister');
Route::get('/sendVerificationMail/{email}','Controller@sendVerificationMail');
Route::get('/verifyMail/{email}','Controller@verifyMail');
Route::get('/goAbout','Controller@goAbout');
Route::get('/goContact','Controller@goContact');
Route::get('/goAdress','Controller@goAdress')->middleware("WithLogin");
Route::get('/goMyorder','Controller@goMyorder')->middleware("WithLogin"); //INI CUSTOMER
Route::get('/goWishlist','Controller@goWishlist')->middleware("WithLogin"); // INI CUSTOMER
Route::get('/removewishlist/{id}','CustCtr@removewishlist')->middleware("WithLogin");
Route::get('/handleLogout','Controller@handleLogout');
Route::post('/handleAddAdress','Controller@handleAddAdress');
Route::get('/goChat','Controller@goChat')->middleware("WithLogin");
Route::post('/goChat','Controller@goChat');
Route::get('/sendChat',function(){ return back();});
Route::post('/sendChat','Controller@sendChat');
Route::get('/goForum','Controller@goForum')->middleware("WithLogin");
Route::get('/dpost',function(){ return back();});
Route::post('/dpost','Controller@dpost');
Route::get('/handleRpost',function(){ return back();});
Route::post('/handleRpost','Controller@handleRpost');
Route::get('/handlePost',function(){ return back();});
Route::post('/handlePost','Controller@handlePost');
Route::get('/detailOrderCustomer','Controller@detailOrderCustomer'); //INI CUSTOMER
Route::get('/forgot_password','Controller@forgot_password');
Route::get('/send_reset',function(){ return back();});
Route::post('/send_reset','Controller@send_reset');
Route::get('/reset/{email}','Controller@resetPass');
Route::get('/handleReset',function(){ return back();});
Route::post('/handleReset','Controller@handleReset');
//customer
Route::get('/handleBarang',function(){ return back();});
Route::post('/handleBarang','CustCtr@handleBarang');
Route::get('/addToWishlist/{id}','CustCtr@addtowishlist');
Route::get('/detailSneaker/{id_sneaker}','CustCtr@detailSneaker');
Route::get('/handleCart',function(){ return back();});
Route::get('/addtocartfromwishlist/{id}','CustCtr@addtocartfromwishlist');
Route::post('/handleCart','CustCtr@handleCart');
Route::get('/clearCart','CustCtr@clearCart');
Route::get('/goCart','CustCtr@goCart');
Route::get('/goCheckout','CustCtr@goCheckout');
Route::get('/myCart/{msg}','CustCtr@myCart');
Route::get('/myPost','CustCtr@myPost')->middleware("WithLogin");
Route::get('/editPost','CustCtr@editPost')->middleware("WithLogin");
Route::get('/saveEpost',function(){ return back();});
Route::post('/saveEpost','CustCtr@saveEpost')->middleware("WithLogin");
Route::get('/konfirmasiBayar',function(){ return back();});
Route::post('/konfirmasiBayar','CustCtr@konfirmasiBayar')->middleware("WithLogin");
Route::get('/konfirmasiPenerimaan',function(){ return back();});
Route::post('/konfirmasiPenerimaan','CustCtr@konfirmasiPenerimaan')->middleware("WithLogin");
Route::get('/saveTransaksi',function(){ return back();});
Route::post('/saveTransaksi','CustCtr@saveTransaksi')->middleware("WithLogin");
Route::get('/paypal',function(){ return back();});
Route::post('/paypal','PaymentController@payWithpaypal')->middleware("WithLogin");
Route::get('/cekBayar','PaymentController@getPaymentStatus')->middleware("WithLogin");
Route::get('/ajukanPengembalian',function(){ return back();});
Route::post('/ajukanPengembalian','CustCtr@ajukanPengembalian')->middleware("WithLogin");
Route::get('/kirimPengembalian',function(){ return back();});
Route::post('/kirimPengembalian','CustCtr@kirimPengembalian')->middleware("WithLogin");
//admin
Route::get('/masterUser','AdminCtr@masterUser')->middleware("WithLogin");
Route::get('/masterBarang','AdminCtr@masterBarang')->middleware("WithLogin");
Route::get('/masterForum','AdminCtr@masterForum')->middleware("WithLogin");
Route::get('/masterTrans','AdminCtr@masterTrans')->middleware("WithLogin");
Route::get('/editSlider','AdminCtr@editSlider')->middleware("WithLogin");
Route::get('/masterRpost','AdminCtr@masterRpost')->middleware("WithLogin");
Route::get('/masterRsneaker','AdminCtr@masterRsneaker')->middleware("WithLogin");
//seller
Route::get('/myItem','SellerCtr@myItem')->middleware("WithLogin");
Route::get('/addItem','SellerCtr@addItem')->middleware("WithLogin");
Route::post('/handleNewItem','SellerCtr@handleNewItem')->middleware("WithLogin");
Route::get('/editItem','SellerCtr@editItem')->middleware("WithLogin");
Route::get('/handleEditItem',function(){ return back();});
Route::post('/handleEditItem','SellerCtr@handleEditItem')->middleware("WithLogin");
Route::get('/deleteItem','SellerCtr@deleteItem')->middleware("WithLogin");
Route::get('/addDsneaker',function(){ return back();});
Route::post('/addDsneaker','SellerCtr@addDsneaker')->middleware("WithLogin");
Route::get('/deleteDsneaker',function(){ return back();});
Route::post('/deleteDsneaker','SellerCtr@deleteDsneaker')->middleware("WithLogin");
Route::get('/myOrderAdmin','SellerCtr@myOrderAdmin')->middleware("WithLogin");
Route::get('/detailOrderSeller','SellerCtr@detailOrderSeller')->middleware("WithLogin");
Route::get('/sellerKonfirmasiPengiriman',function(){ return back();});
Route::post('/sellerKonfirmasiPengiriman','SellerCtr@konfirmasiPengiriman')->middleware("WithLogin");
Route::get('/responPengembalian',function(){ return back();});
Route::post('/responPengembalian','SellerCtr@responPengembalian')->middleware("WithLogin");
Route::get('/konfirmasiPengembalian',function(){ return back();});
Route::post('/konfirmasiPengembalian','SellerCtr@konfirmasiPengembalian')->middleware("WithLogin");

Route::get('/laporan_community','LaporanCtr@community')->middleware("WithLogin");
Route::get('/laporan_barang','LaporanCtr@barang')->middleware("WithLogin");
Route::get('/laporan_transaksi','LaporanCtr@transaksi')->middleware("WithLogin");
Route::get('/laporan_keuangan','LaporanCtr@keuangan')->middleware("WithLogin");
Route::get('/laporan_user','LaporanCtr@user')->middleware("WithLogin");
Route::get('/laporan_seller','LaporanCtr@seller')->middleware("WithLogin");
