/*************************************
*  Register.Js                     
*                                  
*  Created by Ferdy Rahmat R.      
*  on 6 April 2022                
*                                  
*************************************/
document.title = "PeduliDiri - Register";

$('#btn').attr("disabled", true);

document.getElementById("nikreg").addEventListener('input', checkNIK);

/** Check NIK */
function checkNIK() {
    var nik = $("#nikreg").val();
    var countNIK = nik.length;

    if (countNIK < 16) {
        $('#btn').attr("disabled", true);
    } else if (countNIK == 16) {
        $('#btn').attr("disabled", false);
    }
}

$(function () {
    $('#register').submit(function (e) {
        e.preventDefault();

        $("#btn").button('loading');

        toastr.info('Sedang Proses...', '', {
            timeOut: 2000,
            preventDuplicates: true
        });

        var data = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: data,
            dataType: "JSON",
            success: function (response) {
                if (response.status == "success") {

                    toastr.info(response.msg, '', {
                        timeOut: 3000,
                        preventDuplicates: true,
                        progressBar: true,

                        onHidden: function () {
                            window.location.href = "masuk";
                        }
                    });
                } else if (response.status == "failed") {
                    $("#btn").button('reset');

                    toastr.error(response.msg, '', {
                        timeOut: 3000
                    });
                }
            },
            error: function () {
                $("#btn").button('reset');

                toastr.error('Terjadi masalah pada sistem', '', {
                    timeOut: 3000
                });
            }
        })
    })
})