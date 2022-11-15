//Data Table
$(document).ready(function () {
    $('#datatable').DataTable();
    
});

//Select 2
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
  $('#kota').select2({
    theme: 'bootstrap 4',
    placeholder: "Pilih Role"
  });
  
});

//Tombol Hapus
$('.tombol-hapus').on('click',function(e){
    //Matikan Fungsi A Hrefnya
    e.preventDefault();
    //Ambil Isi Hrefnya
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Akan Dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          //Tampilkan Href
          document.location.href = href;
        }
      })
});

const swal1 = $('.user').data('user'); //Ambil Data FlashDatanya
if ( swal1 ){
    //Kalau Ada isinya jalankan sweetalert
    Swal.fire({
        title: 'Data User ',
        text: 'Berhasil ' + swal1,
        icon: 'success'
    })
}