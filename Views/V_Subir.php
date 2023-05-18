<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Canción</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
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

    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
      box-sizing: border-box;
      font-size: 16px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
        .form-input {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
         .form-submit {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-input,
        .form-submit {
            padding: 8px;
            font-size: 14px;
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
    </style>
</head>
<body>
    <div class="navbar">
        <a href="C_Menu.php">Inicio</a>
        <a href="C_Perfil.php">Perfil</a>
        <a href="C_Cerrar.php">Cerrar sesión</a>
    </div>
    <div class="container">
        <h1>Subir canción</h1>
        <form method="post" enctype="multipart/form-data">
          
            <label for="artist">Artista:</label>
            <input type="text" id="artist" name="artist" required>

            <label for="album">Álbum:</label>
            <input type="text" id="album" name="album" required>

            <label for="genre">Género:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="release_date">Fecha de lanzamiento:</label>
            <input type="date" id="release_date" name="release_date" required>

            <input type="file" name="btncargarfile" class="form-input">
            <input name="btnfile" type="submit" value="Subir canción" class="form-submit">
        </form>
    </div>
</body>
</html>
