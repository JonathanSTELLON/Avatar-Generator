<?php

function getRandomColor(): string 
{
    $red = mt_rand(0,255);
    $green = mt_rand(0,255);
    $blue = mt_rand(0,255);

    return "rgb($red,$green,$blue)";
}

function getRandomColors(int $n): array 
{
    $colors = [];

    for ($i = 0; $i < $n; $i++) {
        $colors[] = getRandomColor();
    }

    return $colors;
}

function saveSvg($svg){

    if(!file_exists('avatars')){
            mkdir('avatars', 0777, true);
    }

    $fileName = uniqid('avatar', false);
    $file = fopen("avatars/" . $fileName . ".svg", "c");
    fwrite($file, $svg);

}

function downloadSvg(){
    // $file = $svg;

    // On modifie les entêtes nécessaires
    header('Content-Description: File Transfer');
    header('Content-Type: img/svg+xml');
    header('Content-Disposition: attachment; filename="avatar.svg"');
    // readfile($file);
}