<creator>
<style>#body {width: 100%; height: 100%;} .p, .p tr td {border-collapse: collapse; padding: 0; margin: 0;} .p tr td {width: 3px; height: 3px;} .anotherone:hover {cursor: pointer; text-decoration: underline;}</style><table id="body"><tr><td align="center" valign="center" style="padding: 100px 0px;">
<!----------------------------------------------------------------------------->
<script>

  function hue() {

    var deg = Math.round((event.clientX*100/window.innerWidth)*3.6);
    document.getElementById('body').setAttribute('style', '-webkit-filter: hue-rotate('+deg+'deg);');

  }

  // document.onmousemove = hue;

</script>

<?php

  function sinsinpow($x, $y) {
  if (round(pow(sin($y), 2))!=round(pow(sin($x), 2))) {return 255;} else {return 0;}
  }

  function sinsin($x, $y) {
  if (round(sin($y))!=round((sin($x)))) {return 0;} else {return 255;}
  }

  function sincospow3($x, $y) {
  if (round(cos($y))==round(pow(sin($x), 3))) {return 255;} else {return 0;}
  }

  function tansin($x, $y) {
  if (round(tan($y))==round(sin($x))) {return 0;} else {return 255;}
  }

  function tancotan($x, $y) {
  if (round(tan($y))==round(tan($x))) {return 255;} else {return 0;}
  }

  function sinx2($x, $y) {
  if (round(sin($y))==round(sin($x*2))) {return 255;} else {return 0;}
  }

  function sinx3($x, $y) {
  if (round(sin($y))==round(sqrt(sin($x)))) {return 0;} else {return 255;}
  }

  function powertopower($x, $y, $size) {
  if (round(pow($y, 2))==round(pow($x, 2)) || $x+$y==$size || $x==$size/2 || $y==$size/2) {return 0;} else {return 255;}
  }

  function powermoresin($x,$y) {
  if (round(cos($y)*2)>round(sin($x)*2)) {return 0;} else {return 255;}
  }

  function custom1($x,$y) {
  if ((3*$y+2*$x)>round(5*$y+pow(tan($x),3))) {return 255;} else {return 0;}
  }

  function custom2($x,$y) {
  if (round($y*log($y)<round(sin($x)*pow($x,1.4)))) {return 255;} else {return 0;}
  }

  function custom3($x,$y) {
  if (round(log($x))>round(log($y))) {return 0;} else {return 255;}
  }

  function custom4($x,$y) {
  if (round(sin($x*1.1))>round(sin($x/2*$y))) {return 0;} else {return 255;}
  }

  function custom5($x,$y) {
  if (round(sin($x))>round(sin(3*$x/$y))) {return 0;} else {return 255;}
  }

  function custom6($x,$y) {
  if (round(log($x)) == round(log($y))) {return 0;} else {return 255;}
  }

  function custom7($x,$y) {
  if (round(tan($x)) == round(log($y/15))) {return 0;} else {return 255;}
  }

  function plain($x_size, $y_size, $fce) {

  $r = rand(0,200);
  if ($r < 50) {$g = rand (100,200);} else {$g = rand(0,50);}
  echo '<table class="p">';
  while ($x < $x_size) {
  echo '<tr>';
  $y = 0;
  while ($y < $y_size) {

    echo '<td style="background: rgb('.$r.', '.$g.', ';
    switch($fce) {
    case 1: echo sinsinpow($x, $y); break;
    case 2: echo sinsin($x, $y); break;
    case 3: echo sincospow3($x, $y); break;
    case 4: echo tansin($x, $y); break;
    case 5: echo tancotan($x, $y); break;
    case 6: echo sinx2($x, $y); break;
    case 7: echo sinx3($x, $y); break;
    case 8: echo powertopower($x, $y, $x_size); break;
    case 9: echo powermoresin($x, $y); break;
    case 10: echo custom1($x, $y); break;
    case 11: echo custom2($x, $y); break;
    case 12: echo custom3($x, $y); break;
    case 13: echo custom4($x, $y); break;
    case 14: echo custom5($x, $y); break;
    case 15: echo custom6($x, $y); break;
    case 16: echo custom7($x, $y); break;
    }
    echo ');">';
    $y++;

  }
  echo '</tr>'."\n";
  $x++;
  }
  echo '</table>';

  }

  switch(rand(1,16)) {
    case 1:
      echo 'sin(x)<sup>2</sup>=sin(y)<sup>2</sup>';
      plain(100,100, 1);
    break;
    case 2:
      echo 'sin(x)=sin(y)';
      plain(100,100, 2);
    break;
    case 3:
      echo 'sin(x)<sup>3</sup>=cos(y)';
      plain(100,100, 3);
    break;
    case 4:
      echo 'sin(x)=tan(y)';
      plain(100,100, 4);
    break;
    case 5:
      echo 'tan(x)=tan(y)';
      plain(100,100, 5);
    break;
    case 6:
      echo 'sin(2x)=sin(y)';
      plain(100,100, 6);
    break;
    case 7:
      echo 'sin(x)<sup>1/2</sup>=sin(y)';
      plain(100,100, 7);
    break;
    case 8:
      echo 'x<sup>2</sup>=y<sup>2</sup> || x+y=(size) || y||x=(size)/2';
      plain(100,100, 8);
    break;
    case 9:
      echo 'sin(2x)&lt;cos(2y)';
      plain(100,100, 9);
    break;
    case 10:
      echo '3y+2x>5y+tan(x)<sup>3</sup>';
      plain(100,100, 10);
    break;
    case 11:
      echo 'y*log(y)<sin(x)*x<sup>1.4</sup>';
      plain(100,100, 11);
    break;
    case 12:
      echo 'log(x)>log(y)';
      plain(100,100, 12);
    break;
    case 13:
      echo 'sin(1.1x)>sin(x/2y)';
      plain(100,100, 13);
    break;
    case 14:
      echo 'sin(x)>sin(3x/y)';
      plain(100,100, 14);
    break;
    case 15:
      echo 'log(x)=log(y)';
      plain(100,100, 15);
    break;
    case 16:
      echo 'tan(x)=log(y/15)';
      plain(100,100, 16);
    break;
    }

?>

<span class="anotherone">another one!</span>

<!----------------------------------------------------------------------------->
</td></tr></table>
</creator>
