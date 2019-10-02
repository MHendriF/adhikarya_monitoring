/*SweetAlert Init*/

$(function() {
	"use strict";
	
	var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            confirmButtonColor: "#177ec1",   
        });
		return false;
    });

    //A title with a text under
    $('#hapusalert2').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#177ec1",   
        });
		return false;
    });

    //Success Message
	$('#approvedsukses').on('click',function(e){
        swal({   
			title: "Berhasil!",   
             type: "Approved Data", 
			text: "transaksi sudah di approved",
			confirmButtonColor: "#469408",   
        });
		return false;
    });

    //Warning Message
    $('#hapusalert,.hapusalert').on('click',function(e){
	    swal({   
            title: "whopss...yakin mau hapus data?",   
            text: "Data yang terhapus tidak bisa direstore!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e69a2a",   
            confirmButtonText: "Hapus saja!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Success!", "Pembayaran Sudah Terproses"); 
        });
		return false;
    });
    //approved Message
    $('#approved,.approved').on('click',function(e){
        swal({   
            title: "Yakin akan rubah status pembayaran?",   
            text: "Data pembayaran yg di konfirmasi tidak bisa UNDO !",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#89D237",   
            confirmButtonText: "Submit!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Success!", "Pembayaran Sudah Terproses"); 
        });
        return false;
    });

     


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;
	
	$.SweetAlert.init();
});