<?php

$seed = substr(str_shuffle('milujukajunazvdy'), 0, 6);

$name = time().'_'.$seed.'.jpg';
if (move_uploaded_file($_FILES['webcam']['tmp_name'], '../data/webcam/'.$name)) {
    echo $name;
} else {
    echo 'error';
}
