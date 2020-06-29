<?php
session_start();
/*Inicia validacion del lado del servidor*/
if (empty($_POST['title'])) {
	$errors[] = "Titulo vacío";
} else if (empty($_POST['description'])) {
	$errors[] = "Description vacío";
} else if (
	!empty($_POST['title']) &&
	!empty($_POST['description'])
) {


	include "../config/config.php"; //Contiene funcion que conecta a la base de datos

	$title = $_POST["title"];
	$ticket_sql = mysqli_query($con, "SELECT id FROM ticket ORDER BY id DESC LIMIT 1");
	if ($c = mysqli_fetch_array($ticket_sql)) {
		$ticket_id = $c['id'] + 1;
		if ($ticket_id >= 1000000) {
			$ticket_id = "GT0" . $ticket_id;
		} else if ($ticket_id >= 100000) {
			$ticket_id = "GT00" . $ticket_id;
		} else if ($ticket_id >= 10000) {
			$ticket_id = "GT000" . $ticket_id;
		} else if ($ticket_id >= 1000) {
			$ticket_id = "GT0000" . $ticket_id;
		} else if ($ticket_id >= 100) {
			$ticket_id = "GT00000" . $ticket_id;
		} else if ($ticket_id >= 10) {
			$ticket_id = "GT000000" . $ticket_id;
		} else {
			$ticket_id = "GT0000000" . $ticket_id;
		}
	}
	$description = $_POST["description"];
	$category_id = $_POST["category_id"];
	$project_id = $_POST["project_id"];
	$priority_id = $_POST["priority_id"];
	$user_id = $_SESSION["user_id"];
	$status_id = $_POST["status_id"];
	$kind_id = $_POST["kind_id"];
	$zona_id = $_POST["zona"];
	$division_id = $_POST["division"];
	$created_at = "NOW()";

	// $user_id=$_SESSION['user_id'];

	$sql = "insert into ticket (ticket_id,title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,zona_id,division_id,created_at) value (\"$ticket_id\",\"$title\",\"$description\",\"$category_id\",\"$project_id\",$priority_id,$user_id,$status_id,$kind_id,$zona_id,$division_id,$created_at)";

	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {

		$query = mysqli_query($con, "SELECT * FROM user WHERE id=\"$user_id\";");
		while ($row = mysqli_fetch_array($query)) {
			$username = $row['username'];
			$name = $row['name'];
			$lastname = $row['lastname'];
			$is_active = $row['is_active'];
			$rol = $row['rol'];
			$email = $row['email'];
			$profile_pic = $row['profile_pic'];
			$created_at = $row['created_at'];
		}
		$query_ticket = mysqli_query($con, "SELECT * FROM ticket WHERE ticket_id=\"$ticket_id\";");
		while ($row = mysqli_fetch_array($query_ticket)) {
			$created_at_ticket = $row['created_at'];
		}

		$query_kind = mysqli_query($con, "SELECT * FROM kind WHERE id=\"$kind_id\";");
		while ($row = mysqli_fetch_array($query_kind)) {
			$kind_name = $row['name'];
		}

		$to = $email;
		$subject = "$kind_name #$ticket_id generado";
		$message = "<p>Hola $name $lastname, El $kind_name #$ticket_id se ha registrado exitosamente con la fecha $created_at_ticket.</p>";
		$message .= "<p>Se te enviará un correo cuando este se encuentre en Atención así como cuando ya haya sido terminado.</p></br>";
		$message .= "<p>De igual manera puedes darle seguimiento ingresando a la Sección Tickets dentro de tu perfil de Golfo Ticket.</p></br>";
		$message .= "<p>¡Gracias por utilizar Golfo Ticket!</p></br>";

		$headers = "From: Golfo Ticket Support <golfoticketsupport@golfoticket.com>\r\n";
		$headers .= "Reply-To: golfoticketsupport@golfoticket.com\r\n";
		$headers .= "Content-type: text/html\r\n";

		mail($to, $subject, $message, $headers);

		$to = "opensoftds@gmail.com, emsistec@gmail.com";
		$subject = "Nuevo $kind_name #$ticket_id";
		$message = "<p>El usuario $name $lastname ($email) ha registrado el $kind_name #$ticket_id con la fecha $created_at_ticket.</p>";
		$message .= "<p>Ya le fue notificado via email sobre su pronta atención.</p></br>";
		$message .= "<p>Para ofrecer la Atención favor de dirigirse a la sección Tickets con una cuenta nivel Administrado o Agente.</p></br>";
		$message .= "<p>¡Gracias por utilizar Golfo Ticket!</p></br>";

		$headers = "From: Golfo Ticket Support <golfoticketsupport@golfoticket.com>\r\n";
		$headers .= "Reply-To: golfoticketsupport@golfoticket.com\r\n";
		$headers .= "Content-type: text/html\r\n";

		mail($to, $subject, $message, $headers);

		$messages[] = "Tu ticket ha sido ingresado satisfactoriamente. Se enviará un email con los datos del registro al correo: $email";
	} else {
		$errors[] = "Lo sentimos, algo ha salido mal. Intenta nuevamente." . mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido.";
}

if (isset($errors)) {

	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Error!</strong>
		<?php
			foreach ($errors as $error) {
				echo $error;
			}
			?>
	</div>
<?php
}
if (isset($messages)) {

	?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
			foreach ($messages as $message) {
				echo $message;
			}
			?>
	</div>
<?php
}

?>