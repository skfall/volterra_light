<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>{{ $meta->get('meta_title') }}</title>
	<meta name="keywords" content="{{ $meta->get('meta_keys') }}" />
	<meta name="description" content="{{ $meta->get('meta_desc') }}" />
	<meta name="_token" content="{{ csrf_token() }}">

	@if($config->site_index)
		<meta name="robots" content="index, follow" />
	@else
		<meta name="robots" content="noindex, nofollow" />
	@endif
	
	<meta name="author" content="Positive Business" />
	<link rel="shortcut icon" href="{{ RS.'android-icon-48x48.png'}}">

	<?php /* STYLES */ ?>
	<link rel="stylesheet" type="text/css" href="{{ CSS.'materialize.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'jquery.fancybox.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'jquery.fullpage.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'animate.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'owl.carousel.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'remodal.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'app.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'fonts.css' }}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
	
	@if ($config->top_script)
		<script type="text/javascript">
			<?= $config->top_script; ?>
		</script>
	@endif
</head>
<body class="{{ $body_class }}">
	<script type="text/javascript">
		var RS = '<?= RS; ?>';
		var LANG = '<?= LANG; ?>';
		var PAGE = '<?= PAGE; ?>';
	</script>
	@include('elements.recall')
	@include('elements.header')
	<div class="main_wrapper por">
		@include('elements.preloader')
		@yield("content")
	</div>
	@if(PAGE != 'home')
		@include('elements.footer')
	@endif

	

	<?php /* SCRIPTS */ ?>
	<script type="text/javascript" src="{{ JS.'jquery-2.2.4.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'materialize.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'jquery.fullpage.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'owl.carousel.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'jquery.fancybox.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'jquery.maskedinput.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'remodal.min.js' }}"></script>
	<script type="text/javascript" src="{{ JS.'app.js' }}"></script>

	<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
	<script type="text/javascript">
		initMap = function(){
			console.log('...');
		}
	</script>
	@if (isset($project))
		<script>
			var initProjMap = function() {
				$.each($('.project_map'), function(i, el){
					if(el){
						var uluru = {lat: $(el).data('lat'), lng: $(el).data('lng') };
						var map = new google.maps.Map(el, {
							zoom: 13,
							center: uluru,
							styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
						});
						var marker = new google.maps.Marker({
							map: map,
							position: {lat: uluru.lat, lng: uluru.lng}
						});
					}
				});
				if (document.getElementById('project_map')) {
					
				}
		
			}
		</script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpBcrsYo9HedgYUSAfhAkR1RpXQRdrusQ&callback=initProjMap">
		</script>
	@else
		@if($config->lat && $config->lng)
		<script>
				var initContMap = function() {
					if (document.getElementById('contacts_map')) {
						var uluru = {lat:<?= $config->lat ?>, lng:<?= $config->lng ?>};
						var map = new google.maps.Map(document.getElementById('contacts_map'), {
						zoom: 13,
						center: uluru,
						styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
						});
						var marker = new google.maps.Marker({
							map: map,
							position: {lat: uluru.lat, lng: uluru.lng}
						});
					}
			
				}
			</script>
			<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpBcrsYo9HedgYUSAfhAkR1RpXQRdrusQ&callback=initContMap">
			</script>
		@endif
	@endif
	
	
	
    
	@if ($config->bot_script)
		<script type="text/javascript">
			<?= $config->bot_script; ?>
		</script>
	@endif
</body>
</html>