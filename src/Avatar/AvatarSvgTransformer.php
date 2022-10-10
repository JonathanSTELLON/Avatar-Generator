<?php

namespace App\Avatar;

class AvatarSvgTransformer {

    public function getSvg(Avatar $avatar) {

        // Je récupère la taille et la grille de mon objet $avatar
        $grid = $avatar->getGrid();
        $size = $avatar->getSize();
        $colors = $avatar->getColors();

        // On démarre la tamporisation de sortie
        ob_start();

        // On inclut le fichier de template contenant le code SVG
        include 'avatar.svg.php';

        // On retourne le contenu du tampon de sortie
        $svg = ob_get_clean();
        return $svg;

        // $svg = '<svg class="avatar" viewBox="0 0 '. $size .' ' . $size . '">';
        // $attr = '';

        // foreach($grid as $index1 => $values){

        //     foreach($values as $index2 => $value){

        //         $attr .= '<rect x="'. $index2 .'" y="'. $index1 .'" width="1" height="1" fill="'. $value .'"/>';
        //     }
        // }

        // $svg .= $attr;

        // $svg .= '</svg>';

        // return $svg;
    }
}