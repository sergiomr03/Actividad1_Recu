<?php
include 'conexion.php';
if(!empty($_POST['correo']) && !empty($_POST['contrasena'])){
        
        //Recojo las variables
        $user = $_POST['correo'];
       
        $pass =$_POST['contrasena'];
        //Miro con la sentencia sql si esta el usuario insertado, si lo esta creo una sesion con su nombre y lo llevo a nosotros y sino lo llevo al login 
        $sql = "SELECT email FROM users WHERE (email = '$user') and password = '{$pass}'";
       
      
    
        $query= mysqli_query($connection,$sql);

    if($query->num_rows=="1"){
        session_start();
        $_SESSION['nom_us'] = $user;

           
           echo " <script> window.location = './admin.bookshop.php' </script>";
        }else{
            //no existe el usuario o la contraseña esta mal
            ?>
            <script>
            alert ("el correo o la contraseña son incorrectos")
                       window.location = "./index.html"
                        </script>
                        <?php
             
        }
    } else{
        header("Location: ./index.html");
    }

