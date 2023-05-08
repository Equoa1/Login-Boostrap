<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login con Bootstrap y PHP</title>
	<!-- Incluimos los archivos de Bootstrap -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4>Iniciar sesión</h4>
					</div>
					<div class="card-body">
						<form method="post" action="login.php">
							<div class="form-group">
								<label for="username">Correo Electronico</label>
								<input type="mail" class="form-control" name="email" required>
							</div>
							<div class="form-group">
								<label for="password">Contraseña:</label>
								<input type="password" class="form-control" name="password" required>
							</div>
                            
							<button type="submit" class="btn btn-primary mt-2">Iniciar sesión</button>
                            
						</form>
                        <?php
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		$conn = mysqli_connect('localhost', 'root', '', 'login-boostrap');

		
		$email = $_POST['email'];
		$password = $_POST['password'];
     

		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			$user = mysqli_fetch_assoc($result)['nombre']; 
			$_SESSION['email'] = $email;
			$_SESSION['nombre'] = $user;
            
			echo '<div class="alert alert-success mt-2">Bienvenido ' .$user.'</div>';
			exit();
		} else {
			echo '<div class="alert alert-danger mt-2">Nombre de usuario o contraseña incorrectos.</div>';
		}
		
		
		mysqli_close($conn);
	}
	session_destroy();
?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>
