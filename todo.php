<?php
session_start();
include "config/config.php";
if (!isset($_SESSION['user_id']) && $_SESSION['user_id'] == null) {
    header("location: index.php");
}
?>
<?php
$id = $_SESSION['user_id'];
$query = mysqli_query($con, "SELECT * from user where id=$id");
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

$sql_rol = mysqli_query($con, "SELECT * FROM rol WHERE id= '$rol' ;");
$result_rol = mysqli_fetch_assoc($sql_rol);
$rol_name = $result_rol['name'];


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title . " " . $name; ?> </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="css/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css" />
    <!-- jQuery custom content scroller -->
    <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

    <!-- bootstrap-daterangepicker -->
    <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- MICSS button[type="file"] -->
    <link rel="stylesheet" href="css/micss.css">

</head>

<body class="nav-md" id="body_init">
    <div class="container body">
        <div class="main_container">

            <div class="container" role="main">
                <!-- page content -->
                <div class="">
                    <div class="page-title">
                        <?php if ($rol == 2 || $rol == 3) : ?>
                            <div class="row top_tiles">
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                                    <div class="tile-stats">
                                        <div class="icon" style="color:rgba(255, 159, 64, 1);"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                        <div class="count" id="numero_pendientes"><?php echo mysqli_num_rows($TicketDataPendiente) ?></div>
                                        <h3>Tickets Pendientes</h3>
                                    </div>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                                    <div class="tile-stats">
                                        <div class="icon" style="color:rgba(54, 162, 235, 1);"><i class="fa fa-share" aria-hidden="true"></i></div>
                                        <div class="count" id="numero_atencion"><?php echo mysqli_num_rows($TicketDataEnAtención) ?></div>
                                        <h3>Tickets En Atención</h3>
                                    </div>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                                    <div class="tile-stats">
                                        <div class="icon" style="color:rgba(75, 192, 192, 1);"><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                                        <div class="count" id="numero_terminados"><?php echo mysqli_num_rows($TicketDataTerminados) ?></div>
                                        <h3>Tickets Terminados</h3>
                                    </div>
                                </div>
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="cursor:pointer">
                                    <div class="tile-stats">
                                        <div class="icon" style="color:rgba(255, 99, 132, 1);"><i class="fa fa-times-circle-o" aria-hidden="true"></i></div>
                                        <div class="count" id="numero_cancelados"><?php echo mysqli_num_rows($TicketDataCancelados) ?></div>
                                        <h3>Tickets Cancelados</h3>
                                    </div>
                                </div>
                                <?php if ($rol == 3) : ?>
                                    <div class="row justify-content-right">
                                        <a href="projects.php">
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 col-lg-offset-1">
                                                <div class="tile-stats">
                                                    <div class="icon" style="color:rgba(75, 192, 192, 1);"><i class="fa fa-list-alt"></i></div>
                                                    <div class="count"><?php echo mysqli_num_rows($ProjectData) ?></div>
                                                    <h3>Departamentos</h3>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="categories.php">
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="tile-stats">
                                                    <div class="icon" style="color:rgba(75, 192, 192, 1);"><i class="fa fa-th-list"></i></div>
                                                    <div class="count"><?php echo mysqli_num_rows($CategoryData) ?></div>
                                                    <h3>Categorias</h3>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="users.php">
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="tile-stats">
                                                    <div class="icon" style="color:rgba(75, 192, 192, 1);"><i class="fa fa-users"></i></div>
                                                    <div class="count"><?php echo mysqli_num_rows($UserData) ?></div>
                                                    <h3>Usuarios</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif ?>
                                <div class="row chart-container justify-content-right">
                                    <div>
                                        <canvas id="miGrafica"></canvas>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <!-- content -->
                        <br><br>
                        <div class="row text-center">
                            <div class="col-md-4" id="profile_img_container">
                                <div class="image view view-first">
                                    <img class="thumb-image" style="width: 100%; display: block;" src="images/profiles/<?php echo $profile_pic; ?>" alt="image" />
                                </div>
                                <span class="btn btn-my-button btn-file">
                                    <form method="post" id="formulario" enctype="multipart/form-data">
                                        Cambiar Imagen de perfil <input type="file" name="file">
                                    </form>
                                </span>
                                <div id="respuesta"></div>
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-12">
                                <?php include "lib/alerts.php";
                                profile(); //llamada a la funcion de alertas
                                ?>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Información personal</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="action/upd_profile.php" method="post">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nombre de usuario
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="username" id="username" class="form-control col-md-7 col-xs-12" value="<?php echo $username; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="name" id="first-name" class="form-control col-md-7 col-xs-12" value="<?php echo $name; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Apellidos
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="lastname" id="lastname" class="form-control col-md-7 col-xs-12" value="<?php echo $lastname; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo electrónico
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" name="email" id="email" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>">
                                                </div>
                                            </div>

                                            <br><br><br>
                                            <h2 style="padding-left: 50px">Cambiar Contraseña</h2>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña actual
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="password" class="date-picker form-control col-md-7 col-xs-12" type="password" placeholder="Ingrese su contraseña actual">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nueva contraseña
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="new_password" class="date-picker form-control col-md-7 col-xs-12" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar contraseña nueva
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="confirm_new_password" class="date-picker form-control col-md-7 col-xs-12" type="password">
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit" name="upd_profile" data-toggle="modal" data-target=".bs-update-profile-modal-lg-add" class="btn btn-success">Actualizar Datos</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /page content -->
            <footer>
                <!-- footer content -->
                <div class="clearfix"></div>
            </footer><!-- /footer content -->
        </div> <!-- /main container -->
    </div> <!-- container body -->

</body> <!-- /body -->

</html>