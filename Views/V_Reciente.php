<h2 class="form-title">Canciones mas recientes</h2>
            <table style="width:100%; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="padding:10px; background-color:#4CAF50; color:#fff; text-align:left;">Artista</th>
            <th style="padding:10px; background-color:#4CAF50; color:#fff; text-align:left;">Titulo</th>
            <th style="padding:10px; background-color:#4CAF50; color:#fff; text-align:left;">Fecha lanzamiento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($file as $nombre): ?>
            <tr style="border-bottom:1px solid #ccc;">
                <td class='file-title' style="padding:10px; cursor:pointer;"><?php echo $nombre['artista']?></td>
                <td style="padding:10px;"><?php echo $nombre['titulo']?></td>
                <td style="padding:10px;"><?php echo $nombre['fecha_lanzamiento']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>