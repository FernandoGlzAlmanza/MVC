<?php
session_start();
class Conexion{
    private $con;

    public function __construct(){
        $this -> con = new mysqli('localhost', 'root', '', 'mvc');
        
    }

    public function getUsers(){

        if(!empty($_POST["btningresar"])){
            if(!empty($_POST["usuario"]) and !empty($_POST["password"])){
                
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                
                $query = $this->con->query("SELECT * FROM `usuarios` WHERE nombre= '$usuario' AND pass='$password'");

                if($datos=$query->fetch_object()){
                    $_SESSION['usuario'] = $datos;
                    header("location:Controllers/C_Menu.php");
                } else {
                    echo "<script language='JavaScript'>
                    alert('Usuario no registrado');
                    location.assign('index.php');
                    </script>";
                }

            }else {
                echo "<script language='JavaScript'>
                alert('Informacion incorrecta');
                location.assign('index.php');
                </script>";
            }
        }
    }


    public function cargarUsuarios(){
        $usuario  = $_SESSION['usuario']->Idusuario;
        $query = $this->con->query("SELECT u.nombre, u.app, u.apm, u.email, u.fechacreacion, r.nombre as rol FROM usuarios u INNER JOIN roles_usuarios a ON u.Idusuario = a.id_usuario INNER JOIN rol r ON a.id_rol = r.Idrol WHERE u.Idusuario = '$usuario'");

        $retorno = [];

        $i = 0;

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function CargarArchivo(){

        if(!empty($_POST["btnfile"])){
            

            $directorio = "C:\\xampp\htdocs\MVC\Controllers\Canciones/";

            $nombreArchivo = basename($_FILES["btncargarfile"] ["name"]);

            $archivo = $directorio .basename($_FILES["btncargarfile"] ["name"]);

            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            

            $artist = $_POST["artist"];
            $album = $_POST["album"];
            $genre = $_POST["genre"];
            $release_date = $_POST["release_date"];
         

            if($tipoArchivo == "mp3"){
                
                
                if(move_uploaded_file($_FILES["btncargarfile"] ["tmp_name"], $archivo));{
                    require_once '../getID3-master/getid3/getid3.php';

                    $getID3 = new getID3();
        
                    $info = $getID3->analyze($archivo);
        
                    $duracion = $info['playtime_seconds'];
        
                    $duracion_cadena = getid3_lib::PlaytimeString($duracion);

                $query = $this->con->query("INSERT INTO `canciones` (`titulo`, `artista`, `album`, `genero`, `duracion`, `fecha_lanzamiento`, `reproducciones`) VALUES ('$nombreArchivo', '$artist', '$album', '$genre', '$duracion_cadena', '$release_date', '0')");

                $id_usuario  = $_SESSION['usuario']->Idusuario;
                
                $id_cancion = mysqli_insert_id($this->con);
                
                $query = $this->con->query("INSERT INTO `canciones_usarios` (`idcu`, `id_cancion`, `id_usuario`) VALUES (NULL, '$id_cancion', '$id_usuario');");

                echo "<script language='JavaScript'>
                alert('Archivo subido correctamente');
                location.assign('C_Menu.php');
                </script>";
                
                }

            }else{
                          
            echo "<script language='JavaScript'>
            alert('Archivo no valido');
            location.assign('C_Menu.php');
            </script>";
            
            }
       }else {
        
       }
    }

    public function Tabla(){
        
        $query = $this->con->query('SELECT * FROM canciones');

        $retorno = [];
 
        $i = 0;
 
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
 
        return $retorno;
    }

    public function reproduccion(){

        if(isset($_POST['titulo'])) {

            $titulo = $_POST['titulo'];       

            $this->con->query("UPDATE canciones SET reproducciones = reproducciones + 1 WHERE titulo = '$titulo'");
        
        }
    }

    public function addUsers(){

        if(!empty($_POST["btnagregarusuario"])){

              
            $name = $_POST["name"];
            $app = $_POST["app"];
            $apm = $_POST["apm"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $fecha_actual = date('Y-m-d H:i:s');

            $query = $this->con->query("INSERT INTO `usuarios` (`Idusuario`, `nombre`, `app`, `apm`, `pass`, `email`, `fechacreacion`) VALUES (NULL, '$name', '$app', '$apm', '$password', '$email', '$fecha_actual')");

            $id_usuario = mysqli_insert_id($this->con);

            $query = $this->con->query("INSERT INTO `roles_usuarios` (`idru`, `id_rol`, `id_usuario`) VALUES (NULL, 3, $id_usuario)");

               
            echo "<script language='JavaScript'>
            alert('Usuario registrado correctamente');
            location.assign('../index.php');
            </script>";
        }
    }

    public function Cerrar(){
        session_destroy();
        header("Location: ../index.php");
        exit;
    }

    public function topReproducciones(){

        $query = $this->con->query("SELECT titulo, reproducciones FROM canciones ORDER BY reproducciones DESC LIMIT 10");

        $retorno = [];
 
        $i = 0;
 
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
 
        return $retorno;

    }

    public function topGenero(){

        $query = $this->con->query("SELECT genero, SUM(reproducciones) AS total_reproducciones FROM canciones GROUP BY genero ORDER BY total_reproducciones DESC");

        $retorno = [];
 
        $i = 0;
 
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
 
        return $retorno;

    }

    public function cancionesmasrecientes(){

        $query = $this->con->query("SELECT artista, titulo, fecha_lanzamiento FROM canciones WHERE fecha_lanzamiento = (SELECT MAX(fecha_lanzamiento) FROM canciones c2 WHERE c2.artista = canciones.artista) ORDER BY artista ASC");

        $retorno = [];
 
        $i = 0;
 
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
 
        return $retorno;

    }

}


?>