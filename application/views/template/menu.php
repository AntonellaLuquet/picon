<nav class="navbar navbar-default fixme" role="navigation">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>">Inicio</a>
        </div>
        <?php
        if ($this->session->userdata('logged_user')) { //comprueba si el usuario esta logeado
        $datos = $this->session->userdata('logged_user');
        if ($datos ['idrol'] == 1) { //ACCIONES DE ADMINISTRADOR?>
        <div class="collapse navbar-collapse"
             id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="dropdown"><a class="dropdown-toggle"
                                        href="<?php echo base_url() ?>cevento/listar">Eventos</a>
                </li>
                <li class="dropdown"><a class="dropdown-toggle"
                                        href="<?php echo base_url() ?>clugares/listar">Lugares</a>
                </li>
                <li class="dropdown"><a class="dropdown-toggle"
                                        href="<?php echo base_url() ?>cusuario/listar">Usuarios</a>
                </li>
            </ul>

            <?php } else { //ACCIONES USUARIOS?>
                <ul class="nav navbar-nav ">
                    <li class="dropdown"><a class="dropdown-toggle" href="<?php echo base_url() ?>clugares/">Lugares</a>
                    </li>
                </ul>
                <?php
            }

            ?>
            <!-- MENSAJES-PERFIL -->
            <ul class="nav navbar-nav ">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- MENSAJES -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?php echo base_url() ?>assets/images/user.png" class="img-circle"
                                                 alt="User Image Responsive image">
                                        </div>
                                        <h4>
                                            Sender Name
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Message Excerpt</p>
                                    </a>
                                </li><!-- end message -->
                                ...
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- FIN MENSAJES -->
                <?php
                if ($datos ['idrol'] != 1) { ?>
                    <!-- NOTIFICACIONES -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="ion ion-ios-people info"></i> Notification title
                                        </a>
                                    </li>
                                    ...
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- FIN NOTIFICACIONES -->
                <?php }
                ?>
                <!-- PERFIL USUARIO -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url() ?>assets/images/user.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $datos ['username'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url() ?>assets/images/user.png" class="img-circle img-fluid"
                                 alt="User Image">
                            <p>
                                <?php echo $datos['username'] ?>
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <?php
                            if ($datos['idrol'] != 1) { ?>
                            <div class="col-xs-4 text-center">
                                <a href="#">Votos positios</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Votos negativos</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Estrellas</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url() ?>cprofile" class="btn btn-default btn-flat"> Profile</a>
                            </div>
                            <?php
                            }
                            ?>

                            <div class="pull-right">
                                <a href="<?php echo base_url() ?>cinicio/logout" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- FIN USUARIO -->
                <?php
                } else { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-toggle="modal" data-target="#myModal" data-toggle="dropdown"><strong>Ingresar</strong></a>
                            <!-- BOTON DE INGRESAR --></li>
                    </ul>
                    <?php
                }
                ?>
                <!-- CONTRUCION MENU -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
