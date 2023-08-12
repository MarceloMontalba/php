<?php
    $url = "https://api.dailymotion.com/videos?channel=sport&limit=10";
    $opciones = array("ssl"=>array("verify_peer"=>false, "verify_peer_name"=>false));

    $respuesta = file_get_contents($url, false, stream_context_create($opciones));
    $objRespuesta = json_decode($respuesta);
?>

<ul>
    <?php foreach($objRespuesta->list as $video) { ?>
        <li><?php echo "Video: ".$video->title." | Canal: ".$video->channel ?></li>
    <?php }?>
</ul>