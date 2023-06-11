jQuery(document).ready(function() {
        $(function () {
// jquery typed plugin
    $(".typed").typed({
        stringsElement: $('.typed-strings'),
        typeSpeed: 200,
        backDelay: 1500,
        loop: true,
        contentType: 'html', // or text
        // defaults to false for infinite loop
        loopCount: false,
        callback: function () { null; },
        resetCallback: function () { newTyped(); }
    });
});
});


document.getElementById('success').onclick = function(){
	swal("Good job!", "You clicked the button!", "success");
};

document.getElementById('Warning').onclick = function(){
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		closeOnConfirm: false,
		//closeOnCancel: false
	},
	function(){
		swal("Deleted!", "Your imaginary file has been deleted!", "success");
	});
};


document.getElementById('warning_1').onclick = function(){
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
    if (isConfirm){
      swal("Deleted!", "Your imaginary file has been deleted!", "success");
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
	});
};