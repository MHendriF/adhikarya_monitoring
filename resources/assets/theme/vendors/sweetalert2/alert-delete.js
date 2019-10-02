$(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var linkURL = $(this).attr("href");
    swal({
      	title: 'Are you sure?',
      	text: "You won't be able to revert this!",
      	type: 'warning',
      	showCancelButton: true,
      	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	confirmButtonText: 'Yes, delete it!'
    }).then(function () {
       		window.location.href = linkURL;
    	}, 	
    	function (dissmiss){
       		console.log("Cancel to delete "+linkURL);
        }
    );
})