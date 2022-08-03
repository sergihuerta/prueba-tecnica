<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nuevo usuario</title>
	<style>

		.parte {

			margin-bottom: 10px;
		}

		.mensaje {

			color: red;
		}

		body {

			margin-left: 3%;
			margin-top: 3%;
		}

	</style>
</head>
<body>

	<h2>Nuevo usuario</h2>

	<p class="mensaje"><?= $mensaje ?></p>

	<form action="<?=DOMAIN?>/controlusuarios/insertar" method="post">

		<div class="parte">

			<label for="usuario">Usuario: </label>
			<input type="text" name="usuario" value="<?= $nombre ?>">

		</div>

		<div class="parte">

			<label for="clave">Clave: </label>
			<input type="text" name="clave" value="<?= $clave ?>">

		</div>

		<div class="parte">

			<input type="submit" value="Registrar">

		</div>

	</form>

	<a href="<?= DOMAIN ?>/controlusuarios/listar">Volver a lista de usuarios</a>

</body>
</html>