<?php
class public_helper {
    function head($title)
	{
		print('
            <!DOCTYPE html>
            <html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="ie=edge">
					<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css">
					<link rel="stylesheet" type="text/css" href="../../resources/css/public/estilos_login.css">
					<link rel="stylesheet" type="text/css" href="../../resources/css/public/estilos_public.css">
					<!-- Font Awesome JS -->
					<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
					<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
					<title>SISMED - '.$title.'</title>
				</head>
        ');
	}

    //Método que contiene el navbar, tiene color azul, las opciones del navbar se pueden adaptar
    function navbar()
	{
		print('
				<body>
					<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>


							</div>
						</div>
					</nav>
        ');
	}

	function footer()
	{
		print('
					<footer>

					</footer>
					<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
					<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				</body>
			</html>
        ');
	}
}

?>