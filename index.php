<?php 
	require ('lib/php/requirements.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pidu's Shop</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="lib/css/styleClient.css" />
		<link rel="shortcut icon" href="lib/img/logo.png" title="Favicon">
	</head>
	<body>
		<div class="container-fluid p-0">
			<header class="header text-white">
				<div class="container">
					<a href="index.php" class="logo">
						<img src="lib/img/logo.png" alt="" /><span class="title pl-3">Pidu's Shop</span>
					</a>
					<div class="introduction">
						<h1>We are Pidu's Shop,<br />
						We find the classic car you dream of.</h1>
					</div>
				</div>
			</header>

			<div class="main bg-white position-relative">
				<div class="container">
					<div class="row">
						<p class="text-center mx-auto p-5 welcome">
							Nous sommes des passionnés et nous prenons du plaisir à partager cette passion
							avec vous.
						</p>
					</div>
					
					<h2 class="text-center">• NOTRE PHILOSOPHIE •</h2>
					<div class="row">
						<p class="text-justify text-indent p-2">
							Nous mettons un point d'honneur à trouver la voiture de collection 
							qui correspond le plus aux attentes de nos clients. 
							Nous nous occupons de tout : De l'achat et la restauration dans les 
							règles de l'art si elle est nécessaire en passant par l'entretien de 
							ces vieilles mécaniques qui, même si elles sont très fiables, ne 
							fonctionneront jamais aussi bien qu'avec un entretien régulier 
							effectué par des connaisseurs. Et pour finir, dans certains cas, de 
							la vente parce que au cours d'une vie, les goûts et les moyens évoluent. 
							N'hésitez pas à passer au shop un de ces jours, nous parlerons de 
							vieilles mécaniques autour d'une bonne bière.
						</p>
					</div>
					<h2 class="text-center">• NOS VOITURES DISPONNIBLES •</h2>
					<div class="row">
						<div class="multifilter mx-auto">
							<?php foreach(range(1, 3) as $i): ?>
								<div class="bodyType" id="b<?= $i ?>" data-groupmultifilter="idBodyType-<?= $i ?>"></div>
							<?php endforeach; ?>
					</div>
					</div>
					<div class="row">
						<div class="multifilter mx-auto">
							<?php foreach(range(1, 8) as $i): ?>
								<div>
									<label class="checkbox">
										<input type="checkbox" data-groupmultifilter="idColor-<?= $i ?>">
										<span class="checkmark color-<?= $i ?>"></span>
									</label>
								</div>
							<?php endforeach; ?> 
						</div>
					</div>
					<div class="row no-grutters filtr-container">
						<?php foreach($model->getCars(false) as $car):?>
							<div id="<?= $car->id ?>" class="col-sm-6 col-md-4 filtr-item" data-category="idBodyType-<?= $car->idBodyType ?>, idColor-<?= $car->idColor ?>" data-toggle="modal" data-target="#detailsModal">
								<img class="img-custom" src="lib/img/cars/<?= $car->getHeaderPicture()->filename ?>" alt="image">
								<span class="item-desc"><?= $car->brand." ".$car->model ?></span>
							</div>
						<?php endforeach; ?> 
					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container">
					<h2>Contactez-nous</h2>
					<div class="row align-items-center">
						<div class="col-md-6">
							<form method="post" action="#">
								<div class="form-group">
									<label for="name">Nom</label>
									<input type="text" name="name" id="name" class="form-control" />
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="message">Message</label>
									<textarea name="message" id="message" rows="4" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" value="Envoyer" class="btn btn-primary btn-block"/>
								</div>
							</form>
						</div>
						<div class="mx-auto">
							<div class="m-1">
								<i class="fa fa-home fa-fw"></i>
								Pidu's Shop<br />
								Chemin du Champ de Mars 15<br />
								7000 Mons
							</div>
							<div class="m-1">
								<i class="fa fa-phone fa-fw"></i>
								065/40.12.20
							</div>
							<div class="m-1">
								<i class="fa fa-envelope fa-fw"></i>
								contact@pidusshop.com
							</div>
							<div class="m-1">
								<i class="fa fa-twitter fa-fw"></i>
								<a href="#">twitter.com/pidusshop</a>
							</div>
							<div class="m-1">
								<i class="fa fa-facebook fa-fw"></i>
								<a href="#">facebook.com/pidusshop</a>
							</div>
							<div class="m-1">
								<i class="fa fa-instagram fa-fw"></i>
								<a href="#">instagram.com/pidusshop</a>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="mx-auto text-center">&copy; Pidu's Website. All rights reserved</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModal" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
				</div>
			</div>
		</div>

		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<script src="lib/external/filterizr/1.3.0/jquery.filterizr.min.js"></script>
		<script src="lib/js/appClient.js"></script>

	</body>
</html>