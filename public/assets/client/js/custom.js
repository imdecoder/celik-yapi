$(function() {

	$('.search-toggle').click(function() {
		$('.search-input').focus()
	})

	$('.icon-cart').click(function() {
		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		})

		$('html').css('overflow', 'hidden')
	})

	$('.close-left').click(function() {
		$('html').css('overflow', 'auto')
	})

	$('.zoa-addcart').click(function() {
		const code = $(this).parent().data('product')

		const val = $(this).parents('.element-button').find('.zoa-qtt input[name="qty"]').val()
		const qty = val > 0 ? val : 1

		$.post(API_URL + '/product/cart', { action: 'add', code: code, qty: qty }, function(data) {
			Swal.fire({
				title: data.title,
				text: data.text,
				icon: data.icon,
				confirmButtonText: 'Tamam'
			}).then(function() {
				window.location.reload()
			})
		})
	})

	$('.cart-qtt button').click(function() {
		const code = $(this).data('field')
		const qty = $(this).parents('.cart-qtt').find('input[name="qty"]').val()

		let action = 'update'

		if (qty <= 0) {
			action = 'delete'
		}

		$.post(API_URL + '/product/cart', { action: action, code: code, qty: qty }, function(data) {
			Swal.fire({
				title: data.title,
				text: data.text,
				icon: data.icon,
				confirmButtonText: 'Tamam'
			}).then(function() {
				window.location.reload()
			})
		})
	})

	$('.zoa-wishlist, .btn-wishlist').click(function() {
		const code = $(this).parent().data('product') ?? $(this).data('product')

		Swal.fire({
			title: 'Uyarı!',
			text: 'Favorilere ekleme özelliği kapatılmıştır.',
			icon: 'warning',
			confirmButtonText: 'Tamam'
		})

		/*$.post(API_URL + '/product/wishlist', { code: code }, function(data) {
			Swal.fire({
				title: data.title,
				text: data.text,
				icon: data.icon,
				confirmButtonText: 'Tamam'
			}).then(function() {
				// TODO: Burayı geliştir! ;)
			})
		})*/
	})

	$('.social a').click(function() {
		const href = $(this).parent().data('href')

		// TODO: Buraya sosyal medyada paylaşım yapmak için açılan pencereler ekle.
	})

	$('.filter-collection-left > a').click(function() {
		$('body').css('overflow', 'hidden')

		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		})
	})

	$(document).bind('mouseup touchend', function(e) {
        const container = $('#filter-sidebar') 

		if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            $('.wrappage').removeClass('show-filter')
			$('body').css('overflow', 'auto')
        }

		const pushmenu = $('.pushmenu')
		const searchFormWrapper = $('.search-form-wrapper')
		const accountFormWrapper = $('.account-form-wrapper')

		if (
			(!pushmenu.is(e.target) && pushmenu.has(e.target).length === 0) &&
			(!searchFormWrapper.is(e.target) && searchFormWrapper.has(e.target).length === 0) &&
			(!accountFormWrapper.is(e.target) && accountFormWrapper.has(e.target).length === 0)
		)
        {
            $('html').css('overflow', 'auto')
        }
    })

	$(document).on('keyup', function(evt) {
		const accountFormWrapper = $('.account-form-wrapper')

        if (evt.keyCode == 27 && accountFormWrapper.css('display') === 'none') {
			$('html').css('overflow', 'auto')
        }
    })

	$('.js-user, .search-toggle').click(function() {
		$('html').css('overflow', 'hidden')
		$('.scroll_top').css('display', 'none')
    })

	$('.btn-search-close').on('click', function() {
		$('html').css('overflow', 'auto')
    })

	$('.icon-pushmenu').click(function() {
        $('html, body').css('overflow', 'unset')
    })

})
