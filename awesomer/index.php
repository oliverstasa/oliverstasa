<<<<<<< HEAD
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="../sign.gif" rel="icon" type="image/x-icon">
<title>Awesomer</title>
<style>
@font-face {font-family: 'Geo'; src: url('../Geo.woff');}
body, html {font-family: 'Geo'; margin: 0; padding: 0; width: 100%; height: 100%;}
#bob {height: 50px; width: 0px; background: black; float: left;}
#done {display: none; width: 200px; height: 50px; text-align: center; background: url('../mad.gif');}
#border {padding: 5px; border: 1px solid black; width: 205px; text-align: left;}
</style>

<script src="../jq_v2_2_0.js" type="text/javascript"></script>


<script type="text/javascript">

$(document).ready(function() {
    $(window).load(function() {
      $("#bob").animate({width: 200}, 7000, 'linear', function(){
        $("#bob").slideUp(400);
        $("#done").slideDown(400, function(){
            $("#border").animate({padding: 30}, 100, function(){
                $("#border").animate({border: 0, padding: 0}, 100, function(){
                    $("#border").css({width: "100%", height: "100%"});
                    $("#done").animate({width: "400", height: "100", 'font-size': '300%'}, 200);
                });
            });
        });
      });
    });
});

</script>

</head>
<body>
  <table width=100% height=100%>
  <tr><td align=center valign=center>
  <div id="border">
    <table width=100% height=100%>
    <tr><td align=center valign=center>
      <div id="bob"></div>
      <div id="done"><table width=100% height=100%><tr><td align=center valign=center>You are awesome!</td></tr></table></div>
    </td></tr>
    </table>
  </div>
  </td></tr>
  </table>
</body>
</html>
=======
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="../sign.gif" rel="icon" type="image/x-icon">
<title>Awesomer</title>
<style>
@font-face {font-family: 'Geo'; src: url('../Geo.woff');}
body, html {font-family: 'Geo'; margin: 0; padding: 0; width: 100%; height: 100%;}
#bob {height: 50px; width: 0px; background: black; float: left;}
#done {display: none; width: 200px; height: 50px; text-align: center; background: url('../mad.gif');}
#border {padding: 5px; border: 1px solid black; width: 205px; text-align: left;}
</style>

<script src="../jq_v2_2_0.js" type="text/javascript"></script>


<script type="text/javascript">

$(document).ready(function() {
    $(window).load(function() {
      $("#bob").animate({width: 200}, 7000, 'linear', function(){
        $("#bob").slideUp(400);
        $("#done").slideDown(400, function(){
            $("#border").animate({padding: 30}, 100, function(){
                $("#border").animate({border: 0, padding: 0}, 100, function(){
                    $("#border").css({width: "100%", height: "100%"});
                    $("#done").animate({width: "400", height: "100", 'font-size': '300%'}, 200);
                });
            });
        });
      });
    });
});

</script>

</head>
<body>
  <table width=100% height=100%>
  <tr><td align=center valign=center>
  <div id="border">
    <table width=100% height=100%>
    <tr><td align=center valign=center>
      <div id="bob"></div>
      <div id="done"><table width=100% height=100%><tr><td align=center valign=center>You are awesome!</td></tr></table></div>
    </td></tr>
    </table>
  </div>
  </td></tr>
  </table>
</body>
</html>
>>>>>>> 9747ade8da65f879882d9bd7b0e2d7865f8cb659
