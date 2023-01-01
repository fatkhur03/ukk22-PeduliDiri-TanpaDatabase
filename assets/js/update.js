/*************************************
*  Update.Js                     
*                                  
*  Created by Ferdy Rahmat R.      
*  on 5 April 2022                
*                                  
*************************************/
$("#btn").attr("disabled", true);

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
    $('#edit-catatan').submit(function (e) {
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
                }
            },
            error: function () {

            }
        })
    })
})