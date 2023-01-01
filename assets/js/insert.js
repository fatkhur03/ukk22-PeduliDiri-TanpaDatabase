/*************************************
*  Insert.Js                     
*                                  
*  Created by Ferdy Rahmat R.      
*  on 5 April 2022                
*                                  
*************************************/
document.title = "PeduliDiri - Tambah Catatan Perjalanan";

function validate() {
    if ($('#datepicker').val().length > 0 &&
        $('#jam').val().length > 0 &&
        $('#lokasi').val().length > 0 &&
        $('#suhu').val().length > 0) {

        $("#btn").attr("disabled", false);
    }
    else {
        $("#btn").attr("disabled", true);
    }
}

setInterval(validate);

$(function () {
    $('#tambah-catatan').submit(function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: data,
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
                } else if (response.status == "failed") {
                    Swal.fire({
                        title: 'Peringatan',
                        text: response.msg,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            },
            error: function () {
                alert('error');
            }
        })
    })
})