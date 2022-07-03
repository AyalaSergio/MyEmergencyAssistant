<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .form-signin {
        width: 25%;
        height: 40%;
        margin: 115px 36% 50px auto;
    }
</style>

<body class="text-center">

    <main class="form-signin">
        <form id="inicio_sesion">
            <img src="{{url('/images/logos/hospital.png')}}" style="width: 85px;" /><br>
            <h1 class="h3 mb-3 fw-normal">Inicio de Sesion</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="correo" placeholder="usuario@example.com">
                <label for="floatingInput">Correo electronico</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="contrasena" placeholder="Contrasena">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <!-- 
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label> -->
            </div>
            <br>
            <button class="btn btn-primary iniciar-sesion-boton" type="submit">Iniciar sesion</button>
            <p class="mt-5 mb-3 text-muted">Mi Asistente de Emergencias</p>
        </form>
    </main>
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".iniciar-sesion-boton").click(function(e) {
        e.preventDefault();
        var correo = $("#correo").val();
        var contrasena = $("#contrasena").val();
        // console.log(correo)
        // console.log(contrasena)
        // console.log($("meta[name='csrf-token']").attr("content"))

        $.ajax({
            type: 'POST',
            url: "{{ route('AjaxbuscarUsuario') }}",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                correo: correo,
                contrasena: contrasena
            },
            success: function(respuesta) {

                // alert(data.success);
                console.log(respuesta)
                if (respuesta == 'user_sucss') {
                    Swal.fire(
                        'Inicio de Sesion',
                        'Te redireccionaremos a tu panel de control.',
                        'success'
                    )

                    setTimeout(function() {

                    }, 2000);
                }
                if (respuesta == "pass_err" || respuesta == "wrong_email") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Verifica el usuario y contraseña.'
                    })

                    setTimeout(function() {}, 2000);
                }
            },
            error: function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Verifica el usuario y contraseña.'
                })
            }
        });
    });
</script>

<script>


</script>

</html>