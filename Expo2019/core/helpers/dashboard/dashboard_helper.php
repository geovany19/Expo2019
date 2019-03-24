<?php
class dashboard_helper
{
	public static function head($title)
	{
		print('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
				<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/mdb.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/sidenav.css">
                <title>' . $title . '</title>
            </head>
        ');
	}

	public static function nav()
	{
		print('
            <body>
				<nav>
					<!-- SideNav slide-out button -->
						<a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i class="fas fa-bars"></i></a>
						<!-- Sidebar navigation -->
						<div id="slide-out" class="side-nav fixed wide sn-bg-1">
						<ul class="custom-scrollbar">
							<!-- Logo -->
							<li>
							<div class="logo-wrapper sn-ad-avatar-wrapper">
								<a href="#"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle"><span>Anna
									Deynah</span></a>
							</div>
							</li>
							<!--/. Logo -->
							<!-- Side navigation links -->
							<li>
							<ul class="collapsible collapsible-accordion">
								<li><a class="collapsible-header waves-effect arrow-r active"><i class="sv-slim-icon fas fa-chevron-right"></i>
									Submit blog<i class="fas fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
									<li><a href="#" class="waves-effect active">
										<span class="sv-slim"> SL </span>
										<span class="sv-normal">Submit listing</span></a>
									</li>
									<li><a href="#" class="waves-effect">
										<span class="sv-slim"> RF </span>
										<span class="sv-normal">Registration form</span></a>
									</li>
									</ul>
								</div>
								</li>
								<li><a class="collapsible-header waves-effect arrow-r"><i class="sv-slim-icon far fa-hand-point-right"></i>
									Instruction<i class="fas fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
									<li><a href="#" class="waves-effect">
										<span class="sv-slim"> FB </span>
										<span class="sv-normal">For bloggers</span></a>
									</li>
									<li><a href="#" class="waves-effect">
										<span class="sv-slim"> FA </span>
										<span class="sv-normal">For authors</span></a>
									</li>
									</ul>
								</div>
								</li>
								<li><a class="collapsible-header waves-effect arrow-r"><i class="sv-slim-icon fas fa-eye"></i> About<i
									class="fas fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
									<li><a href="#" class="waves-effect">
										<span class="sv-slim"> I </span>
										<span class="sv-normal">Introduction</span></a>
									</li>
									<li><a href="#" class="waves-effect">
										<span class="sv-slim"> MM </span>
										<span class="sv-normal">Monthly meetings</span></a>
									</li>
									</ul>
								</div>
								</li>
								<li><a class="collapsible-header waves-effect arrow-r"><i class="sv-slim-icon far fa-envelope"></i>
									Contact me<i class="fas fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
									<li>
										<a href="#" class="waves-effect">
										<span class="sv-slim"> F </span>
										<span class="sv-normal">FAQ</span>
										</a>
									</li>
									<li>
										<a href="#" class="waves-effect">
										<span class="sv-slim"> W </span>
										<span class="sv-normal">Write a message</span>
										</a>
									</li>
									</ul>
								</div>
								</li>
								<li><a id="toggle" class="waves-effect"><i class="sv-slim-icon fas fa-angle-double-left"></i>Minimize
									menu</a>
								</li>
							</ul>
							</li>
							<!--/. Side navigation links -->
						</ul>
						<div class="sidenav-bg rgba-blue-strong"></div>
						</div>
						<!--/. Sidebar navigation -->
				</nav>
        ');
	}

	public static function footer()
	{
		print('
				<footer>

				</footer>
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/mdb.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
            </body>
            </html>
        ');
	}
}

