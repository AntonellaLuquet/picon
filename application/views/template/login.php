
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"></div>
			<div class="col-md-4" style="margin-top: 20px; float: left;">

				<div class="well" style="padding-top: 2px;">
					<form id="loginForm" method="POST"
						action="<?php echo base_url()?>cinicio/login"
						novalidate="novalidate">
						<h4>Login</h4>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-user"></i>
								</span> <input class="form-control" placeholder="Usuario"
									name="username" type="text" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-lock"></i>
								</span> <input class="form-control" placeholder="Contraseña"
									name="password" type="password" value="">
							</div>
						</div>

						<button type="submit" class="btn btn-success btn-block">Ingresar</button>
						<a href="cInicio/recuperarPass" class="btn btn-default btn-block">Recuperar
							Contraseña</a>
					</form>


				</div>
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

			</div>
			<div class="col-md-4" style="float: left;">
				<div class="well" style="padding-top: 2px; margin-top: 15px;">

					<form id="registroForm" method="POST"
						action="<?php echo base_url()?>cregistrar/alta"
						novalidate="novalidate">
						<h4>Nueva Cuenta</h4>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-user"></i>
								</span> <input class="form-control"
									placeholder="Nombre y Apellido" name="nombre" type="text"
									autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-user"></i>
								</span> <input class="form-control" placeholder="Usuario"
									name="username" type="text" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-phone"></i>
								</span> <input class="form-control" placeholder="Celular"
									name="cel" type="number" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-lock"></i>
								</span> <input class="form-control" placeholder="Contraseña"
									name="pass1" type="password" value="">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-lock"></i>
								</span> <input class="form-control"
									placeholder="Confirmar Contraseña" name="pass2" type="password"
									value="">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><strong>@</strong></span> <input
									class="form-control" placeholder="E-mail" name="email"
									type="email" value="">
							</div>
						</div>

						<button class="btn btn-info btn-block" type="submit">Registrar</button>
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>
