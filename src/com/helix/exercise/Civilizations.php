<?php


namespace com\helix\exercise;


class Civilizations
{
    const CHINESE = 1;
    const ENGLISHMEN = 2;
    const BYZANTINE = 3;

    public static function getAllCivilizations(): array
    {
        return array(self::CHINESE, self::ENGLISHMEN, self::BYZANTINE);
    }
}