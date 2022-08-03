<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista</title>

	<style>

		table, th, td {

			border: solid 1px;
		}

		table {

			margin-top: 10px;
		}

		body {

			margin-left: 3%;
			margin-top: 3%;
		}

	</style>

</head>
<body>

	<h2>Listado de usuarios</h2>

	<a href="<?=DOMAIN?>/controlusuarios/nuevo">Insertar nuevo usuario</a>

	<table class="table">

		<thead>

			<tr>
				<th>Nombre</th>
				<th>Clave</th>
			</tr>

		</thead>
		<tbody>

		<?php foreach ($users as $user) { ?>

			<tr>
				<td><a href='<?= DOMAIN?>/controlusuarios/ver/<?=$user->nombre?>'><?= $user->nombre ?></a></td>
				<td><?= $user->clave ?></td>
				<td><form action='<?= DOMAIN?>/controlusuarios/eliminar' method = "post">
						<input type="hidden" name="usuario" value='<?= $user->nombre?>'>
						<input type="submit" value="Eliminar">
					</form>

				</td>

			</tr>

		<?php } ?>
			

		</tbody>

	</table>



</body>
</html>