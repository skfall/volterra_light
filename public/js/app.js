"use strict";

var network = {
	post: function(path, params, cb, type){
		$.ajax({
			url: path,
			type: 'post',
			data: params,
			headers: { "X-CSRF-TOKEN" : $('meta[name="_token"]').attr('content') },
			dataType: type,
			success: function (response, status) {
				if (status == "success") {
					if (response.reason == "token_timeout") {
						var new_token = response.new_token;
						$('meta[name="_token"]').attr('content', new_token);
						network.post(path, params, cb, type);
					}else{
						cb(response);
					}
				}
			}
		});
	},
	change_lang: function(lang, curr_page){
		network.post(RS + "ajax/", { action: 'change_lang', lang: lang, curr_page: curr_page }, function(response){
			if (response.status == "success") {
				document.location.href = response.new_destination;
			}
		}, "json");
	},
	register: function(){
		var form = $('#reg_form');
		var btn_wrapper = $('.reg_btn_wrapper');
		var btn = `
			<a class="waves-effect waves-light btn-large block" onclick="network.register()"><i class="material-icons left">check_circle</i>Register</a>
		`;
		btn_wrapper.html(`
			<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue-only">
			<div class="circle-clipper left">
			<div class="circle"></div>
			</div><div class="gap-patch">
			<div class="circle"></div>
			</div><div class="circle-clipper right">
			<div class="circle"></div>
			</div>
			</div>
			</div>
		`);
		this.post(RS + 'ajax/', form.serialize(), function(response){
			if (response.status == "success") {
				$('.reg_btn_wrapper').html("Successfull registration.");
				setTimeout(function(){
					document.location.href = RS + LANG + 'profile/';
				}, 1000);
			}else{
				btn_wrapper.html(btn);
			}
		}, "json");
		btn_wrapper.html(btn);
	},
	login: function(){
		var form = $('#login_form');
		var btn_wrapper = $('.reg_btn_wrapper');
		var btn = `
			<a class="waves-effect waves-light btn-large block" onclick="network.login()"><i class="material-icons left">person</i>Login</a>
		`;
		btn_wrapper.html(`
			<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue-only">
			<div class="circle-clipper left">
			<div class="circle"></div>
			</div><div class="gap-patch">
			<div class="circle"></div>
			</div><div class="circle-clipper right">
			<div class="circle"></div>
			</div>
			</div>
			</div>
		`);
		this.post(RS + 'ajax/', form.serialize(), function(response){
			if (response.status == "success") {
				$('.reg_btn_wrapper').html("Successfull login.");
				setTimeout(function(){
					document.location.href = RS + LANG + 'profile/';
				}, 1000);
			}else{
				btn_wrapper.html(btn);
			}
		}, "json");
		btn_wrapper.html(btn);
	}
};

var app = {
	start: function(){
		if (document.getElementById('home_slider_wrap_bg')) {
			document.getElementById('home_slider_wrap_bg').ondragstart = function() { return false; };
		}
		if (document.getElementById('home_slider_wrap_bg2')) {
			document.getElementById('home_slider_wrap_bg2').ondragstart = function() { return false; };
		}
		this.reinit();
		this.bind();
		$('#preloader').addClass('animated fadeOut');
		setTimeout(function(){
			$('#preloader').hide(0);
		}, 1000);
	},
	sidebar: document.querySelector('.sidenav'),
	sidebar_instance: {},
	home_owl: {},
	home_owl2: {},
	reinit: function(){
		M.AutoInit();
		$('#fullpage').fullpage({
			responsiveWidth: 993,
			afterLoad: function(anchorLink, index){
				$('.fp_sect').removeClass('active');
				$('.fp_sect[data-anchor="'+anchorLink+'"]').addClass('active');

				if (anchorLink == 'end') {
					location.hash = "=)";
					//history.pushState({}, "", this.href);
				}

				if (anchorLink == 'start') {
					setTimeout(function(){
						$('.home_slider').addClass('fadeIn').removeClass('fadeOut');
					}, 100);
				}

				if (anchorLink == 'about') {
					setTimeout(function(){
						$('.home_slider2').addClass('fadeIn').removeClass('fadeOut');
					}, 100);
				}
				
			},
			onLeave: function(index, nextIndex, direction){
				$('.home_slider').addClass('fadeOut').removeClass('fadeIn');
				$('.home_slider2').addClass('fadeOut').removeClass('fadeIn');



				if (index == 1) {
					$('header').addClass('z-depth-4 filled');
				}else{
					if (nextIndex == 1) {
						$('header').removeClass('z-depth-4 filled');
					}
				}

				if (direction == 'up') {
					$('.fp_sect').not('.active').find('[data-a="fade-in"]').addClass('fadeOutDown');

					setTimeout(function(){
						$('.fp_sect.active [data-a="fade-in"]').removeClass('fadeInDown fadeInUp fadeOutUp fadeOutDown');
						$('.fp_sect.active [data-a="fade-in"]').addClass('fadeInDown');
					}, 100);
				}else{
					$('.fp_sect').not('.active').find('[data-a="fade-in"]').addClass('fadeOutUp');
					setTimeout(function(){
						$('.fp_sect.active [data-a="fade-in"]').removeClass('fadeInDown fadeInUp fadeOutUp fadeOutDown');
						$('.fp_sect.active [data-a="fade-in"]').addClass('fadeInUp');
					}, 100);
				}

				$('.top_nav li').removeClass('active');
				$.each($('.top_nav li'), function(i, el){
					var ci = i + 2;
					if (ci == nextIndex) {
						if (!$(el).hasClass('not_anchor')) {
							$(el).addClass('active');
						}
					}
				});

				$('.sidenav li.waves-nav').removeClass('active');
				$.each($('.sidenav li.waves-nav'), function(i, el){
					var ci = i + 2;
					if (ci == nextIndex) {
						if (!$(el).hasClass('not_anchor')) {
							$(el).addClass('active');
						}
					}
				});
			},

			//normalScrollElements: '#home_footer',

		});
		this.home_owl = $('.home_slider').owlCarousel({
		    animateOut: 'fadeOut',
		    animateIn: 'fadeIn',
		    items:1,
		    margin:0,
		    stagePadding:0,
		    smartSpeed:450,
		    autoplay: true,
		    mouseDrag: false,
		    touchDrag: false,
		    pullDrag: false,
		    autoplayTimeout: 6000,
		    onChanged: function(e){
		    	var index = e.item.index || 0;
				$('.slider_trigger .dot').removeClass('active');
				$('.slider_trigger .dot[data-slide="' + (index + 1) + '"]').addClass('active');		   	
		    }
		});

		this.home_owl2 = $('.home_slider2').owlCarousel({
		    animateOut: 'fadeOut',
		    animateIn: 'fadeIn',
		    items:1,
		    margin:0,
		    stagePadding:0,
		    smartSpeed:450,
		    autoplay: true,
		    mouseDrag: false,
		    touchDrag: false,
		    pullDrag: false,
		    autoplayTimeout: 6000,
		    onChanged: function(e){
		    	var index = e.item.index || 0;
				$('.about_slider_trigger .dot').removeClass('active');
				$('.about_slider_trigger .dot[data-slide="' + (index + 1) + '"]').addClass('active');		   	
		    }
		});

		$(".mask").mask("+380 (99) 999-99-99");

		if (PAGE == 'home' && $('.fp_sect.parent_home_slider_sect').hasClass('active')) {
			$.each($('.fp_sect.parent_home_slider_sect [data-a="fade-in"]'), function(i, el){
				setTimeout(function(){
					$(el).addClass('fadeInDown');
				}, 500);
			});
		}

		$('.sidenav').sidenav({
			onCloseStart: function(){
				$('#menu_toogle_btn').removeClass('open');
				$(app.sidebar).removeClass('nav_opened');
			},
			onCloseEnd: function(){
				$('body').css('overflow', 'visible');
			}
		});

		this.sidebar_instance = M.Sidenav.getInstance(this.sidebar);
	},
	bind: function(){
		$('.change_lang').click(function(){
			network.change_lang($(this).data('lang'), $(this).data('action'));
		});
		var home_owl = this.home_owl; 
		$('.slider_trigger .dot').hover(function(){
			home_owl.trigger('stop.owl.autoplay');
		}, function(){
			home_owl.trigger('play.owl.autoplay');
		});

		$('.drag-target, .sidenav-overlay').click(function(e) {
			if($('.fp-responsive').length){
				$('#menu_toogle_btn').removeClass('open');
				$(app.sidebar).removeClass('nav_opened');
			}
		});

		var resize_flag = true;
		$(window).resize(function(){
			var ww = $(window).width();
			if (ww > 768) {
				if (resize_flag) {
					app.sidebar_instance.close();
					resize_flag = false;
				}
			}else{
				resize_flag = true;
			}
		});
		
	},
	changeHomeSlide: function(self){
		var self = self || {};
		var slide = $(self).data('slide') || 0;
		this.home_owl.trigger('to.owl.carousel', slide -1);
	},
	changeHomeSlide2: function(self){
		var self = self || {};
		var slide = $(self).data('slide') || 0;
		this.home_owl2.trigger('to.owl.carousel', slide -1);
	},
	open_mobile_nav: function(self){
		var btn = $(self);
		var instance = app.sidebar_instance;

		if ($(app.sidebar).hasClass('nav_opened')) {
			$(btn).removeClass('open');
			instance.close();
			$(app.sidebar).removeClass('nav_opened');
		}else{
			$(btn).addClass('open');
			instance.open();
			$(app.sidebar).addClass('nav_opened');
		}

	}
};

(function($){
	if (PAGE == 'home') {
		$('.home_slider').hide(0);
		$('.home_slider2').hide(0);

		// $('[data-a="fade-in"]').addClass('fadeOut').removeClass('fadeInUp fadeInDown');

		$('.home_slider').addClass('fadeOut').removeClass('fadeIn');
		$('.home_slider2').addClass('fadeOut').removeClass('fadeIn');
		setTimeout(function(){
			app.start();
		}, 1700);
	}else{
		setTimeout(function(){
			app.start();
		}, 500);
	}
})(jQuery);	