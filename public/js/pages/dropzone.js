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
            this.on("addedfile", function () {
                if (this.files[25] != null) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    });


//    myDropzone.on("success", file => {
////        myDropzone.processQueue.bind(myDropzone);
////        alert('Se realizara la carga de los achivos.');
////        location.reload();
//    });

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

