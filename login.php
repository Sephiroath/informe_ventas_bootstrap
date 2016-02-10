<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>Tutorialspoint.com</title>
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
      
         <div class = "container form-signin">
            
            <?php
               $msg = '';
               
               if (isset($_POST['login']) && !empty($_POST['username']) 
                  && !empty($_POST['password'])) {
                   
                  if ($_POST['username'] == 'prueba' && 
                     $_POST['password'] == '1234') {
                     $_SESSION['valid'] = true;
                     $_SESSION['timeout'] = time();
                     $_SESSION['username'] = 'tutorialspoint';
                     
                     header('Location: /informe_ventas/consults/consulta_distribuido.php');
                  }else {
                     $msg = 'el Usuario o la contraseña no son validos.';
                  }
               }
            ?>
         </div> <!-- /container -->
         
         <div class="container">
            <div class="row">
               <div class="row">
                  <div class="col-sm-6 col-md-4 col-md-offset-4">
                     <h1 class="text-center login-title">Ingrese su usuario y contraseña para iniciar:</h1>
                     <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                            alt="">
                        <form class = "form-signin" role = "form" 
                           action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                           ?>" method = "post">
                           <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
                           <input type = "text" class = "form-control" 
                              name = "username" placeholder = "Usuario" 
                              required autofocus></br>
                           <input type = "password" class = "form-control"
                              name = "password" placeholder = "Contraseña" required>
                           <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                              name = "login">Login</button>
                        </form>  
                     </div>
                  </div>
               </div> 
              <div class="warning-container"><h3 class="text-center new-account">Tenga en cuenta que esta aplicacion es un demo y no todas sus funcionalidades estan habilitadas</h3></div>
              <div class="warning-container"><h3 class="text-center new-account">las credenciales de ingreso son: Usuario=prueba Password=1234</h3></div>
            </div> 
         </div> 
      </div>
   </body>
</html>