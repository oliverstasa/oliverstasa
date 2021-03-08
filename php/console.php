<?php

$error = false;
$match = true;
$res = false;
$action = false;
$str = isset($_POST['str'])?str_replace('"', '\'', $_POST['str']):false;


$arr = Array('help', 'contact', 'works', 'dev', 'tech', 'ic', 'awesome', 'draw', 'identify', 'bubi');

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
        $res = '["<i>Command list:</i>", "[contact] → email, facebook", "[works] → references", "[dev] → git, releases", "[tech] → skill set", "[ic] → tax id", "[identify] → identifies things for you 👁", "[draw] → generates geometric equation", "[awesome] → will make you awesome"]';
    break;



    case 'bubi':
        $res = '["<span class=\"bubi\"><span>b</span><span>u</span><span>b</span><span>i</span> <span>l</span><span>o</span><span>v</span><span>e</span><span>s</span> <span>b</span><span>u</span><span>b</span><span>i</span></span>"]';
    break;



    case 'contact':
        $res = '["oliver.stasa@gmail.com", "<a target=\"_blank\" href=\"https://facebook.com/oliver.stasa\">facebook.com/oliver.stasa</a>", "Prague, CZE"]';
    break;



    case 'works':
        $res = '["<i>⌨ Web apps</i>", "Stacha.dev:", "<a target=\"_blank\" href=\"https://terezadosek.cz\">terezadosek.cz</a>, <a target=\"_blank\" href=\"https://github.com/Stacha-dev/tardis\">Tardis API</a>", "w/ designer Alina Matějová:", "<a target=\"_blank\" href=\"https://cerna-skrinka.cz\">cerna-skrinka.cz</a>, <a target=\"_blank\" href=\"https://gizmo-lab.com\">gizmo-lab.com</a>, <a target=\"_blank\" href=\"https://siaspasse.com\">siaspasse.com</a>, <a target=\"_blank\" href=\"https://hartekk.is\">hartekk.is</a>, <a target=\"_blank\" href=\"https://alesfiala.cz\">alesfiala.cz</a>", "w/ designer Filip Kopecký:", "<a target=\"_blank\" href=\"https://famufest.cz\">famufest.cz</a>", "", "<i>🔬 Technology</i>", "IBM Zurich:", "<a target=\"_blank\" href=\"https://rxn.res.ibm.com/\">RXN monitoring</a>", "", "<i>🎬 Motions, stills, crew</i>", "w/ Karolína Nováková:", "FAMU, <a target=\"_blank\" href=\"https://www.13ka.eu/\">13ka</a>, <a target=\"_blank\" href=\"https://www.ji-hlava.cz/\">Ji-hlava</a>, <a target=\"_blank\" href=\"https://anifilm.cz/\">Anifilm</a>, <a target=\"_blank\" href=\"https://zizkovskanoc.net/\">Žižkovská noc</a>", "Other:", "<a target=\"_blank\" href=\"http://petrand.co/\">Petr&Co</a>, TIC Brno, <a target=\"_blank\" href=\"https://www.kinoart.cz/\">Kino ART</a>, <a target=\"_blank\" href=\"http://brno16.cz/\">Brno 16</a>, <a target=\"_blank\" href=\"https://studiomucha.cz/\">Studio Mucha</a>, <a target=\"_blank\" href=\"https://vimeo.com/produkcerp\">Radim Procházka prod.</a>"]';
    break;



    case 'dev':
        $res = '["Full-stack Developer @ Stacha.dev w/ Petr Chalupa", "<a target=\"_blank\" href=\"https://github.com/Stacha-dev\">github → Stacha-dev</a>", "<a target=\"_blank\" href=\"https://github.com/oliverstasa\">github → oliverstasa</a>", "", "<b>API Tardis</b> 🚀 [Release 0.1.0]:", "PHP, Doctrine ORM, Composer, Postman", "<a target=\"_blank\" href=\"https://github.com/Stacha-dev/tardis\">github → Tardis<a>"]';
    break;



    case 'tech':
        $res = '["Full-stack programmer", "Architecture, Front-end, Back-end, Coding, UX, UI", "PHP, Doctrine, MySQL, JS, jQuery, React, AJAX, CSS, HTML", "GIT, VScode, Wakatime", "Linux: server setup, ISP, PayGates", "", "DOP, CO, 1st AC, 2nd AC, Grader", "ARRI, RED, BM, SONY, AATON 35mm, Bolex 16mm", "Adobe: Pr, AEf, Ps, Lr, Ai, Id", "", "Hotline Miami (A+)"]';
    break;



    case 'draw':
        $res = '[]';
        $action = 'draw';
    break;



    case 'ic':
        $res = '["0888 3793"]';
    break;



    case 'awesome':
        $res = '["You\'re about to become awesome.", "Please hold...", "Important thing:", "0% ........................................ 100%", "Calculations:", "0% ........................................ 100%", "Completing:", "0% ........................................ 100%", "Done.", "<span class=\"awesome\">You are awesome!</span>"]';
    break;


    
    case 'identify':
        $res = '["Show me something, I\'ll identify it.", "[Allow camera access]", "Loading..."]';
        $action = 'webcam';
    break;

    
    
    case 'stop':
        $res = '["[Actions aborted]"]';
    break;



    case 'dir':
        $res = '["Oh, a joke!"]';
    break;



    case 'exit':
        $res = '["There is no exit."]';
        $action = 'noexit';
    break;



    
}


echo '{"str": "'.$str.'", "res": '.$res.', "match": "'.$match.'", "error": "'.$error.'", "action": "'.$action.'"}';