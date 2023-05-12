$(function () {
	if ($.support.pjax) {
		$(document).pjax('a[data-pjax]', '#pjax-container')
		document.getElementById('preloader').style.visibility = "hidden"	
	}
});