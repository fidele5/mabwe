<head>
	<title>{{ getenv("APP_NAME") }}</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="/css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/css/magnific-popup.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/css/ticker-style.css"/>
	<link rel="stylesheet" type="text/css" href="/css/style.css" media="screen">

	@if (Route::current()->getName() === "company" || Route::current()->getName() === "about" || Route::current()->getName() === "partners")
		<link rel="stylesheet" href="/assets/css/plugins/swiper.min.css">
		<link rel="stylesheet" href="/assets/css/plugins/fontawesome-5.css">
		<link rel="stylesheet" href="/assets/css/plugins/unicons.css">
		<link rel="stylesheet" href="/assets/css/plugins/fancybox.min.css">
		<link rel="stylesheet" href="/assets/css/plugins/metismenu.css">
		
		<link rel="stylesheet" href="/assets/css/plugins/hover-revel.css">
		<link rel="stylesheet" href="/assets/css/plugins/animate.min.css">
		<link rel="stylesheet" href="/assets/css/style.css">
	@endif

</head>