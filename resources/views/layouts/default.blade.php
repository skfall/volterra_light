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
	
	<?php /* STYLES */ ?>
	<link rel="stylesheet" type="text/css" href="{{ CSS.'materialize.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'jquery.fancybox.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'jquery.fullpage.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'animate.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'owl.carousel.min.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'app.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'fonts.css' }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ CSS.'flag-icon.min.css' }}">
	
</head>
<body class="{{ $body_class }}">
	<script type="text/javascript">
		var RS = '<?= RS; ?>';
		var LANG = '<?= LANG; ?>';
		var PAGE = '<?= PAGE; ?>';
	</script>
	
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
	<script type="text/javascript" src="{{ JS.'app.js' }}"></script>

</body>
</html>