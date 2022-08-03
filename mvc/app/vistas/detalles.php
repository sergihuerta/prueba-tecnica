<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detalles</title>
	<style>

		.parte {

			margin-bottom: 10px;
		}

		body {

			margin-left: 3%;
			margin-top: 3%;
		}

	</style>
</head>
<body>

	<h2>Detalles de <?= ucfirst($user->nombre) ?></h2>

	<form action='<?= DOMAIN?>/controlusuarios/actualizar' method="post">

		<input type="hidden" name="usuario" value='<?= $user->nombre?>'>

		<div class="parte">

			<label for="clave">Clave: </label>
			<input type="text" name="clave" value='<?= $user->clave?>'>
			
		</div>

		<div class="parte">

			<input type="submit" value="modificar"><br>

		</div>

		<div class="parte">

			<a href="<?= DOMAIN?>/controlusuarios/listar">Volver a lista de usuarios</a>

		</div>

	</form>

</body>
</html>