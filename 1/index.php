<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<link href="/data/fav.png" rel="icon" type="image/x-icon">
<title>Oliver Staša</title>
<link href="./css/style.css" rel="stylesheet">
<?php if (date('H') < 7 || date('H') > 18) {echo '<link href="/css/night.css" rel="stylesheet">';} ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="oliver.stasa@gmail.com">
<meta name="keywords" content="Oliver Stasa, programmer, coder, fullstack, filmmaker, photography">
<meta name="author" content="Oliver Stasa">
<meta name="robots" content="all">

<link rel="image_src" href="./atonka.jpg" alt="aatonka">

<script src="./js/jq.js" type="text/javascript"></script>
<script src="./js/fce.js" type="text/javascript"></script>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</head>

<body>

    <div id="console" class="box">
        <div id="slash">›</div>
        <input id="terminal" type="text">
        <div id="whisp"></div>
        <div id="log"></div>
    </div>

    <div id="content" class="box">
    <div id="face">
        <model-viewer id="oli" loading="eager" camera-controls auto-rotate camera-orbit="-60deg 90deg 6m" exposure="1" environment-image="./data/ok.png" interaction-prompt-threshold="999999999999" stage-light-intensity="0" shadow-intensity="0" src="./data/oliver2.glb" alt="It's a me"></model-viewer>
        <script>
            const model = document.querySelector("model-viewer#oli");
            model.orientation = '0deg 0deg -30deg';
        </script>
    </div>
    </div>

</body>
</html>
