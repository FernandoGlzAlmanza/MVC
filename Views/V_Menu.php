<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .form-container {
        margin-top: 50px;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .form-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
    }

    @media only screen and (max-width: 768px) {
        .container {
            max-width: 100%;
        }
    }
    audio {
        width: 100%;
        margin-top: 20px;
        outline: none;
    }

    audio::-webkit-media-controls-panel {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    audio::-webkit-media-controls-play-button {
        background-color: #4CAF50;
        border: none;
        border-radius: 4px;
    }

    audio::-webkit-media-controls-volume-slider {
        width: 60px;
        height: 8px;
        -webkit-appearance: none;
        background-color: #ccc;
        border-radius: 4px;
        outline: none;
    }

    audio::-webkit-media-controls-timeline-container {
        height: 4px;
        margin-top: 2px;
        margin-bottom: 4px;
        background-color: #ccc;
        border-radius: 4px;
    }

    audio::-webkit-media-controls-current-time-display,
    audio::-webkit-media-controls-time-remaining-display {
        font-size: 14px;
        font-weight: bold;
    }

    audio::-webkit-media-controls-mute-button,
    audio::-webkit-media-controls-play-button,
    audio::-webkit-media-controls-fullscreen-button {
        height: 24px;
        width: 24px;
    }

    audio::-webkit-media-controls-volume-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 16px;
        width: 16px;
        background-color: #4CAF50;
        border-radius: 50%;
        cursor: pointer;
    }
    .file-title:hover {
        cursor: pointer;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead th {
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        text-align: left;
    }

    tbody tr {
        border-bottom: 1px solid #ccc;
    }

    tbody td.file-title {
        padding: 10px;
        cursor: pointer;
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
  <a href="C_Subir.php">Subir Cancion</a>
  <a href="C_Perfil.php">Perfil</a>
  <a href="C_TopReproducciones.php">Top Repros</a>
  <a href="C_TopGenero.php">Top Genero</a>
  <a href="C_Reciente.php">Canciones mas recientes</a>
  <a href="C_Cerrar.php">Cerrar sesión</a>
</div>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Canciónes</h2>
            <table style="width:100%; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="padding:10px; background-color:#4CAF50; color:#fff; text-align:left;">Titulo</th>
            <th style="padding:10px; background-color:#4CAF50; color:#fff; text-align:left;">Reproducciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($file as $nombre): ?>
            <tr style="border-bottom:1px solid #ccc;">
                <td class='file-title' style="padding:10px; cursor:pointer;"><?php echo $nombre['titulo']?></td>
                <td style="padding:10px;"><?php echo $nombre['reproducciones']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


            <audio controls id="audio-player">
                <source src="" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>

            <script>
                const fileTitles = document.querySelectorAll('.file-title');
                const audioPlayer = document.getElementById('audio-player');

                fileTitles.forEach(title => {
                    title.addEventListener('click', () => {
                        const fileName = title.innerText;
                        const audioFile = `Canciones/${fileName}`;
                        audioPlayer.setAttribute('src', audioFile);
                        audioPlayer.load();
                        audioPlayer.play();

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'C_Reproducciones.php');
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.send(`titulo=${fileName}`);
                    });
                 });
            </script>

        </div>
    </div>
</body>
</html>
