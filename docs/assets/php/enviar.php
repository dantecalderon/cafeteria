<?php
	
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	}

	if(is_ajax()) {
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$personas = $_POST['numero'];
		$hora = $_POST['hora'];
		$fecha = $_POST['fecha'];

		$header = 'From: ' . $email . " \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";

		$body = "Nombre: " . $nombre . " \r\n";
		$body .= "Email: " . $email . " \r\n";
		$body .= "Para: " . $personas . " \r\n";
		$body .= "Dia: " . $fecha . " \r\n";
		$body .= "Hora: " . $hora . " \r\n";
		$body .= "Esta reserva fue hecha en el sitio web";		

		$para = "dantehemerson@gmail.com";
		$asunto = "Nueva Reservacion";

		mail($para, $asunto, $body, $header);

		echo json_encode(array(
			'mensaje' => "Reserva confirmada",
			"nombre" => $nombre
		));

		

	}
	else {
		die("No!!!");
	}
>