<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Perfil del Usuario</title>
  <style>
     body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color: #4CAF50;
      overflow: hidden;
    }
    .navbar a {
      float: left;
      display: block;
      color: #fff;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .navbar a:hover {
      background-color: #ddd;
      color: #000;
    }
    .navbar a.active {
      background-color: #fff;
      color: #4CAF50;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
      display: block;
      width: 100%;
      max-width: 200px;
      margin-left: auto;
      margin-right: auto;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }

    @media only screen and (max-width: 600px) {
      .container {
        max-width: 90%;
        margin: 0 auto;
      }
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="C_Menu.php">Inicio</a>
    <a href="C_Subir.php">Subir Canción</a>
    <a href="C_Perfil.php" class="active">Perfil</a>
    <a href="C_Cerrar.php">Cerrar Sesión</a>
  </div>

  <div class="container">
    <h1>Perfil del Usuario</h1>
    <form action="" method="post">
      <div class="form-group">
        <?php foreach($usuarios as $nombre): ?>
          <label>Nombre: <?php echo $nombre['nombre'] ?> </label>
          <label>Apellido Paterno: <?php echo $nombre['app'] ?> </label>
          <label>Apellido Materno: <?php echo $nombre['apm'] ?> </label>
          <label>Correo Electrónico: <?php echo $nombre['email'] ?> </label>
          <label>Fecha de Creación: <?php echo $nombre['fechacreacion'] ?> </label>
          <label>Rol: <?php echo $nombre['rol'] ?> </label>
        <?php endforeach; ?>
        <input name="btnmodificarusuario" type="submit" value="Modificar Usuario">
      </div>
    </form>
  </div>
</body>
</html>
