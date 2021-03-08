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

    $body = '';
    $r = rand(0,200);

    if ($r < 50) {$g = rand (100,200);} else {$g = rand(0,50);}

    $body .= '<table>';

    while ($x < $x_size) {
            
        $body .= '<tr>';
        $y = 0;
            
            while ($y < $y_size) {

                $body .= '<td style="background: rgb('.$r.', '.$g.', ';

                switch($fce) {
                    case 1: $body .= sinsinpow($x, $y); break;
                    case 2: $body .= sinsin($x, $y); break;
                    case 3: $body .= sincospow3($x, $y); break;
                    case 4: $body .= tansin($x, $y); break;
                    case 5: $body .= tancotan($x, $y); break;
                    case 6: $body .= sinx2($x, $y); break;
                    case 7: $body .= sinx3($x, $y); break;
                    case 8: $body .= powertopower($x, $y, $x_size); break;
                    case 9: $body .= powermoresin($x, $y); break;
                    case 10: $body .= custom1($x, $y); break;
                    case 11: $body .= custom2($x, $y); break;
                    case 12: $body .= custom3($x, $y); break;
                    case 13: $body .= custom4($x, $y); break;
                    case 14: $body .= custom5($x, $y); break;
                    case 15: $body .= custom6($x, $y); break;
                    case 16: $body .= custom7($x, $y); break;
                }

                $body .= ');">';
                $y++;

            }

        $body .= '</tr>';
        $x++;
    
    }
    
    $body .= '</table>';

    return $body;

  }



switch(rand(1, 16)) {
    case 1:
      $name = 'sin(x)<sup>2</sup>=sin(y)<sup>2</sup>';
      $body = plain(100,100, 1);
    break;
    case 2:
      $name = 'sin(x)=sin(y)';
      $body = plain(100,100, 2);
    break;
    case 3:
      $name = 'sin(x)<sup>3</sup>=cos(y)';
      $body = plain(100,100, 3);
    break;
    case 4:
      $name = 'sin(x)=tan(y)';
      $body = plain(100,100, 4);
    break;
    case 5:
      $name = 'tan(x)=tan(y)';
      $body = plain(100,100, 5);
    break;
    case 6:
      $name = 'sin(2x)=sin(y)';
      $body = plain(100,100, 6);
    break;
    case 7:
      $name = 'sin(x)<sup>1/2</sup>=sin(y)';
      $body = plain(100,100, 7);
    break;
    case 8:
      $name = 'x<sup>2</sup>=y<sup>2</sup> || x+y=(size) || y||x=(size)/2';
      $body = plain(100,100, 8);
    break;
    case 9:
      $name = 'sin(2x)&lt;cos(2y)';
      $body = plain(100,100, 9);
    break;
    case 10:
      $name = '3y+2x>5y+tan(x)<sup>3</sup>';
      $body = plain(100,100, 10);
    break;
    case 11:
      $name = 'y*log(y)<sin(x)*x<sup>1.4</sup>';
      $body = plain(100,100, 11);
    break;
    case 12:
      $name = 'log(x)>log(y)';
      $body = plain(100,100, 12);
    break;
    case 13:
      $name = 'sin(1.1x)>sin(x/2y)';
      $body = plain(100,100, 13);
    break;
    case 14:
      $name = 'sin(x)>sin(3x/y)';
      $body = plain(100,100, 14);
    break;
    case 15:
      $name = 'log(x)=log(y)';
      $body = plain(100,100, 15);
    break;
    case 16:
      $name = 'tan(x)=log(y/15)';
      $body = plain(100,100, 16);
    break;
}

$body = str_replace('"', '\"', $body);

echo '{"name": "'.$name.'", "body": "'.$body.'"}';
