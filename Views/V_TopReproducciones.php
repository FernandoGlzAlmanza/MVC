<h2 class="form-title">Top 10 Canciónes con mas reproducciones</h2>
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