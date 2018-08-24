/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Custom JavaScript function
 */

$(document).ready(function () {

    // Fitur Belum Tersedia
    $(".not-available").click(function () {
        swal("Oops!", "Not available for now!", "error")
    });

    // Show password unmasked
    $('#show-password').click(function () {
        if ($(this).hasClass('fa-eye-slash')) {
            $('#password').attr('type', 'text');
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
        } else {
            $('#password').attr('type', 'password');
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
        }
    })
});
