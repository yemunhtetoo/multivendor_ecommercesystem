// const { data } = require("autoprefixer");

$(document).ready(function () {

	"use strict";

	/***** Preloader *****/
	$(window).on('load', function () {
		$(".preloader .item-wrapper").delay(500).animate({
			top: "-100%"
		}, 500, "easeInQuart");
		$(".preloader").delay(500).fadeOut(500);
	});

	/***** Sicky Menu *****/
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 200) {
			$(".sticky-menu").removeClass("sticky");
		} else {
			$(".sticky-menu").addClass("sticky");
		}
	});


	/***** Owl Carousel *****/

	// Home 1 Slider
	$(".owl-slider").owlCarousel({
		autoplay: true,
		autoplayTimeout: 7000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		autoplayHoverPause: true,
		smartSpeed: 700,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: true,
		navText: ['<img src="http://127.0.0.1:8000/front/images/left-arrow.png" alt="" />', '<img src="http://127.0.0.1:8000/front/images/right-arrow.png" alt="" />'],
		margin: 0,
		dots: true
	});

	$(".owl-slider").on('translate.owl.carousel', function () {
		$('.slider-item .img1.effect').removeClass('wow').hide();
		$('.slider-item .img2.effect').removeClass('wow').hide();
		$('.slider-item .slider-box .effect').removeClass('wow').hide();
	});

	$(".owl-slider").on('translated.owl.carousel', function () {
		$('.owl-item.active .slider-item .img1.effect').addClass('animated').show();
		$('.owl-item.active .slider-item .img2.effect').addClass('animated').show();
		$('.owl-item.active .slider-item .slider-box .effect').addClass('animated').show();
	});

	// Home 2 Slider
	$(".slider-wrapper").owlCarousel({
		autoplay: true,
		autoplayTimeout: 7000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		autoplayHoverPause: true,
		smartSpeed: 200,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: true,
		navText: ['<img src="http://127.0.0.1:8000/front/images/left-arrow.png" alt="" />', '<img src="http://127.0.0.1:8000/front/images/right-arrow.png" alt="" />'],
		margin: 0,
		dots: true
	});

	$(".slider-wrapper").on('translate.owl.carousel', function () {
		$('.slider-item .img1.effect').removeClass('wow').hide();
		$('.slider-item .img2.effect').removeClass('wow').hide();
		$('.slider-item .slider-box .effect').removeClass('wow').hide();
	});

	$(".slider-wrapper").on('translated.owl.carousel', function () {
		$('.owl-item.active .slider-item .img1.effect').addClass('animated').show();
		$('.owl-item.active .slider-item .img2.effect').addClass('animated').show();
		$('.owl-item.active .slider-item .slider-box .effect').addClass('animated').show();
	});

	// Best Deal
	$(".bt-body").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 0,
		dots: false,
	});

	// Hot Offer
	$(".ht-body").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 0,
		dots: false,
	});

	// Feature Product Home 1
	$(".tab-slider").owlCarousel({
		autoplay: false,
		autoplayTimeout: 7000,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 3,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 20,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			}
		}
	});

	// New Product Home 1
	$(".new-slider").owlCarousel({
		autoplay: false,
		autoplayTimeout: 7000,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 3,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 20,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			}
		}
	});

	// Top Seller
	$(".slr-slider").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 3,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 20,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			}
		}
	});

	// Blog Slider
	$(".blog-slider").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 3,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 25,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			}
		}
	});

	// Testimonial Slider
	$(".test-body").owlCarousel({
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: false,
		margin: 25,
		dots: true,
	});

	//Top Rated Slider
	$(".rt-slider").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 0,
		dots: false,
	});

	// Brand Slider
	$(".tp-bnd").owlCarousel({
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 6,
		nav: false,
		margin: 20,
		dots: false,
		responsive: {
			0: {
				items: 2
			},
			576: {
				items: 3
			},
			768: {
				items: 4
			},
			992: {
				items: 6
			}
		}
	});

	// Best Offer Slider Home 2
	$(".bst-body").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 1,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 0,
		dots: false,
	});

	// Home 2 blog
	$(".fb-slider").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 3,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 25,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 3
			}
		}
	});

	// Mega Menu Slider
	$(".m-slider").owlCarousel({
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 1,
		margin: 0,
		nav: false,
		dots: false
	});

	// Team slider
	$(".team-slider").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 4,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 25,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			}
		}
	});

	// Similar Item Slider
	$(".sim-slider").owlCarousel({
		autoplay: false,
		autoplayHoverPause: true,
		smartSpeed: 500,
		loop: true,
		responsiveClass: true,
		items: 4,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 25,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			}
		}
	});

	/***** Shopping Cart *****/
	$('.cart-btn').on('click', function (e) {
		e.preventDefault();
		$('.cart-overlay').addClass('visible');
		$('.cart-body').addClass('open');
	});
	$('.close-cart, .cart-overlay').on('click', function (e) {
		e.preventDefault();
		$('.cart-overlay').removeClass('visible');
		$('.cart-body').removeClass('open');
	});

	/***** WOW Js *****/
	new WOW().init();

	/***** Tooltip *****/
	$('[data-toggle="tooltip"]').tooltip();

	/***** Price Filter *****/
	$("#slider-range").slider({
		range: true,
		min: 0,
		max: 1000,
		values: [200, 800],
		slide: function (event, ui) {
			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	});
	$("#amount").val("$" + $("#slider-range").slider("values", 0) +
		" - $" + $("#slider-range").slider("values", 1));

	/***** Quantity Button *****/
	function wcqib_refresh_quantity_increments() {
		jQuery(".quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function (a, b) {
			var c = jQuery(b);
			c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
		})
	}
	String.prototype.getDecimals || (String.prototype.getDecimals = function () {
		var a = this,
			b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
		return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
	}), jQuery(document).ready(function () {
		wcqib_refresh_quantity_increments()
	}), jQuery(document).on("updated_wc_div", function () {
		wcqib_refresh_quantity_increments()
	}), jQuery(document).on("click", ".plus, .minus", function () {
		var a = jQuery(this).closest(".quantity").find(".qty"),
			b = parseFloat(a.val()),
			c = parseFloat(a.attr("max")),
			d = parseFloat(a.attr("min")),
			e = a.attr("step");
		b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
	});

	/***** Star Rating *****/
	var $star_rating = $('.star-rating .fa');
	var SetRatingStar = function () {
		return $star_rating.each(function () {
			if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
				return $(this).removeClass('fa-star-o').addClass('fa-star');
			} else {
				return $(this).removeClass('fa-star').addClass('fa-star-o');
			}
		});
	};
	$star_rating.on('click', function () {
		$star_rating.siblings('input.rating-value').val($(this).data('rating'));
		return SetRatingStar();
	});

	/***** Mobile Menu *****/
	jQuery('nav#dropdown').meanmenu({
		meanScreenWidth: "767"
	});

	/***** Back To Top *****/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 700) {
			$(".back-to-top").fadeIn();
		} else {
			$(".back-to-top").fadeOut();
		}
	});
	$(".back-to-top").on('click', function () {
		$("html, body").animate({ scrollTop: 0 }, 700);
	});

	$("#getPrice").change(function () {
		var size = $(this).val();
		var product_id = $(this).attr("product-id");
		// alert(size);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: '/get-product-price',
			data: { size: size, product_id: product_id },
			type: 'post',
			success: function (resp) {
				// alert(resp['discount']);
				if (resp['discount'] > 0) {
					$(".getAttributePrice").html("<li class='list-inline-item'>Kyats" + resp['final_price'] + "</li><li class='list-inline-item'>Kyats" + resp['product_price'] + "</li>");
				} else {
					$(".getAttributePrice").html("<li class='list-inline-item'>Kyats" + resp['final_price'] + "</li>");
				}
			}, error: function () {
				alert("Error");
			}
		});
	});

	//Update Cart Items Only
	$(document).on('click', '.updateCartItem', function () {
		// alert("test");
		if ($(this).hasClass('plus')) {
			//Get Qty
			var quantity = $(this).data('qty');

			//increase the qty by 1
			var new_qty = parseInt(quantity) + 1;
			// alert(new_qty);
		}
		if ($(this).hasClass('minus')) {
			//Get Qty
			var quantity = $(this).data('qty');
			if (quantity <= 1) {
				alert("Item quantity must be 1 or greater!");
				return false;
			}
			//increase the qty by 1
			var new_qty = parseInt(quantity) - 1;
			// alert(new_qty);
		}
		var cartid = $(this).data('cartid');
		// alert(cartid);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: { cartid: cartid, qty: new_qty },
			url: '/cart/update',
			type: 'post',
			success: function (resp) {
				$(".totalCartItems").html(resp.totalCartItems);
				if (resp.status == false) {
					alert(resp.message);
				}
				$("#appendCartItems").html(resp.view);
				$("#appendHeaderCartItems").html(resp.headerview);
			}, error: function () {
				alert("Error");
			}
		})
	});

	$(document).on('click', '.deleteCartItem', function () {
		var cartid = $(this).data('cartid');
		var result = confirm("Are you sure to delete this Cart Item");
		// alert(cartid);
		if (result) {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: '/cart/delete',
				data: { cartid: cartid },
				type: 'post',
				success: function (resp) {
					$(".totalCartItems").html(resp.totalCartItems);
					$("#appendCartItems").html(resp.view);
					$("#appendHeaderCartItems").html(resp.headerview);
				}, error: function () {
					alert("Error");
				}
			})
		}
	});

	//Register Form Validation
	$("#registerForm").submit(function () {
		$(".loader").show();
		var formdata = $(this).serialize();
		$.ajax({
			url: "/user/register",
			type: "POST",
			data: formdata,
			success: function (resp) {
				if (resp.type == "error") {
					$(".loader").hide();
					$.each(resp.errors, function (i, error) {
						$("#register-" + i).attr('style', 'color:red');
						$("#register-" + i).html(error);
						setTimeout(function () {
							$("#register-" + i).css({
								'display': 'none'
							});
						}, 3000);
					});
				} else if (resp.type == "success") {
					// alert(resp.message);
					$(".loader").hide();
					$("#register-success").attr('style', 'color:green');
					$("#register-success").html(resp.message);
					// window.location.href = resp.url;
				}

			}, error: function () {
				alert("Error");
			}
		})
	});

	//Account Form Validation
	$("#accountForm").submit(function () {
		$(".loader").show();
		var formdata = $(this).serialize();
		$.ajax({
			url: "/user/account",
			type: "POST",
			data: formdata,
			success: function (resp) {
				if (resp.type == "error") {
					$(".loader").hide();
					$.each(resp.errors, function (i, error) {
						$("#account-" + i).attr('style', 'color:red');
						$("#account-" + i).html(error);
						setTimeout(function () {
							$("#account-" + i).css({
								'display': 'none'
							});
						}, 3000);
					});
				} else if (resp.type == "success") {
					// alert(resp.message);
					$(".loader").hide();
					$("#account-success").attr('style', 'color:green');
					$("#account-success").html(resp.message);
					setTimeout(function () {
						$("#account-success").css({
							'display': 'none'
						});
					}, 3000);
					// window.location.href = resp.url;
				}

			}, error: function () {
				alert("Error");
			}
		})
	});

	//Checkout page loader
	$(document).on('click','#placeOrder',function(){
		$(".loader").show();
	});
	
	//Update Password Form Validation
	$("#passwordForm").submit(function () {
		$(".loader").show();
		var formdata = $(this).serialize();
		$.ajax({
			url: "/user/update-password",
			type: "POST",
			data: formdata,
			success: function (resp) {
				if (resp.type == "error") {
					$(".loader").hide();
					$.each(resp.errors, function (i, error) {
						$("#password-" + i).attr('style', 'color:red');
						$("#password-" + i).html(error);
						setTimeout(function () {
							$("#password-" + i).css({
								'display': 'none'
							});
						}, 3000);
					});
				} else if (resp.type == "incorrect") {
					// alert(resp.message);
					$(".loader").hide();
					$("#password-error").attr('style', 'color:red');
					$("#password-error").html(resp.message);
					setTimeout(function () {
						$("#password-error").css({
							'display': 'none'
						});
					}, 3000);
					// window.location.href = resp.url;
				} else if (resp.type == "success") {
					// alert(resp.message);
					$(".loader").hide();
					$("#password-success").attr('style', 'color:green');
					$("#password-success").html(resp.message);
					setTimeout(function () {
						$("#password-success").css({
							'display': 'none'
						});
					}, 3000);
					// window.location.href = resp.url;
				}

			}, error: function () {
				alert("Error");
			}
		})
	});

	//Login Form Validation
	$("#loginForm").submit(function () {
		var formdata = $(this).serialize();
		$.ajax({
			url: "/user/login",
			type: "POST",
			data: formdata,
			success: function (resp) {
				if (resp.type == "error") {
					$.each(resp.errors, function (i, error) {
						$("#login-" + i).attr('style', 'color:red');
						$("#login-" + i).html(error);
						setTimeout(function () {
							$("#login-" + i).css({
								'display': 'none'
							});
						}, 3000);
					});
				} else if (resp.type == "incorrect") {
					$("#login-error").attr('style', 'color:red');
					$("#login-error").html(resp.message);
					setTimeout(function () {
						$("#login-error").css({
							'display': 'none'
						});
					}, 3000);
				} else if (resp.type == "inactive") {
					$("#login-error").attr('style', 'color:red');
					$("#login-error").html(resp.message);
					setTimeout(function () {
						$("#login-error").css({
							'display': 'none'
						});
					}, 3000);
				} else if (resp.type == "success") {
					window.location.href = resp.url;
				}
			}, error: function () {
				alert("Error");
			}
		})
	});

	//Forgot Password Form Validation
	$("#forgotForm").submit(function () {
		$(".loader").show();
		var formdata = $(this).serialize();
		$.ajax({
			url: "/user/forgot-password",
			type: "POST",
			data: formdata,
			success: function (resp) {
				if (resp.type == "error") {
					$(".loader").hide();
					$.each(resp.errors, function (i, error) {
						$("#forgot-" + i).attr('style', 'color:red');
						$("#forgot-" + i).html(error);
						setTimeout(function () {
							$("#forgot-" + i).css({
								'display': 'none'
							});
						}, 3000);
					});
				} else if (resp.type == "success") {
					// alert(resp.message);
					$(".loader").hide();
					$("#forgot-success").attr('style', 'color:green');
					$("#forgot-success").html(resp.message);
					// window.location.href = resp.url;
				}

			}, error: function () {
				alert("Error");
			}
		})
	});

	$("#ApplyCoupon").submit(function () {
		var user = $(this).attr("user");
		// alert(user);
		if (user == 1) {
			//do nothing
		} else {
			alert("Please login to apply Coupon");
			return false;
		}
		var code = $("#code").val();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: 'post',
			data: { code: code },
			url: '/apply-coupon',
			success: function (resp) {
				if (resp.message != "") {
					alert(resp.message);
				}
				$(".totalCartItems").html(resp.totalCartItems);
				$("#appendCartItems").html(resp.view);
				$("#appendHeaderCartItems").html(resp.headerview);
				if (resp.couponAmount > 0) {
					$('.couponAmount').text("Kyats." + resp.couponAmount);
				} else {
					$('.couponAmount').text("Kyats.0");
				}
				if (resp.grand_total > 0) {
					$('.grand_total').text("Kyats." + resp.grand_total);
				}
			}, error: function () {
				alert("Error");
			}
		})
	});

	//Edit Delivery Address
	$(document).on('click', '.editAddress', function () {
		var addressid = $(this).data('addressid');
		// alert(getDelivery);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: { addressid: addressid },
			url: '/get-delivery-address',
			type: 'post',
			success: function (resp) {
				$("#formdelivery").css("display", "block");
				$(".removeChkBox").hide();
				$(".changeDeliText").text("Edit Delivery Address");
				$('[name=delivery_id]').val(resp.address['id']);
				$('[name=delivery_name]').val(resp.address['name']);
				$('[name=delivery_address]').val(resp.address['address']);
				$('[name=delivery_city]').val(resp.address['city']);
				$('[name=delivery_state]').val(resp.address['state']);
				$('[name=delivery_country]').val(resp.address['country']);
				$('[name=delivery_pincode]').val(resp.address['pincode']);
				$('[name=delivery_mobile]').val(resp.address['mobile']);
			}, error: function () {
				alert("Error");
			}
		})
	});

	//Remove Address
	$(document).on('click', '.removeAddress', function () {
		if (confirm("Are you sure to remove this?")) {
			var addressid = $(this).data('addressid');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: '/remove-delivery-address',
				type: 'post',
				data: { addressid: addressid },
				success: function (resp) {
					$("#deliveryAddresses").html(resp.view);
					window.location.href = "checkout";
				}, error: function () {
					alert("Error");
				}
			});
		}
	});

	//Save Delivery Address
	$(document).on('submit', "#addressAddEditForm", function () {
		var formdata = $("#addressAddEditForm").serialize();
		$.ajax({
			url: '/save-delivery-address',
			type: 'post',
			data: formdata,
			success: function (resp) {
				if (resp.type == "error") {
					$(".loader").hide();
					$.each(resp.errors, function (i, error) {
						$("#delivery-" + i).attr('style', 'color:red');
						$("#delivery-" + i).html(error);
						setTimeout(function () {
							$("#delivery-" + i).css({
								'display': 'none'
							});
						}, 3000);
					});
				} else {
					$("#deliveryAddresses").html(resp.view);
					window.location.href = "checkout";
				}
			}, error: function () {
				alert("Error");
			}
		})
	});

	//Calculate Grand total
	$("input[name=address_id]").bind('change',function(){
		var shipping_charges = $(this).attr("shipping_charges");
		//alert(shipping_charges);
		var total_price = $(this).attr("total_price");
		var coupon_amount = $(this).attr("coupon_amount");
		$(".shipping_charges").html("Rs. "+shipping_charges);
		var codpincodeCount = $(this).attr("codpincodeCount");
		var prepaidpincodeCount = $(this).attr("prepaidpincodeCount");
		if(codpincodeCount>0){
			$(".codMethod").show();
		}else{
			$(".codMethod").hide();
		}
		if(prepaidpincodeCount>0){
			$(".prepaidMethod").show();
		}else{
			$(".prepaidMethod").hide();
		}
		if(coupon_amount==""){
			coupon_amount = 0;
			$(".couponAmount").html("Rs. "+coupon_amount);
		}
		var grand_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
		//alert(grand_total);
		$(".grand_total").html("Rs. "+grand_total);
	});
	$("#checkPincode").click(function(){
		// alert("test");	
		var pincode = $("#pincode").val();
		if(pincode==""){
			alert("Please enter pincode");
			return false;
		}
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type:'post',
			data:{pincode:pincode},
			url:'/check-pincode',
			success:function(resp){
				alert(resp);
			},error:function(){
				alert("Error");
			}
		})
	});
});

function addSubscriber(){
	// alert("test");
	var subscriber_email = $("#subscriber_email").val();
	// alert(email);
	var mailFormat =  /\S+@\S+\.\S+/;
	if (subscriber_email.match(mailFormat)) {
		
	} else {
		alert("Invalid address!");
		return false;
	}
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type:'post',
		url:'add-subscriber-email',
		data:{subscriber_email:subscriber_email},
		success:function(resp){
			if(resp=="exists"){
				alert("Your email is already exists for Newsletter Subscription");
			}else if(resp=="saved"){
				alert("Thanks for subscribing");
			}
		},error:function(){
			alert("Error");
		}
	});
}