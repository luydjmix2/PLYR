/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Dropzone.autoDiscover = false;
jQuery(document).ready(function ($) {
//       alert($('#my-dropzone').attr("action")); 
    var urlform = $('#my-dropzone').attr("action");

    let myDropzone = new Dropzone("#my-dropzone", {
        url: urlform,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: 1,
        maxFiles: 25,

        accept: function (file, done) {
            console.log("uploaded");
            done();
        },

        init: function () {
            this.on("maxfilesexceeded", function () {
                alert('Se realizara la carga de los achivos. ');
            });
        }
    });


    myDropzone.on("queuecomplete", file => {
        if (confirm('The files were loaded you want to load more Ok, if you want to reload Cancel?')) {
            console.log('si.');
        } else {
            console.log('no.');
            location.reload();
        }
    });

    
//    var submitBtn = document.querySelector("#submit");
//    submitBtn.addEventListener("click", function (e) {
//        e.preventDefault();
//        e.stopPropagation();
//        alert(myDropzone.processQueue());
//        myDropzone.processQueue();
//    });

    //    $("#dropzone-div").dropzone({ url: "/file/post" });
//    Dropzone.options.myDropzone = {
//        autoProcessQueue: false,
//        uploadMultiple: true,
//        maxFilezise: 10,
//        maxFiles: 2,
//
//        init: function () {
//            var submitBtn = document.querySelector("#submit");
//            myDropzone = this;
//
//            submitBtn.addEventListener("click", function (e) {
//                e.preventDefault();
//                e.stopPropagation();
//                alert(myDropzone.processQueue());
//                myDropzone.processQueue();
//            });
//            this.on("addedfile", file => {
//                console.log("A file has been added");
//            });
////            this.on("addedfile", function (file) {
////                alert("file uploaded");
////            });
//
//            this.on("complete", function (file) {
//                myDropzone.removeFile(file);
//            });
//
//            this.on("success", function (file) {
//                myDropzone.processQueue.bind(myDropzone);
//            });
//        }
//    };
});

