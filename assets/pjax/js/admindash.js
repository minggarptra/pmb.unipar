$(function () {
	if ($.support.pjax) {
		
		$(document).pjax('a[data-pjax]', '#pjax-container')
	}
});