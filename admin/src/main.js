/*Check Settings for a User Settings Box*/
var hasBeenClicked = true;

$("#set-box").click(function(){
    if (hasBeenClicked) {
        hasBeenClicked = false;
        document.getElementById('set-cont').style.top = "0";
        document.getElementById('bar').style.zIndex = "10000";
        document.getElementById('bar').style.position= "fixed";
        document.getElementById('set-cont').style.height = "190%";
    } else {
        hasBeenClicked = true;
        document.getElementById('bar').style.zIndex = "10";
        document.getElementById('set-cont').style.height = "0";
    }
}); 

$('.del-btn').on('click',function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Silmek istediğinizden emin misiniz?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet, silmek istiyorum!',
        cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;   
            }
        })
})

const flashdata = $('.result').data('flashdata');

if(flashdata === "grs"){
    Swal.fire({
    icon : 'success',
    title : 'Giriş Yapıldı!'
})}

if(flashdata === "ngrs"){
    Swal.fire({
    icon : 'error',
    title : 'Giris Yapılamadı!'
})}

if(flashdata === "cks"){
    Swal.fire({
    icon : 'success',
    title : 'Çıkış Yapıldı!'
})}

if(flashdata === "sil"){
    Swal.fire({
    icon : 'success',
    title : 'Haber Silindi!'
})}

if(flashdata === "nsil"){
    Swal.fire({
    icon : 'error',
    title : 'Haber Silinemedi!'
})}

if(flashdata === "ekl"){
    Swal.fire({
    icon : 'success',
    title : 'Haber Eklendi!'
})}

if(flashdata === "nekl"){
    Swal.fire({
    icon : 'error',
    title : 'Haber Eklenemedi!'
})}

if(flashdata === "duz"){
    Swal.fire({
    icon : 'success',
    title : 'Haber Düzenlendi!'
})}

if(flashdata === "nduz"){
    Swal.fire({
    icon : 'error',
    title : 'Haber Düzenlenemedi!'
})}

if(flashdata === "dduz"){
    Swal.fire({
    icon : 'success',
    title : 'Duyuru Düzenlendi!'
})}

if(flashdata === "dnduz"){
    Swal.fire({
    icon : 'error',
    title : 'Duyuru Düzenlenemedi!'
})}

if(flashdata === "dekl"){
    Swal.fire({
    icon : 'success',
    title : 'Haber Eklendi!'
})}

if(flashdata === "dnekl"){
    Swal.fire({
    icon : 'error',
    title : 'Haber Eklenemedi!'
})}

if(flashdata === "dsil"){
    Swal.fire({
    icon : 'success',
    title : 'Duyuru Silindi!'
})}

if(flashdata === "dnsil"){
    Swal.fire({
    icon : 'error',
    title : 'Duyuru Silinemedi!'
})}

if(flashdata === "uekl"){
    Swal.fire({
    icon : 'success',
    title : 'Kullanıcı Eklendi!'
})}

if(flashdata === "unekl"){
    Swal.fire({
    icon : 'error',
    title : 'Kullanıcı Eklenemedi!'
})}