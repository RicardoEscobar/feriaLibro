<?php

if($_SERVER["REQUEST_METHOD"]=="POST") {
	$name=trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
	$email=trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
	$category=trim(filter_input(INPUT_POST,"category",FILTER_SANITIZE_STRING));
	$title=trim(filter_input(INPUT_POST,"title",FILTER_SANITIZE_STRING));
	$format=trim(filter_input(INPUT_POST,"format",FILTER_SANITIZE_STRING));
	$genre=trim(filter_input(INPUT_POST,"genre",FILTER_SANITIZE_STRING));
	$year=trim(filter_input(INPUT_POST,"year",FILTER_SANITIZE_STRING));
	$details=trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS));
	
	if($name=="" || $email=="" || $category=="" || $title=="") {
		$error_message="Por favor llene los campos reuqeridos: nombre, email y sugerencia";
	}
	
	if(!isset($error_message) && $_POST["address"]!="") {
		// un robot llenó este campo
		$error_message="Datos erróneos";
	}

	// Preparar mensaje de correo a enviar
	$email_body ="";
	$email_body.="Nombre: ".$name."\n";
	$email_body.="Email: ".$email."\n";
	$email_body.="Elemento sugerido\n";
	$email_body.="Categoría: ".$category."\n";
	$email_body.="Título: ".$title."\n";
	$email_body.="Formato: ".$format."\n";
	$email_body.="Género: ".$genre."\n";
	$email_body.="Año: ".$year."\n";
	$email_body.="Información adicional: ".$details."\n";

	// Envío de correo
	
	require("inc/class.phpmailer.php");
	include("inc/class.smtp.php");
	
	$mail = new PHPMailer;
	
	if(!isset($error_message) && !$mail->ValidateAddress($email)) {
		$error_message="Dirección no válida";
	}
	
	if(!isset($error_message)) {

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.soltix.com.mx';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'practica@soltix.com.mx';                 // SMTP username
		$mail->Password = 'telecom555$';                           // SMTP password
		//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 26;                                    // TCP port to connect to

		$mail->setFrom($email, $name);
		$mail->addAddress('juan.miguel.mc@gmail.com', 'Juan Miguel');     // Add a recipient
		$mail->isHTML(false);                                  // Set email format to HTML

		$mail->Subject = 'Envio de sugerencia';
		$mail->Body    = $email_body;
		
		if($mail->send()) {
			header("Location: suggest.php?status=thanks");
			exit;
		}
		$error_message ='Ya hubo P2. ';
		$error_message.='Error: ' . $mail->ErrorInfo;
		
	}
	
}

$pageTitle="Sugerir un nuevo elemento";
$section="suggest";
include("inc/header.php");

?>

<div class="section page">

	<div class="wrapper">
	
		<h1><?php echo $pageTitle; ?></h1>
		<?php
			if(isset($_GET["status"]) && $_GET["status"]=="thanks") {
				echo "<p>Gracias por el correo electrónico, verificaré tu sugerencia en breve</p>";
			} else {
				if(isset($error_message)) {
					echo "<p class='message'>$error_message</p>";
				} else {
					echo "<p>Si usted piensa que le falta algo a mi biblioteca multimedia personal, ¡hágamelo saber! Complete el siguiente formulario para enviarme un correo electrónico.</p>";
				}
		?>
		<form name="suggest" action="suggest.php" method="post">
			<table>
			<tr>
				<th><label for="name">Nombre (requerido)</label></th>
				<td><input type="text" name="name" id="name" value="<?php if(isset($name)) { echo $name; } ?>"></td>
			</tr>
			<tr>
				<th><label for="email">E-mail (requerido)</label></th>
				<td><input type="text" name="email" id="email" value="<?php if(isset($email)) { echo $email; } ?>"></td>
			</tr>
			<tr>
				<th><label for="category">Categoría (requerido)</label></th>
				<td><select name="category" id="category">
					<option value="">Elija categoría</option>
					<option value="Books"<?php if(isset($category) && $category=="Books") { echo " selected"; } ?>>Books</option>
					<option value="Movies"<?php if(isset($category) && $category=="Movies") { echo " selected"; } ?>>Movies</option>
					<option value="Music"<?php if(isset($category) && $category=="Music") { echo " selected"; } ?>>Music</option>
				</select></td>
			</tr>
			<tr>
				<th><label for="title">Título (requerido)</label></th>
				<td><input type="text" name="title" id="title" value="<?php if(isset($title)) { echo $title; } ?>"></td>
			</tr>
            <tr>
                <th>
                    <label for="format">Formato</label>
                </th>
                <td>
                    <select name="format" id="format">
                        <option value="">Elija formato</option>
                        <optgroup label="Books">
                            <option value="Audio"<?php
                            if (isset($format) && $format=="Audio") {
                                echo " selected";
                            } ?>>Audio</option>
                            <option value="Ebook"<?php
                            if (isset($format) && $format=="Ebook") {
                                echo " selected";
                            } ?>>Ebook</option>
                            <option value="Hardcover"<?php
                            if (isset($format) && $format=="Hardcover") {
                                echo " selected";
                            } ?>>Hardcover</option>
                            <option value="Paperback"<?php
                            if (isset($format) && $format=="Paperback") {
                                echo " selected";
                            } ?>>Paperback</option>
                        </optgroup>
                        <optgroup label="Movies">
                            <option value="Blu-ray"<?php
                            if (isset($format) && $format=="Blu-ray") {
                                echo " selected";
                            } ?>>Blu-ray</option>
                            <option value="DVD"<?php
                            if (isset($format) && $format=="DVD") {
                                echo " selected";
                            } ?>>DVD</option>
                            <option value="Streaming"<?php
                            if (isset($format) && $format=="Streaming") {
                                echo " selected";
                            } ?>>Streaming</option>
                            <option value="VHS"<?php
                            if (isset($format) && $format=="VHS") {
                                echo " selected";
                            } ?>>VHS</option>
                        </optgroup>
                        <optgroup label="Music">
                            <option value="Cassette"<?php
                            if (isset($format) && $format=="Cassette") {
                                echo " selected";
                            } ?>>Cassette</option>
                            <option value="CD"<?php
                            if (isset($format) && $format=="CD") {
                                echo " selected";
                            } ?>>CD</option>
                            <option value="MP3"<?php
                            if (isset($format) && $format=="MP3") {
                                echo " selected";
                            } ?>>MP3</option>
                            <option value="Vinyl"<?php
                            if (isset($format) && $format=="Vinyl") {
                                echo " selected";
                            } ?>>Vinyl</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
				<th>
					<label for="genre">Género</label>
				</th>
				<td>
					<select name="genre" id="genre">
						<option value="">Elija género</option>
						<optgroup label="Books">
							<option value="Action"<?php
							if (isset($genre) && $genre=="Action") {
								echo " selected";
							} ?>>Action</option>
							<option value="Adventure"<?php
							if (isset($genre) && $genre=="Adventure") {
								echo " selected";
							} ?>>Adventure</option>
							<option value="Comedy"<?php
							if (isset($genre) && $genre=="Comedy") {
								echo " selected";
							} ?>>Comedy</option>
							<option value="Fantasy"<?php
							if (isset($genre) && $genre=="Fantasy") {
								echo " selected";
							} ?>>Fantasy</option>
							<option value="Historical"<?php
							if (isset($genre) && $genre=="Historical") {
								echo " selected";
							} ?>>Historical</option>
							<option value="Historical Fiction"<?php
							if (isset($genre) && $genre=="Historical Fiction") {
								echo " selected";
							} ?>>Historical Fiction</option>
							<option value="Horror"<?php
							if (isset($genre) && $genre=="Horror") {
								echo " selected";
							} ?>>Horror</option>
							<option value="Magical Realism"<?php
							if (isset($genre) && $genre=="Magical Realism") {
								echo " selected";
							} ?>>Magical Realism</option>
							<option value="Mystery"<?php
							if (isset($genre) && $genre=="Mystery") {
								echo " selected";
							} ?>>Mystery</option>
							<option value="Paranoid"<?php
							if (isset($genre) && $genre=="Paranoid") {
								echo " selected";
							} ?>>Paranoid</option>
							<option value="Philosophical"<?php
							if (isset($genre) && $genre=="Philosophical") {
								echo " selected";
							} ?>>Philosophical</option>
							<option value="Political"<?php
							if (isset($genre) && $genre=="Political") {
								echo " selected";
							} ?>>Political</option>
							<option value="Romance"<?php
							if (isset($genre) && $genre=="Romance") {
								echo " selected";
							} ?>>Romance</option>
							<option value="Saga"<?php
							if (isset($genre) && $genre=="Saga") {
								echo " selected";
							} ?>>Saga</option>
							<option value="Satire"<?php
							if (isset($genre) && $genre=="Satire") {
								echo " selected";
							} ?>>Satire</option>
							<option value="Sci-Fi"<?php
							if (isset($genre) && $genre=="Sci-Fi") {
								echo " selected";
							} ?>>Sci-Fi</option>
							<option value="Tech"<?php
							if (isset($genre) && $genre=="Tech") {
								echo " selected";
							} ?>>Tech</option>
							<option value="Thriller"<?php
							if (isset($genre) && $genre=="Thriller") {
								echo " selected";
							} ?>>Thriller</option>
							<option value="Urban"<?php
							if (isset($genre) && $genre=="Urban") {
								echo " selected";
							} ?>>Urban</option>
						</optgroup>
						<optgroup label="Movies">
							<option value="Action"<?php
							if (isset($genre) && $genre=="Action") {
								echo " selected";
							} ?>>Action</option>
							<option value="Adventure"<?php
							if (isset($genre) && $genre=="Adventure") {
								echo " selected";
							} ?>>Adventure</option>
							<option value="Animation"<?php
							if (isset($genre) && $genre=="Animation") {
								echo " selected";
							} ?>>Animation</option>
							<option value="Biography"<?php
							if (isset($genre) && $genre=="Biography") {
								echo " selected";
							} ?>>Biography</option>
							<option value="Comedy"<?php
							if (isset($genre) && $genre=="Comedy") {
								echo " selected";
							} ?>>Comedy</option>
							<option value="Crime"<?php
							if (isset($genre) && $genre=="Crime") {
								echo " selected";
							} ?>>Crime</option>
							<option value="Documentary"<?php
							if (isset($genre) && $genre=="Documentary") {
								echo " selected";
							} ?>>Documentary</option>
							<option value="Drama"<?php
							if (isset($genre) && $genre=="Drama") {
								echo " selected";
							} ?>>Drama</option>
							<option value="Family"<?php
							if (isset($genre) && $genre=="Family") {
								echo " selected";
							} ?>>Family</option>
							<option value="Fantasy"<?php
							if (isset($genre) && $genre=="Fantasy") {
								echo " selected";
							} ?>>Fantasy</option>
							<option value="Film-Noir"<?php
							if (isset($genre) && $genre=="Film-Noir") {
								echo " selected";
							} ?>>Film-Noir</option>
							<option value="History"<?php
							if (isset($genre) && $genre=="History") {
								echo " selected";
							} ?>>History</option>
							<option value="Horror"<?php
							if (isset($genre) && $genre=="Horror") {
								echo " selected";
							} ?>>Horror</option>
							<option value="Musical"<?php
							if (isset($genre) && $genre=="Musical") {
								echo " selected";
							} ?>>Musical</option>
							<option value="Mystery"<?php
							if (isset($genre) && $genre=="Mystery") {
								echo " selected";
							} ?>>Mystery</option>
							<option value="Romance"<?php
							if (isset($genre) && $genre=="Romance") {
								echo " selected";
							} ?>>Romance</option>
							<option value="Sci-Fi"<?php
							if (isset($genre) && $genre=="Sci-Fi") {
								echo " selected";
							} ?>>Sci-Fi</option>
							<option value="Sport"<?php
							if (isset($genre) && $genre=="Sport") {
								echo " selected";
							} ?>>Sport</option>
							<option value="Thriller"<?php
							if (isset($genre) && $genre=="Thriller") {
								echo " selected";
							} ?>>Thriller</option>
							<option value="War"<?php
							if (isset($genre) && $genre=="War") {
								echo " selected";
							} ?>>War</option>
							<option value="Western"<?php
							if (isset($genre) && $genre=="Western") {
								echo " selected";
							} ?>>Western</option>
						</optgroup>
						<optgroup label="Music">
							<option value="Alternative"<?php
							if (isset($genre) && $genre=="Alternative") {
								echo " selected";
							} ?>>Alternative</option>
							<option value="Blues"<?php
							if (isset($genre) && $genre=="Blues") {
								echo " selected";
							} ?>>Blues</option>
							<option value="Classical"<?php
							if (isset($genre) && $genre=="Classical") {
								echo " selected";
							} ?>>Classical</option>
							<option value="Country"<?php
							if (isset($genre) && $genre=="Country") {
								echo " selected";
							} ?>>Country</option>
							<option value="Dance"<?php
							if (isset($genre) && $genre=="Dance") {
								echo " selected";
							} ?>>Dance</option>
							<option value="Easy Listening"<?php
							if (isset($genre) && $genre=="Easy Listening") {
								echo " selected";
							} ?>>Easy Listening</option>
							<option value="Electronic"<?php
							if (isset($genre) && $genre=="Electronic") {
								echo " selected";
							} ?>>Electronic</option>
							<option value="Folk"<?php
							if (isset($genre) && $genre=="Folk") {
								echo " selected";
							} ?>>Folk</option>
							<option value="Hip Hop/Rap"<?php
							if (isset($genre) && $genre=="Hip Hop/Rap") {
								echo " selected";
							} ?>>Hip Hop/Rap</option>
							<option value="Inspirational/Gospel"<?php
							if (isset($genre) && $genre=="Inspirational/Gospel") {
								echo " selected";
							} ?>>Insirational/Gospel</option>
							<option value="Jazz"<?php
							if (isset($genre) && $genre=="Jazz") {
								echo " selected";
							} ?>>Jazz</option>
							<option value="Latin"<?php
							if (isset($genre) && $genre=="Latin") {
								echo " selected";
							} ?>>Latin</option>
							<option value="New Age"<?php
							if (isset($genre) && $genre=="New Age") {
								echo " selected";
							} ?>>New Age</option>
							<option value="Opera"<?php
							if (isset($genre) && $genre=="Opera") {
								echo " selected";
							} ?>>Opera</option>
							<option value="Pop"<?php
							if (isset($genre) && $genre=="Pop") {
								echo " selected";
							} ?>>Pop</option>
							<option value="R&B/Soul"<?php
							if (isset($genre) && $genre=="R&B/Soul") {
								echo " selected";
							} ?>>R&amp;B/Soul</option>
							<option value="Reggae"<?php
							if (isset($genre) && $genre=="Reggae") {
								echo " selected";
							} ?>>Reggae</option>
							<option value="Rock"<?php
							if (isset($genre) && $genre=="Rock") {
								echo " selected";
							} ?>>Rock</option>
						</optgroup>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="year">Año</label></th>
				<td><input type="text" name="year" id="year" value="<?php if(isset($year)) { echo $year; } ?>"></td>
			</tr>
			<tr>
				<th><label for="details">Información adicional</label></th>
				<td><textarea name="details" id="details"><?php if(isset($details)) { echo htmlspecialchars($_POST["details"]); } ?></textarea></td>
			</tr>
			<tr style="display:none">
				<th><label for="address">Dirección</label></th>
				<td><input type="text" name="address" id="address">
				<p>Dejar vacío este campo</p></td>
			</tr>
			</table>
			<input type="submit" value="Enviar sugerencia">
		</form>
			<?php } ?>
	</div>

</div>

<?php 
include("inc/footer.php");
?>