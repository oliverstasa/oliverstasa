<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<!-- <link href="./data/fav.png" rel="icon" type="image/x-icon"> -->
<title>POKLAD</title>
<link href="./style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Oliver Stasa, oliver.stasa@gmail.com">
<meta name="robots" content="all">

<link rel="image_src" href="/atonka.jpg" alt="aatonka">

<script src="../js/jq.js" type="text/javascript"></script>
<script src="./mover.js" type="module"></script>

<style>
html, body {width: 100%; height: 100%; margin: 0; padding: 0; background: black; color: white;}
#box {width: 20vh; height: 20vh; background: pink; top: 50vh; left: 50vw; border-radius: 50%; z-index: 5;}
#key {width: 7vh; height: 7vh; background: url('https://images.vexels.com/media/users/3/131266/isolated/preview/820e11fa16876d223150566953ea0bdd-locker-key-icon-by-vexels.png') center center no-repeat; background-size: contain; top: 50vh; left: 50vw; filter: invert(100%);}
#keyhole {width: 10vh; height: 10vh; background: url('https://static.thenounproject.com/png/319609-200.png') center center no-repeat; background-size: contain; top: 15vh; left: 15vh; position: absolute; filter: invert(100%);}
h1 {position: absolute;}

.moveable {cursor: move !important; user-select: none !important; position: absolute; transform: translate(-50%, -50%);}
  .moveable img {pointer-events: none !important;}
  .moving {transition-property: none !important;}
</style>

</head>

<body>

    <div id="box" class="moveable"></div>
    <div id="key" class="moveable key" pair="red"></div>
    <div id="keyhole" class="keyhole" pair="red"></div>

</body>
</html>
