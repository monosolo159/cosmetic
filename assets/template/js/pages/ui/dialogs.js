$(function() {
	$('.js-sweetalert button').on('click', function() {
		var type = $(this).data('type');
		if (type === 'basic') {
			showBasicMessage();
		} else if (type === 'with-title') {
			showWithTitleMessage();
		} else if (type === 'success') {
			showSuccessMessage();
		} else if (type === 'confirm') {
			showConfirmMessage();
		} else if (type === 'cancel') {
			showCancelMessage();
		} else if (type === 'with-custom-icon') {
			showWithCustomIconMessage();
		} else if (type === 'html-message') {
			showHtmlMessage();
		} else if (type === 'autoclose-timer') {
			showAutoCloseTimerMessage();
		} else if (type === 'prompt') {
			showPromptMessage();
		} else if (type === 'ajax-loader') {
			showAjaxLoaderMessage();
		}
	});
});

//These codes takes from http://t4t5.github.io/sweetalert/
function showBasicMessage() {
	swal("Here's a message!");
}

function showWithTitleMessage() {
	swal("Here's a message!", "It's pretty, isn't it?");
}

function showSuccessMessage() {
	swal("Good job!", "You clicked the button!", "success");
}

function showConfirmMessage() {
	swal({
		title: "ยืนยันการลบ ?",
		text: "เมื่อลบข้อมูลแล้วจะไม่สามารถกู้กลับภายหลังได้!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "ลบ",
		cancelButtonText: "ยกเลิก",
		closeOnConfirm: false
	}, function() {
		swal("ลบสำเร็จ!", "ข้อมูลถูกลบแล้ว", "success");
	});
}

function showCancelMessage() {
	swal({
		title: "ยืนยันการลบ ?",
		text: "เมื่อลบข้อมูลแล้วจะไม่สามารถกู้กลับภายหลังได้!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "ลบ",
		cancelButtonText: "ยกเลิก",
		closeOnConfirm: false,
		closeOnCancel: false
	}, function(isConfirm) {
		if (isConfirm) {
			swal("ลบสำเร็จ!", "ข้อมูลถูกลบแล้ว", "success");
		} else {
			swal("ยกเลิก", "ข้อมูลไม่ถูกลบ", "error");
		}
	});
}

function showWithCustomIconMessage() {
	swal({
		title: "Sweet!",
		text: "Here's a custom image.",
		imageUrl: "../../images/thumbs-up.png"
	});
}

function showHtmlMessage() {
	swal({
		title: "HTML <small>Title</small>!",
		text: "A custom <span style=\"color: #CC0000\">html<span> message.",
		html: true
	});
}

function showAutoCloseTimerMessage() {
	swal({
		title: "Auto close alert!",
		text: "I will close in 2 seconds.",
		timer: 2000,
		showConfirmButton: false
	});
}

function showPromptMessage() {
	swal({
		title: "An input!",
		text: "Write something interesting:",
		type: "input",
		showCancelButton: true,
		closeOnConfirm: false,
		animation: "slide-from-top",
		inputPlaceholder: "Write something"
	}, function(inputValue) {
		if (inputValue === false) return false;
		if (inputValue === "") {
			swal.showInputError("You need to write something!");
			return false
		}
		swal("Nice!", "You wrote: " + inputValue, "success");
	});
}

function showAjaxLoaderMessage() {
	swal({
		title: "Ajax request example",
		text: "Submit to run ajax request",
		type: "info",
		showCancelButton: true,
		closeOnConfirm: false,
		showLoaderOnConfirm: true,
	}, function() {
		setTimeout(function() {
			swal("Ajax request finished!");
		}, 2000);
	});
}
