<?php

namespace App\Avatar;

class AvatarSvgFactory{

    public const DEFAULT_SIZE = 4;
    public const DEFAULT_NB_COLORS = 2; 

    public function createRandomAvatar(int $size, int $nbColors){

        $avatar = new Avatar($size, getRandomColors($nbColors));
        $transformer = new AvatarSvgTransformer();
        return$transformer->getSvg($avatar);
    }

}