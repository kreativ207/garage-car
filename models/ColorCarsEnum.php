<?php

namespace app\models;

abstract class ColorCarsEnum
{
    const WHITE = 1;
    const YELLOW = 2;
    const PINK = 3;
    const BLUE = 4;
    const RED = 5;
    const BLACK = 6;
    const GREEN = 7;
    const PURPLE = 8;
    const BROWN = 9;

    public static $values = [
        self::WHITE     => 1,
        self::YELLOW        => 2,
        self::PINK         => 3,
        self::BLUE     => 4,
        self::RED          => 5,
        self::BLACK       => 6,
        self::GREEN          => 7,
        self::PURPLE        => 8,
        self::BROWN           => 9,
    ];
    public static $labels = [
        self::WHITE     => 'white',
        self::YELLOW        => 'yellow',
        self::PINK         => 'pink',
        self::BLUE     => 'blue',
        self::RED          => 'red',
        self::BLACK       => 'black',
        self::GREEN          => 'green',
        self::PURPLE        => 'purple',
        self::BROWN           => 'brown',
    ];

    public static function getLabelName($status)
    {
        return self::$labels[$status];
    }

    public static function getArrValues()
    {
        return self::$values;
    }

    public static function getAllArr()
    {
        return self::$labels;
    }
}