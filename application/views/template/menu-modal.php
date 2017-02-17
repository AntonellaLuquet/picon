<?php
if (!$this->session->userdata('logged_user')) {
//EL MODAL NO ES REQUERIDO SI NO SE ESTA LOGEADO
?> 

<script src="<?php echo base_url()?>assets/js/aplicacion/menu-modal/menu-modal.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"
				style="background-color: #881300; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal"
					style="color: white;">
					<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Ingreso</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

						<div class="col-md-6" style="margin-top: 20px;">
							<div class="row">
								<div class="social" style="float: left; margin-left: 40px;">

									<a href="https://www.facebook.com/bootsnipp"><i id="social"
										class="fa fa-facebook-square fa-3x social-fb"></i></a> <a
										href="https://twitter.com/bootsnipp"><i id="social"
										class="fa fa-twitter-square fa-3x social-tw"></i></a> <a
										href="https://plus.google.com/+Bootsnipp-page"><i id="social"
										class="fa fa-google-plus-square fa-3x social-gp"></i></a>

								</div>
							</div>
<!-- formulario login	-->
							<div class="well" style="padding-top: 2px; margin-top: 15px;">
								<form id="loginForm" method="POST" action="<?php echo base_url()?>cinicio/login"
									novalidate="novalidate">
									<h4>Login</h4>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"> <i
												class="glyphicon glyphicon-user"></i>
											</span> <input id=username class="form-control" placeholder="Usuario"
												name="username" type="text" autofocus>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"> <i
												class="glyphicon glyphicon-lock"></i>
											</span> <input id=password class="form-control" placeholder="Contraseña"
												name="password" type="password" value="">
										</div>
									</div>
									<div id="alert-login" class="alert alert-warning text-center" role="alert">Datos Incorrectos</div>
									<button type="submit" class="btn btn-success btn-block">Ingresar</button>
									<a href="cInicio/recuperarPass"
										class="btn btn-default btn-block">Recuperar Contraseña</a>
								</form>
							</div>
<!-- fin formulario login	-->
						</div>
						<!-- formulario REGISTRO	-->
						<div class="col-md-6">
							<form id="registro_form" method="POST" data-toggle="validator" role="form" action="<?php echo base_url()?>cinicio/registrar">
								<h4>Nueva Cuenta</h4>
								<!-- imput nombre -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"> <i
											class="glyphicon glyphicon-user"></i>
										</span> <input id="nombre" class="form-control" placeholder="Nombre" data-error="Complete este campo"
											name="nombre" type="text" required>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<!-- imput apellido	-->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"> <i
											class="glyphicon glyphicon-user"></i>
										</span> <input id="apellido" class="form-control" placeholder="Apellido" data-error="Complete este campo"
											name="nombre" type="text" required>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<!-- imput fecha de nacimiento	-->
								<div class="form-group">
										<div class='input-group date'>
											<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
											</span>
												<input id='fecha' type='text' class="form-control" placeholder="Cumpleaños" data-error="Complete este campo" required>
										</div>
										<div class="help-block with-errors"></div>
								</div>
								<!-- imput direccion	-->
								<div class="form-group">
										<div class='input-group'>
											<span class="input-group-addon">
													<span class="glyphicon glyphicon-road"></span>
											</span>
												<input id='direccion' type='text' class="form-control" placeholder="Direccion" data-error="Complete este campo" >
										</div>
										<div class="help-block with-errors"></div>
								</div>
								<!-- imput mail	-->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><strong>@</strong></span>
										<input id="mail" type="email" class="form-control" placeholder="E-mail" name="email" data-error="Direccion de correo no valida" value="" required>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<!-- imput nombre de usuario	-->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"> <i
											class="glyphicon glyphicon-user"></i>
										</span> <input id="usuario" class="form-control" placeholder="Nombre de Usuario" data-error="Complete este campo"
											name="username" type="text" required>
									</div>
									<div class="help-block with-errors"></div>
									<div id="iguales"class="help-block with-errors">
										<ul class="list-unstyled"><li>El usuario ya existe</li></ul>
									</div>
								</div>
								<!-- imput pass	-->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"> <i
											class="glyphicon glyphicon-asterisk"></i>
										</span> <input id="pass1" class="form-control" placeholder="Contraseña" data-error="Complete este campo"
											name="pass" type="password" value="" required>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<!-- imput comprobacion pass	-->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"> <i
											class="glyphicon glyphicon-asterisk"></i>
										</span>
										<input id="pass2" class="form-control" placeholder="Confirmar Contraseña" name="pass2" type="password" value="" data-match="#pass1"
										data-error="Las contraseñas no son iguales" required>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<button type="submit" class="btn btn-success btn-block">Registrar</button>
								</p>
							</form>
						</div>
						<!-- FIN formulario REGISTRO	-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
