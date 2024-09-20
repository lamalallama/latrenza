<?php

//este archivo se llama formularioLogin.php

?>
<center>

	<h1> Inicio de sesion </h1>
	
<form> name="formLogin" id="formLogin" action="Login/procesoIniciarSesion.php" method="POST"

		<input type="hidden" name="accion" id="accion" value="iniciarsesion"/>
		
	<label> Escribe usuario*
		<input name="txtNombreUsuario" id="txtNombreUsuario" required />
	</label><br>
		<input name="txtContrasena" id="txtContrasena" required />
		
	<label> Escribe contrasena
		<input name="txtContrasena" id="txtContrasena" required />
	</label><br>
	
	<input type="submit" name="btnLogin" id="btnLogin" value="Iniciar sesi&oacute;n">

</form>
</center>