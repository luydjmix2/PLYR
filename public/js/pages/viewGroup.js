/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {
//    alert('hola view');
    $('.bt-modal-share').click(function () {
        var bt = $(this);
//        console.log(bt.data('user'));
        $('#user_id_share').val(bt.data('user'));
    });
    
    $('.bt-modal-file-share').click(function () {
        var bt = $(this);
//        console.log(bt.data('user'));
        $('#file_id_share').val(bt.data('file'));
    });
});