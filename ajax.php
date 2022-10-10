<?php

require 'vendor/autoload.php';
require 'functions.php';

// Import des classes utilisées en dessous
use App\Avatar\Avatar;
use App\Avatar\AvatarSvgTransformer;
use App\Avatar\AvatarSvgFactory;

$size = $_POST["size"]??AvatarSvgFactory::DEFAULT_SIZE;
$color = $_POST["color"]??AvatarSvgFactory::DEFAULT_NB_COLORS;

$action = $_POST['action'] ?? 'generate';

switch($action) {

    case 'generate':
        $svg = (new AvatarSvgFactory)->createRandomAvatar($size,$color);
        echo $svg;
        exit;

    case 'save':
        $svg = $_POST['svg'];
        $file = saveSvg($svg);
        break;
    
    case 'download':
        $svg = $_POST['svg'];
        $file = downloadSvg();
        echo $svg;
        exit; //pour ne pas inclure le reste du code html
}

