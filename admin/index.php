<?php 
	require ('../lib/php/requirements.php');
	beAdmin("");

	$bodyTypes = $model->getBodyTypes();
	$colors = $model->getColors()
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pidu's Shop</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../lib/external/bootstrap-toggle/bootstrap-toggle.min.css">
		<link rel="stylesheet" href="../lib/css/styleAdmin.css" />
		<link rel="stylesheet" href="../lib/css/styleClient.css" />
		<link rel="shortcut icon" href="../lib/img/logo.png" title="Favicon">
	</head>
	<body>
		<div class="container-fluid p-0 bg-admin">
			<div class="container">
				<header class="py-5 text-white">
					<a href="index.php" class="logo">
						<img src="../lib/img/logo.png" alt="" /><span class="title pl-3">Pidu's Shop - Administration</span>
					</a>
					<div id="disconnect" class="btn btn-primary position-absolute">Deconnexion</div>
				</header>
				<div class="row">
					<table class="table table-striped">
						<thead class="thead-dark">
							<tr>
								<th class="text-center" scope="col">#</th>
								<th class="text-center" scope="col">Marque Modèle</th>
								<th class="text-center" scope="col">Année</th>
								<th class="text-center" scope="col">Kilométrage</th>
								<th class="text-center" scope="col">Carosserie</th>
								<th class="text-center" scope="col">Couleur</th>
								<th class="text-center" scope="col">Prix</th>
								<th class="text-center" scope="col">Visibilté</th>
								<th class="text-center" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($model->getCars(true) as $car){
								View::formattedCar($car, $bodyTypes, $colors);
							} ?>
							<tr>
								<th class="align-middle text-center" scope="row">
									<button type="button" class="btn btn-add-car">
										<i class="fa fa-plus fa-1x"></i>
									</button>
								</th>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModal" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Description</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<textarea class="w-100"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Terminé</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="picturesModal" tabindex="-1" role="dialog" aria-labelledby="picturesModal" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Photos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row align-items-center">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Terminé</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Supprimer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Êtes-vous sûr de vouloir continuer ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Oui</button>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<script src="../lib/external/bootstrap-toggle/bootstrap-toggle.min.js"></script>
		<script src="../lib/js/appAdmin.js"></script>
	</body>
</html>