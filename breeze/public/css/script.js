/* kode JavaScript tambahan untuk mengaktifkan tombol prev/next dengan keyboard */
$(document).keydown(function(e){
    if (e.keyCode == 37) { //tombol arrow kiri
        $('#myCarousel').carousel('prev');
    }
    else if (e.keyCode == 39) { //tombol arrow kanan
        $('#myCarousel').carousel('next');
    }
});

$(document).ready(function(){
    $('.carousel').carousel({
        interval: 5000 //waktu delay antar slide dalam milidetik
    });
});