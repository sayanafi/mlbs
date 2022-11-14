//Data Table
$(document).ready(function () {
    $('#datatable').DataTable();
    
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