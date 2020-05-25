<?php
    include_once 'database.php';
    
    session_start();

    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: ModuloPacientes.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE Nombre = :username AND Contraseña = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin.php');
                break;

                case 2:
                header('location: ModuloPacientes.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Spring Portada</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body id="page-top">
    <!-- Navegacion-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top navbar-shrink" id="mainNav">
        <div class="container">
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Opcion <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive" data-target="#IniciarSesion"
                data-toggle="modal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Iniciar Sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Portada-->
    <section class="page-section portfolio mt-10" id="portfolio">
        <div class="container">
            <!--Cabezera-->

            <!--Icono para separar Cabezeras-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fab fa-creative-commons-sampling"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Bienvenido a Delivery de
                Remedios.</h2>
            <hr>
            <div class="slider">
                <ul>
                    <li><img src="assets/img/1.png" alt=""></li>
                    <li><img src="assets/img/2.jpg" alt=""></li>
                    <li><img src="assets/img/3.jpg" alt=""></li>
                    <li><img src="assets/img/4.jpg" alt=""></li>
                </ul>
            </div>
        </section>
        
            <!-- Copyright Section-->
            <section class="copyright py-4 text-center text-white">
                <div class="container"><small>Copyright © Javier Quintanilla</small></div>
            </section>
            <!--Barra Para Subir cuando se baja en el celular-->
            <div class="scroll-to-top d-lg-none position-fixed">
                <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                        class="fa fa-chevron-up"></i></a>
            </div>
            <!--Modal Inicio Secion-->
            <div class="portfolio-modal modal fade" id="IniciarSesion" tabindex="-1" role="dialog"
                aria-labelledby="portfolioModal1Label" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                        <div class="modal-body text-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Iniciar
                                            Sesion</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-plus"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!--Formulario Pacientes-->
                                        <form id="FormularioInicioSecion" method="POST" >
                                            <div class="control-group">
                                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                    <input class="form-control" id="NombreUsuario" name="username" type="text" placeholder="Nombre de Usuario"
                                                        required="required"
                                                        data-validation-required-message="Por Favor Ingrese Dato" />
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                    <input class="form-control" id="Contraseña" name="password" type="text"
                                                        placeholder="Contraseña" required="required"
                                                        data-validation-required-message="Por Favor Ingrese Dato" />
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>
                                            <br />
                                            <div id="success"></div>
                                            <div class="form-group"><button class="btn btn-primary btn-xl"
                                                    id="sendMessageButton" type="submit">Enviar</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <!-- Third party plugin JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script src="js/PacienteCrud.js"></script>
            <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

            <script type="text/javascript">
                $('.Tabla').DataTable({
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "   Primero   ",
                            "sLast": "   Último   ",
                            "sNext": "   Siguiente   ",
                            "sPrevious": "   Anterior   "
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                });
            </script>


</body>

</html>