$(function () {

	user_online_check()

	setInterval(user_online_check, 60 * 1000)

	function user_online_check() {
		$.post(API_URL + '/user/online-check')
	}

	$('#filter-btn').click(function() {
		filter_toggle()
	})

	$('#filter-close').click(function() {
		filter_toggle()
	})

	function filter_toggle() {
		$('#filter').toggleClass('hidden')
		$('.filter-icon').toggleClass('hidden')
	}

})
