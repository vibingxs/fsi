<?php
    $videoFile = isset($_GET['file']) ? $_GET['file'] : '';
?>
<video id="movie" width="720" height="404" autoplay controls preload="auto">
    <source src="videos/<?=$videoFile?>.mp4" type="video/mp4" />
    <source src="videos/<?=$videoFile?>.ogv" type="video/ogg" />
    <source src="videos/<?=$videoFile?>.webm" type="video/webm" />

    <object width="720" height="404" type="application/x-shockwave-flash" data="build/flashmediaelement.swf">
        <param name="movie" value="build/flashmediaelement.swf">
        <param name="allowfullscreen" value="true">
        <param name="flashvars" value="controls=true&amp;file=http://dev.oracle-eppm.com/videos/<?=$videoFile?>.mp4">
    </object>
</video>