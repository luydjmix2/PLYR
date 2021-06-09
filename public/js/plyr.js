/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
//    alert('hola');
    $('.document-destroy').click(function (eventDest) {
        eventDest.preventDefault();
        if (confirm('do you want to delete the file?')) {
//            console.log($(this).prop("href"));
            window.location = $(this).prop("href");
        } else {
//            console.log('decline destroy');
            return false;
        }
    });

    $('.users-delete').click(function (eventDelUser) {
        eventDelUser.preventDefault();
        if (confirm('do you want to delete the user?')) {
//            console.log($(this).prop("href"));
            window.location = $(this).prop("href");
        } else {
//            console.log('decline destroy');
            return false;
        }
    });

    $('.tooltip-bts').click(function () {
        var zoneAlert = $(this).data('action');
        var toggle = $(this).attr('data-toggel');
//        alert(zoneAlert + ' ' + toggle);
//       return $(zoneAlert).show() ? $(zoneAlert).hide();
        if (toggle == '0') {
            $('.tooltip-bts').attr('data-toggel', '0');
            $(this).attr('data-toggel', '1');
            $('.tooltip-bts-alerts').addClass('tooltip-bts-alerts-hidden');
            $('#' + zoneAlert).removeClass('tooltip-bts-alerts-hidden');

        } else {
            $(this).attr('data-toggel', '0');
            $('#' + zoneAlert).addClass('tooltip-bts-alerts-hidden');
        }

    });

    $(document).on("click", function (e) {

        var container = $(".tooltip-bts");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.tooltip-bts-alerts').addClass('tooltip-bts-alerts-hidden');
            $('.tooltip-bts').attr('data-toggel', '0');
        }
    });
});
