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
				<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/sidebar.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
				<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
                <title>'.$title.'</title>
            </head>
        ');
	}

	public static function navIndex()
	{
		print('
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
				<img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
				Medic-Partner
				</a>
			</nav>
		');
	}

	public static function nav()
	{
		print('
            <body>
				<div class="wrapper">
					<!-- Sidebar  -->
					<nav id="sidebar">
						<div class="sidebar-header">
							<h3>Medic-Partner</h3>
							<strong>MP</strong>
						</div>
						<ul class="list-unstyled components">
							<li class="active">
								<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
									<i class="fas fa-home"></i>
									Inicio
								</a>
								<ul class="collapse list-unstyled" id="homeSubmenu">
									<li>
										<a href="#">Home 1</a>
									</li>
									<li>
										<a href="#">Home 2</a>
									</li>
									<li>
										<a href="#">Home 3</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="fas fa-briefcase"></i>
									About
								</a>
								<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
									<i class="fas fa-copy"></i>
									Pages
								</a>
								<ul class="collapse list-unstyled" id="pageSubmenu">
									<li>
										<a href="#">Page 1</a>
									</li>
									<li>
										<a href="#">Page 2</a>
									</li>
									<li>
										<a href="#">Page 3</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="fas fa-image"></i>
									Portfolio
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fas fa-question"></i>
									FAQ
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fas fa-paper-plane"></i>
									Contact
								</a>
							</li>
						</ul>
					</nav>
				<!-- Page Content  -->
				<div id="content">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container-fluid">
							<button type="button" id="sidebarCollapse" class="btn btn-info">
								<i class="fas fa-align-left"></i>
								<span>Ocultar menú</span>
							</button>
							<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<i class="fas fa-align-justify"></i>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="nav navbar-nav ml-auto">
									<li class="nav-item active">
										<a class="nav-link" href="#">Page</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Page</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Page</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Page</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
        ');
	}

	public static function footer()
	{
		print('
				<footer>
					<div class="row">
						<div class="col col-sm-12">
							<h1>Prueba</h1>
						</div>
					</div>
				</footer>
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
            </body>
            </html>
        ');
	}
}

