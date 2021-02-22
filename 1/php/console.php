<?php

$error = false;
$match = true;
$res = false;
$action = false;
$str = isset($_POST['str'])?str_replace('"', '\'', $_POST['str']):false;


$arr = Array('help', 'contact', 'works', 'dev', 'tech', 'ic', 'awesome', 'draw', 'bubi');

$arrMatch = Array();

switch ($str) {


    
    default:

        $match = false;

        if ($str == '') {
            $arrMatch = $arr;
        } else {
            foreach ($arr as $com){
                if (strpos($com, $str) !== false) {
                    array_push($arrMatch, $com);
                }
            }
        }   

        if (sizeof($arrMatch)) {
            $res = '["'.implode('","', $arrMatch).'"]';
        } else {
            $res = '"🤖 → <i>does not compute</i>"';
            $match = 2;
        }

    break;



    case 'help':
        $res = '["Accepted commands:", "[contact] → email adress, facebook", "[works] → reference projects", "[dev] → git, releases", "[tech] → familiar tools", "[ic] → tax identification num", "[draw] → generates geometric equation", "[awesome] → will make you awesome"]';
    break;



    case 'contact':
        $res = '["oliver.stasa@gmail.com", "<a target=\"_blank\" href=\"https://facebook.com/oliver.stasa\">facebook.com/oliver.stasa</a>", "Prague, CZE"]';
    break;



    case 'works':
        $res = '["Stacha.dev:", "<a target=\"_blank\" href=\"https://terezadosek.cz\">terezadosek.cz</a>, <a target=\"_blank\" href=\"https://github.com/Stacha-dev/tardis\">Tardis API</a>", "w/ designer Alina Matějová:", "<a target=\"_blank\" href=\"https://cerna-skrinka.cz\">cerna-skrinka.cz</a>, <a target=\"_blank\" href=\"https://gizmo-lab.com\">gizmo-lab.com</a>, <a target=\"_blank\" href=\"https://siaspasse.com\">siaspasse.com</a>, <a target=\"_blank\" href=\"https://hartekk.is\">hartekk.is</a>, <a target=\"_blank\" href=\"https://alesfiala.cz\">alesfiala.cz</a>", "w/ designer Filip Kopecký:", "<a target=\"_blank\" href=\"https://famufest.cz\">famufest.cz</a>", "", "IBM Zurich:", "RXN monitoring", "", "Motions, stills:", "FAMU, Petr&Co, 13ka, Radim Procházka, Studio Mucha, TIC Brno, Kino ART, Brno 16, Ji-hlava, Žižkovská noc"]';
    break;



    case 'dev':
        $res = '["Full-stack Developer @ Stacha.dev w/ Petr Chalupa", "<a target=\"_blank\" href=\"https://github.com/Stacha-dev\">github → Stacha-dev</a>", "<a target=\"_blank\" href=\"https://github.com/oliverstasa\">github → oliverstasa</a>", "", "[Released beta] API Tardis: PHP, Doctrine, Composer", "<a target=\"_blank\" href=\"https://github.com/Stacha-dev/tardis\">github → Tardis<a>"]';
    break;



    case 'tech':
        $res = '["Full-stack:", "Architecture, Front-end, Back-end, Coding, UX, UI", "PHP, Doctrine, MySQL, JS, jQuery, React, AJAX, CSS, HTML", "GIT, VScode, Wakatime", "ISP, Linux, PayGates", "", "DOP, CO, 1st AC, 2nd AC, Grader", "ARRI, RED, BM, SONY, AATON 35mm, Bolex 16mm", "Adobe: Pr, AEf, Ps, Lr, Ai, Id", "", "Hotline Miami (A+)"]';
    break;



    case 'draw':
        $res = '["Product not yet ready."]';
    break;



    case 'ic':
        $res = '["0888 3793"]';
    break;



    case 'awesome':
        $res = '["You\'re about to become awesome.", "Please hold...", "Important thing:", "0% ........................................ 100%", "Calculations:", "0% ........................................ 100%", "Completing:", "0% ........................................ 100%", "Done.", "<span class=\"awesome\">You are awesome!</span>"]';
    break;



    case 'bubi':
        $res = '["<span class=\"bubi\"><span>I</span> <span>l</span><span>o</span><span>v</span><span>e</span> <span>b</span><span>u</span><span>b</span><span>i</span><span>!</span></span>"]';
    break;


    
}


echo '{"str": "'.$str.'", "res": '.$res.', "match": "'.$match.'", "error": "'.$error.'", "action": "'.$action.'"}';