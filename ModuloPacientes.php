<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: index.php');
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
        <title>Spring Pacientes</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>
    <body id="page-top">
        <!-- Navegacion-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top navbar-shrink" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Delivery 3ra Edad</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Pacientes</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><button type="button" id="botonLogout" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger btn btn-info" >Cerrar Sesion</button></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Paciente-->
        <section class="page-section portfolio mt-10" id="portfolio">
            <div class="container">
                <!-- Paciente Cabezera-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pacientes</h2>
                <!--Icono para separar Cabezeras-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fab fa-creative-commons-sampling"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row">
                    <!--AgregarPaciente-->
                    <div class="col">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#AgregarPaciente">
                            <div class="portfolio-item-captionAdd d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/AgregarPaciente.png" alt="" />
                        </div>
                    </div>
                    <!--EditarPaciente-->
                    <div class="col">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#ListarPaciente">
                            <div class="portfolio-item-captionEdit d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-edit fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/EditarPaciente.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="row row-margin-30">
                    <!--EliminarPaciente-->
                    <div class="col">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#ListarPaciente">
                            <div class="portfolio-item-captionDelete d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-user-times fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/EliminarPaciente.png" alt="" />
                        </div>
                    </div>
                    <!--ListarPaciente-->
                    <div class="col">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#ListarPaciente">
                            <div class="portfolio-item-captionList d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-list fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/ListaPaciente.png" alt="" />
                        </div>
                    </div>
                </div>
                  
            </div>
        </section>
        <!-- Copyright Section-->
        <section class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Alex Sanchez</small></div>
        </section>
        <!--Barra Para Subir cuando se baja en el celular-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Modales Paciente-->
        <!--ModalAgregar-->
        <div class="portfolio-modal modal fade" id="AgregarPaciente" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
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
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Agregar Pacientes</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-plus"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                   <!--Formulario Pacientes-->
                                   <form id="FormularioPacientes">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Rut" type="text" placeholder="Rut" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Nombre" type="text" placeholder="Nombre" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Apellido" type="text" placeholder="Apellido" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Numero" type="number" placeholder="Numero" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Direccion" type="text" placeholder="Direccion" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Doctor" type="text" placeholder="Doctor" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <input class="form-control" id="Remedios" type="text" placeholder="Remedios" required="required" data-validation-required-message="Por Favor Ingrese Dato" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <textarea class="form-control" id="Problemas" rows="5" placeholder="Problemas" required="required" data-validation-required-message="Porfavor Ingrese Datos"></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <br />
                                    <div id="success"></div>
                                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Enviar</button></div>
                                </form>
                                   <!--Fin Formulario Pacientes-->
                                    <button class="btn btn-primary" href="#" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close Window</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ModalEditar-->
        <div class="portfolio-modal modal fade" id="EditarPaciente" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
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
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Editar Paciente</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-edit"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--Formulario Pacientes-->
                                    <form id="FormularioEditaPacientes">
                                    </form>
                                   <!--Fin Formulario Pacientes-->
                                    
                                    <button class="btn btn-primary" href="#" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close Window</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ModalListar-->
        <div class="portfolio-modal modal fade" id="ListarPaciente" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
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
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Lista De Pacientes</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-list"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--Tabla Datos-->
                                        <div class="table-responsive">
                                            <table id="Tabla" class="table table-striped Tabla">
                                                <thead>
                                                    <tr>
                                                        <th>Opciones</th>
                                                        <th>Rut</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Direccion</th>
                                                        <th>Doctor</th>
                                                        <th>Remedios</th>
                                                        <th>Problemas</th>
                                                        <th>Numero</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="TbodyTablaPacientes">
                                                    <td>Opciones</td>
                                                    <td>rut</td>
                                                    <td>nombre</td>
                                                    <td>apellido</td>
                                                    <td>direccion</td>
                                                    <td>doctor</td>
                                                    <td>remedios</td>
                                                    <td>problemas</td>
                                                    <td>Numero</td>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Opciones</th>
                                                        <th>Rut</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Direccion</th>
                                                        <th>Doctor</th>
                                                        <th>Remedios</th>
                                                        <th>Problemas</th>
                                                        <th>Numero</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    <!--Fin Tabla datos-->
                                </div>
                            </div>
                        </div>
                        <br>
                        <button id="botonBuscarPacientes" class="btn btn-success my-2 my-sm-0" type="submit" >Buscar</button>
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
        <script src="js/Logout.js"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
            $('.Tabla').DataTable( {
                language: {
                    "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "   Primero   ",
                    "sLast":     "   Último   ",
                    "sNext":     "   Siguiente   ",
                    "sPrevious": "   Anterior   "
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
                }
                } );
        </script>
        
    </body>
</html>
