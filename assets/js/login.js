/*************************************
*  Login.Js                     
*                                  
*  Created by Ferdy Rahmat R.      
*  on 2 April 2022                
*                                  
*************************************/
document.title = "PeduliDiri - Login";

$('#btn').attr("disabled", true);

document.getElementById("nik").addEventListener('input', checkNIK);

/** Check NIK */
function checkNIK() {
    var nik = $("#nik").val();
    var countNIK = nik.length;

    if (countNIK < 16) {
        $('#btn').attr("disabled", true);

        document.getElementById("nama").classList.remove('animated', 'fadeInUp');
        document.getElementById("nama").classList.add('animated', 'fadeOutDown');

        var get = document.getElementsByClassName('animated fadeOutDown');

        function removeAnimate() {
            if (get.length > 0) {
                document.getElementById("nama").classList.remove('animated', 'fadeOutDown');
                document.getElementById("nama").style.display = "none";
            }
        }

        setTimeout(removeAnimate, 500);
    } else if (countNIK == 16) {
        $.ajax({
            url: "cek-nik",
            method: "POST",
            data: "nik=" + nik,
            dataType: "JSON",
            success: function (response) {
                if (response.status == "success") {
                    $('#btn').attr("disabled", false);

                    document.getElementById("nama").style.display = "block";
                    document.getElementById("nama").focus();
                    document.getElementById("nama").classList.add('animated', 'fadeInUp');

                    document.getElementById("nama").value = response.nama;
                } else if (response.status == "failed") {
                    toastr.error(response.msg, '', {
                        timeOut: 3000
                    });
                }
            },
            error: function () {
                toastr.error('Terjadi masalah pada sistem', '', {
                    timeOut: 3000
                });
            }
        })
    }
}

function checkAnimate() {
    var cek = document.getElementsByClassName('fadeInUp');

    if (cek.length > 0) {
        document.getElementById("nama").style.display = "block";
        document.getElementById("nama").classList.add('animated', 'fadeInUp');
    }
}

setInterval(checkAnimate);

$(function () {
    $('#login').submit(function (e) {
        e.preventDefault();

        $("#btn").button('loading');

        toastr.info('Sedang Login...', '', {
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
                            window.location.href = "home";
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