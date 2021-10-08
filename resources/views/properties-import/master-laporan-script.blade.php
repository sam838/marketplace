<script>
var hitung_ctr = 0;
$('.laporan-dropdown').click(function(){
    if(hitung_ctr %2 == 0){
        $('#laporan-id').removeClass("fas fa-plus").addClass("fas fa-minus");

        $(".dropdown-here").append('<div class="master-navigation-wrapper laporan-dropdown"><a href="/laporan_community"><span id="nav-master">Laporan Community</span></a></div>');
        $(".dropdown-here").append('<div class="master-navigation-wrapper laporan-dropdown"><a href="/laporan_barang"><span id="nav-master">Laporan Barang</span></a></div>');
        $(".dropdown-here").append('<div class="master-navigation-wrapper laporan-dropdown"><a href="/laporan_transaksi"><span id="nav-master">Laporan Transaksi</span></a></div>');
        $(".dropdown-here").append('<div class="master-navigation-wrapper laporan-dropdown"><a href="/laporan_keuangan"><span id="nav-master">Laporan Keuangan</span></a></div>');
        $(".dropdown-here").append('<div class="master-navigation-wrapper laporan-dropdown"><a href="/laporan_seller"><span id="nav-master">Laporan Seller</span></a></div>');

        hitung_ctr++;
    }
    else if(hitung_ctr %2 == 1){
        $('#laporan-id').removeClass("fas fa-minus").addClass("fas fa-plus");
        $(".dropdown-here").html("");
        hitung_ctr++;
    }
});
</script>
