
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Blue Monkey Tours | Dash Board</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="assets/css/ionicons.css" rel="stylesheet" type="text/css">
		<link href="assets/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<!--Morris Chart -->
		<link rel="stylesheet" href="assets/js/morris-chart/morris.css">
		<link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
		<link href="assets/css/weather-icons.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/responsive.css" rel="stylesheet">
		<link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119595512-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119595512-1');
</script>
	</head>

	<body>
		<div class="wrapper">
			<!-- header -->
			<header class="main-header">
				<div class="container_header">
					<div class="logo d-flex align-items-center">
						<a href="#"> <h3 style="color: #fff;text-align: center;padding: 10px; margin-top: 15px;">DASHBOARD</h3>
							<span class="logo-default"> </a>
						<div class="icon_menu full_menu">
							<a href="#" class="menu-toggler sidebar-toggler"></a>
						</div>
					</div>
					<div class="right_detail">
						<div class="row d-flex align-items-center min-h pos-md-r">
							<div class="col-xl-5 col-3 search_col ">
								<div class="top_function">

								</div>
							</div>
							<div class="col-xl-7 col-9 d-flex justify-content-end">
								<div class="right_bar_top d-flex align-items-center">
									<!-- Dropdown_User -->
									<div class="dropdown dropdown-user">
										<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> <img class="img-circle pro_pic" src="images/index.png" alt=""> </a>
										<ul class="dropdown-menu dropdown-menu-default">
											<li>
												<a href="#"> <i class="icon-user"></i> Profile </a>
											</li>
											
											<li class="divider"></li>
											
											<li>
												<a href="logout"> <i class="icon-logout"></i> Log Out </a>
											</li>
										</ul>
									</div>
									<!-- Dropdown_User_End -->
								</div>
							</div>
						</div>
					</div>
				</div>

			</header>
			<!-- header_End -->
			<!-- Content_right -->
			<div class="container_full">

				<div class="side_bar scroll_auto">
					<div class="user-panel">
						<div class="user_image">
							<img src="images/index.png" class="box_all_shedo img-circle mCS_img_loaded" alt="User Image">
						</div>
						<div class="info">
							<p>
								<?php echo $userFound['first_name']." ".$userFound['last_name'];?>
							</p>
							<a href="#"> <i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>

					<ul id="dc_accordion" class="sidebar-menu tree">
						<li class="menu_sub active">
							<a href="home"> <i class="fa fa-home"></i> <span>Home</span>  </a>
							
						</li>
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-home"></i> <span>Home Page Slide Mgt </span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li>
									<a href="addSlide">Add Slide</a>
								</li>
								<li>
									<a href="viewSlide">View Slide</a>
								</li>	
							</ul>
						</li>
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-flag"></i> <span>Tour Management </span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li>
									<a href="addTour">Add Tour</a>
								</li>
								<li>
									<a href="allTours">View All Tours</a>
								</li>	
							</ul>
						</li>
						
						
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-table"></i> <span>Services </span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li class="">
									<a href="accomodation">Accomodation</a>
								</li>
								<li>
									<a href="addCar">Car Rental</a>
								</li>
							</ul>
						</li>
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-book"></i> <span>About us</span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li>
									<a href="addAbout">Add About us Content</a>
								</li>
								<li>
									<a href="viewAbout">View About us Content</a>
								</li>
							</ul>
						</li>
						
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-image"></i> <span>Gallery</span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li>
									<a href="addPhoto">Add Photos</a>
								</li>
								<li>
									<a href="#">View All Photos</a>
								</li>
								
							</ul>
						</li>
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-phone"></i> <span>Contact us</span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li>
									<a href="#">Add Address</a>
								</li>
								<li>
									<a href="#">Add Social Media</a>
								</li>
								<li>
									<a href="#">View All Message</a>
								</li>
							</ul>
						</li>
						<li class="menu_sub">
							<a href="#"> <i class="fa fa-user"></i> <span>User Management</span> <span class="arrow"></span> </a>
							<ul class="down_menu">
								<li>
									<a href="addUser">Add User</a>
								</li>
								<li>
									<a href="#">View All Users</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>