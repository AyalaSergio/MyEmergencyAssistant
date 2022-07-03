<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inicio</title>

    {{-- Load compiled CSS    --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- {{-- popper.js CSS example  --}} -->
    <style>
        #tooltip {
            background: #333;
            color: white;
            font-weight: bold;
            padding: 4px 8px;
            font-size: 13px;
            border-radius: 4px;
        }

        .card-space {
            margin-bottom: 20px;
        }

        html {
            height: 100%;
        }

        body {
            min-height: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="{{url('/images/logos/hospital.png')}}" style="width: 35px;" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#menuPacientes">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Encuestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Soporte</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Estado/Ciudades</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink12">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalListaEstado">Lista paises</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalRegistroEstado">Registro de Estados</a></li>
                            <li><a class="dropdown-item" href="#" disabled>Opcion no disponible</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Empleados</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink12">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalRegistroDoctor">Asignar matricula</a></li>
                            <li><a class="dropdown-item" href="#" disabled>Opcion no disponible</a></li>
                        </ul>
                    </li>
                </ul>

                <span class="nav-item" style="margin: 5px 5px 5px;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Emergency Asistant
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                                    <li><a class="dropdown-item" onclick="systemVersion()">Sistema</a></li>
                                    <li><a class="dropdown-item" href="login.usuario">Cerrar sesion(No funciona)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </span>
            </div>
        </div>
    </nav>
    <hr style="height: 2px">
    <div id="contenedor" name="contenedor" style="margin: 2% 20%;">
        <p id="p-cont-titulo" style="margin: 0%">
        <h5>TESTING ENCUESTA</h5>
        </p>
        <form>
            <p>Testing select encuesta</p>
            <div class="alert alert-primary" role="alert">
                Selecciona que tipo de encuesta quieres aplicar...
            </div>
            <select name="seleccion_encuesta" id="seleccion_encuesta" class="form-select" onchange="opcionSeleccionEncuesta(this.value)">
                <option value="">SELECCIONA UNA OPCION</option>
                <option value="nivel1">Nivel 1</option>
                <option value="nivel2">Nivel 2</option>
            </select>
            <br>
            <!-- <div class="alert alert-info" role="alert" id="adviseEncuestaApply" style="display: none;"> -->
            <p id="respuesta_tipoencuesta" role="alert" style="display: none;"></p>
            <!-- </div> -->

            <hr>
            <p>Testing Radio Respuestas</p>
            <div class="alert alert-primary" role="alert">
                Haz tenido dolor de cabeza estos ultimos 3 dias?
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">No</label>
            </div>
        </form>

    </div>


</body>

</html>
<script>
    function opcionSeleccionEncuesta(e) {
        console.log(e)
        if (e == "nivel1") {
            // $("adviseEncuestaApply").addClass("alert-success");
            $("#respuesta_tipoencuesta").html("<div class='alert alert-success'>Encuesta nivel 1 seleccionada. <br><a class='button' href=''>APLICAR AQUI</a></div>").fadeIn();

            // $("#adviseEncuestaApply").fadeIn();
            // setTimeout(function() {
            //     $("#adviseEncuestaApply").fadeOut();
            // }, 2000);
        }
        if (e == "nivel2") {
            $("#respuesta_tipoencuesta").html("<div class='alert alert-warning'>Encuesta nivel 2 seleccionada.<br><a class='button' href=''>APLICAR AQUI</a></div>").fadeIn();
            // $("adviseEncuestaApply").addClass("alert-info");
            // $("#adviseEncuestaApply").fadeIn();
            // setTimeout(function() {
            //     $("#adviseEncuestaApply").fadeOut();
            // }, 2000);
        }
        if (e == "") {
            $("#respuesta_tipoencuesta").html("<div class='alert alert-dark'>Ninguna opcion seleccionada</div>").fadeIn();

            setTimeout(function() {
                $("#respuesta_tipoencuesta").fadeOut();
            }, 1000);

            // $("adviseEncuestaApply").addClass("alert-danger");

            // $("#adviseEncuestaApply").fadeIn();
            // setTimeout(function() {
            //     $("#adviseEncuestaApply").fadeOut();
            // }, 2000);
        }
    }
</script>

<script>
    function abrirTogglePais() {
        $('.dropdown-toggle').dropdown()
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="menuPacientes" tabindex="-1" aria-labelledby="menuPacientes" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menu - Pacientes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <div class="card" style="width: 12rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="container-fluid" style="margin: 0 auto;">
                    <div class="row">
                        <div class="card col-md-4 ml-auto" style="width: 14rem; margin: 1% ;">
                            <img src="{{url('/images/logos/registro.png')}}" class="card-img-top" alt="..." style="width: 70%; margin: 5%">

                            <div class="card-body">
                                <h5 class="card-title">Registrar paciente</h5>
                                <p class="card-text">Opción para registrar nuevo paciente.</p>
                                <a href="#" class="btn btn-primary" onclick="registroPaciente()">Ir al registro</a>
                            </div>
                        </div>
                        <div class="card col-md-4 ml-auto" style="width: 14rem; margin: 1%">
                            <img src="{{url('/images/logos/contact-form.png')}}" class="card-img-top" alt="..." style="width: 70%; margin: 5%">
                            <div class="card-body">
                                <h5 class="card-title">Aplicar encuesta</h5>
                                <p class="card-text">Opción para aplicar encuestas a pacientes.</p>
                                <a href="#" class="btn btn-primary" onclick="avisoEncuesta()">Ir a aplicar</a>
                            </div>
                        </div>
                        <div class="card col-md-4 ml-auto" style="width: 14rem; margin: 1%">
                            <img src="{{url('/images/logos/list.png')}}" class="card-img-top" alt="..." style="width: 70%; margin: 5%">
                            <div class="card-body">
                                <h5 class="card-title">Lista de pacientes</h5>
                                <p class="card-text">Opción ver la lista de los pacientes registrados.</p>
                                <a href="#" class="btn btn-primary">Ir a la lista</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="modalEncuestaPersona" tabindex="-1" aria-labelledby="modalEncuestaPersona" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Encuesta / Cuestionario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Buscar paciente registrado: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Teclea el Nombre completo del paciente" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-success" type="button" id="button-addon2">Seleccionar</button>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Persona seleccionada: </label>
                        <input class="form-control" type="text" id="personaSeleccionada" readonly></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Ir al siguiente paso</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistroPersona" tabindex="-1" aria-labelledby="modalRegistroPersona" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow-y: scroll;">
                <form id="registroPaciente">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre de Usuario: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" aria-describedby="button-addon2" value="" onclick="generarUsuario()">
                        </div>
                        <label for="recipient-name" class="col-form-label">Nombre del paciente: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del paciente" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Apellido paterno: </label>
                        <input class="form-control" type="text" id="apaterno" name="apaterno" placeholder="Apellido paterno del paciente"></input>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Apellido materno: </label>
                        <input class="form-control" type="text" id="amaterno" name="amaterno" placeholder="Apellido materno del paciente"></input>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Fecha de nacimiento: </label>
                        <input class="form-control" type="date" id="fnac" name="fnac"></input>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Edad: </label>
                        <input class="form-control" type="number" id="edad" name="edad" placeholder="Edad del paciente"></input>
                    </div>

                    <button type="button" class="btn btn-primary">Registrar Paciente</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistroEstado" tabindex="-1" aria-labelledby="modalRegistroEstado" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de nuevo estado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-RegistroEstado">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ingresa el nombre del estado: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre del pais" aria-describedby="button-addon2" name="nombre_estado" id="nombre_pais">

                            <button class="btn btn-outline-success btn-submit-restado" type="submit" id="boton-estado">Guardar</button>
                        </div>
                    </div>
                    <div class="alert alert-success" role="alert" id="adviseStatusCountry" style="display: none;">
                        Se ha guardado el estado correctamente.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Ir al siguiente paso</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistroDoctor" tabindex="-1" aria-labelledby="modalRegistroDoctor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Matriculación y registro de empleados<h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-registroDoctor">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ingresa los datos de la persona</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Matricula a asignar" aria-describedby="button-addon2" name="matricula_empleado" id="matricula_empleado">
                            <select name="fk_persona" id="fk_persona" class="form-control">
                                <option value="">SELECCIONA PERSONA</option>
                                foreach(){
                                <option value=""></option>
                                }

                            </select>
                            <button class="btn btn-outline-success btn-submit-rdoctor" type="submit" id="boton-rdoctor">Guardar</button>
                        </div>
                    </div>
                    <div class="alert alert-success" role="alert" id="adviseStatusCountry" style="display: none;">
                        Se ha guardado el pais correctamente.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Ir al siguiente paso</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    function avisoEncuesta() {
        Swal.fire({
            title: 'AVISO IMPORTANTE',
            html: 'Antes de encuestar a algun paciente, asegurate de que este se encuentre registrado.',
            icon: 'info',
            timer: 500,
            timerProgressBar: true,

        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {

                $("#menuPacientes").modal('hide');

                setTimeout(function() {
                    return formularioEncuesta()
                }, 777);

            }
        })
    }

    // function generarUsuario() {
    //     function getRandomNumber(minRange, maxRange) {
    //         return Math.floor(Math.random() * (maxRange + 1) + minRange);
    //     }
    //     const rand = getRandomNumber(0, 100);
    //     $('#nombreUsuario').html(rand);

    // }

    function formularioEncuesta() {
        // jQuery.noConflict();
        $('#modalEncuestaPersona').modal('show');

        // $("#").modal("show")
    }

    function buscarPacienteAjax() {

    }

    function registroPaciente() {
        $("#menuPacientes").modal('hide');

        setTimeout(function() {
            $("#modalRegistroPersona").modal("show");
        }, 777);
    }

    function systemVersion() {
        Swal.fire({
            title: 'Version del sistema',
            text: 'Revision 1',
            imageUrl: "{{url('/images/logos/layers.png')}}",
            imageWidth: 250,
            imageHeight: 200,
            imageAlt: '',
        })
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // INSERCION/GUARDAR PAIS AJAX
    $(".btn-submit-rpais").click(function(e) {
        e.preventDefault();
        var nombre_estado = $("input[name=nombre_estado]").prop('required', true).val();
        console.log($("meta[name='csrf-token']").attr("content"))

        $.ajax({
            type: 'POST',
            url: "{{ route('ajaxGuardar.pais') }}",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                nombre_pais: nombre_estado            },
            success: function(respuesta) {
                // alert(data.success);
                if (respuesta == 1) {
                    // Swal.fire({
                    //     title: 'Guardado!',
                    //     html: 'Se ha guardado el pais.',
                    //     icon: 'success',
                    //     timer: 1300,
                    //     timerProgressBar: true,

                    // })
                    $("#form-RegistroPais")[0].reset();
                    $("#adviseStatusCountry").fadeIn();
                    setTimeout(function() {
                        $("#adviseStatusCountry").fadeOut();
                    }, 2000);

                } else {
                    Swal.fire({
                        title: 'AVISO IMPORTANTE',
                        html: 'Ha ocurrido un error, verifica las conexiones.',
                        icon: 'error',
                        timer: 1300,
                        timerProgressBar: true,

                    })
                }
            }
        });
    });
</script>


<!-- <script>
    $(function() {
   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
            }
        })

 });
</script> -->






































<!-- <script>

    var myModal = document.getElementById('exampleModal');
    document.onreadystatechange = function() {

        myModal.show();
    }
</script> -->
<!-- <script>
    $(document).ready(function() {
        alert("El jQuery funciona correctamente!!");
    });
</script> -->


<!-- {{--  Test Bootstrap css  --}}
<div class="alert alert-success mt-5" role="alert">
    Boostrap 5 is working using laravel 8 mix!
</div>

{{--  popper.js HTML example  --}}
<button id="button" aria-describedby="tooltip">My button</button><br><br>
<div id="tooltip" role="tooltip">My tooltip</div>

{{--    Load compiled Javascript    --}}
<script src="{{ asset('js/app.js') }}"></script>
<script>
    //Test jQuery
    $(document).ready(function () {
        console.log('jQuery works!');

        //Test bootstrap Javascript
        console.log(bootstrap.Tooltip.VERSION);
    });

    //Test popper.js
    const button = document.querySelector('#button');
    const tooltip = document.querySelector('#tooltip');
    const popperInstance = Popper.createPopper(button, tooltip);
</script> -->