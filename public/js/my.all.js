//$('#left_slide_navbar').pin();
//
//
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#slide_up').click(function () {
	$("header").slideUp("slow");
});

autosize(document.querySelector('textarea'));



