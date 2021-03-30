/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Dropzone.autoDiscover = false;
jQuery(document).ready(function ($) {
    //   alert($('#proyectCreate').attr("action")); 
    let myDropzone = new Dropzone("#my-dropzone", {url: urlform});
    //    $("#dropzone-div").dropzone({ url: "/file/post" });
    Dropzone.options.myDropzone = {
        autoProcessQueue: false,
        uploadMultiple: true,
        maxFilezise: 10,
        maxFiles: 2,

        init: function () {
            var submitBtn = document.querySelector("#submit");
            myDropzone = this;

            submitBtn.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });
            this.on("addedfile", function (file) {
                alert("file uploaded");
            });

            this.on("complete", function (file) {
                myDropzone.removeFile(file);
            });

            this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                    );
        }
    };
});

