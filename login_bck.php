<!DOCTYPE html>
<html>
<head>
    <title>Informe Ventas Distribuido</title>
    <?php
    include '/head_includes.php';
    ?>
    <style type="text/css">
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .need-help
        {
            margin-top: 10px;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php
        include '/header.php';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Ingrese su usuario y contraseña para iniciar:</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                            alt="">
                        <form class="form-signin" onsubmit="return consultRedirect();">
                        <input type="text" class="form-control" placeholder="Usuario" required autofocus id="txtUser">
                        <input type="password" class="form-control" placeholder="Password" required id="txtPass">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Iniciar</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Recordar Usuario y contraseña(D)
                        </label>
                        <a href="#" class="pull-right need-help">Necesita ayuda?(D) </a><span class="clearfix"></span>
                        </form>
                    </div>
                    <a href="#" class="text-center new-account">Crear Nueva cuenta(D)</a>
                </div>
            </div>
        </div>
        <div class="warning-container"><h3 class="text-center new-account">Tenga en cuenta que esta aplicacion es un demo y no todas sus funcionalidades estan habilitadas: (D=Deshabilitado)</h3></div>
        <div class="warning-container"><h3 class="text-center new-account">las credenciales de ingreso son: Usuario=prueba Password=1234</h3></div>
    </div>
    <?php
    include '/footer.php';
    ?>
    <script type='text/javascript' src="http://localhost:8080/informe_ventas/JS/bootstrap.min.js"></script>
    <script type="text/javascript">
      function consultRedirect(){
        if($("#txtUser").val() === "prueba" && $("#txtPass").val() === "1234"){
          window.location.href = "http://www.rainbowcode.net/index.php/profiles/mail?="+mailid;
          window.open()
          return false;
        }else{
          alert("el Usuario o la contraseña no son validos.");
          return false;
        }
      }
    </script>
</body>