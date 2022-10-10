<?php

require 'vendor/autoload.php';
require 'functions.php';

// Import des classes utilisées en dessous
use App\Avatar\Avatar;
use App\Avatar\AvatarSvgTransformer;
use App\Avatar\AvatarSvgFactory;

// Initialisation de la taille et du nombre de couleurs avec des valeurs par défaut
// $size = AvatarSvgFactory::DEFAULT_SIZE;
// $color = AvatarSvgFactory::DEFAULT_NB_COLORS;
// if(!empty($_POST)){
//     $size = intval($_POST["size"]); 
//     $color = intval($_POST["color"]); 
// }

$size = $_POST["size"]??AvatarSvgFactory::DEFAULT_SIZE;
$color = $_POST["color"]??AvatarSvgFactory::DEFAULT_NB_COLORS;

// On détermine l'action à effectuer. Par défaut, on génère un avatar
$action = $_POST['action'] ?? 'generate';

switch($action){
    case 'generate':
        $svg = (new AvatarSvgFactory)->createRandomAvatar($size,$color);
        break;

    case 'save':
        $svg = $_POST['svg'];
        $file = saveSvg($svg);
        break;

    case 'download':
        $svg = $_POST['svg'];
        $file = downloadSvg();

         // On envoie le code SVG au client
        echo $svg;
        exit; //pour ne pas inclure le reste du code html
}
    
include 'index.phtml';