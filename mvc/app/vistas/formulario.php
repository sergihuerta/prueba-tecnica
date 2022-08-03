<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Autentificación</title>
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

	<h2>Autentificación</h2>

	<form action="<?= DOMAIN?>/controlusuarios/autentificar" method ="post">

		<p class="mensaje"><?= $mensaje?></p>

		<div class="parte">

			<label for="usuario">Usuario: </label>
			<input type="text" name="usuario" value="<?= $usuario?>">

		</div>

		<div class="parte">

			<label for="clave">Clave: </label>
			<input type="password" name="clave" value="<?= $clave?>">

		</div>

		<div class="parte">

			<input type="submit" value="Login">

		</div>

	</form>

</body>
</html>