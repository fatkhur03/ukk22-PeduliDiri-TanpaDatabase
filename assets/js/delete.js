/*************************************
*  Delete.Js                     
*                                  
*  Created by Ferdy Rahmat R.      
*  on 5 April 2022                
*                                  
*************************************/
$('.hapus-catatan').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data perjalanan akan terhapus, Tindakan ini tidak dapat dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Saya Yakin',
        cancelButtonText: 'Tidak, Batalkan',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: $(this).attr('href'),
                dataType: "JSON",
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire({
                            title: 'Berhasil',
                            text: response.msg,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            window.location = response.redirect;
                        })
                    }
                },
                error: function () {

                }
            })
        } else {
            // Swal.fire(
            //     'Dibatalkan!',
            //     'Data perjalanan tidak terhapus.',
            //     'error'
            // )
        }
    })
})