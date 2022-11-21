<?php

declare(strict_types=1);


function RunGame()
{
    global $gameRolls, $playerRolls, $opponentRolls, $rollValue;

    $rollerIsPlayer = true;

    while ($rollValue != 1) {
        $rollValue = rand(1, $rollValue);

        if ($rollerIsPlayer) {
            array_push($playerRolls, $rollValue);
            $rollerIsPlayer = false;
        } else {
            array_push($opponentRolls, $rollValue);
            $rollerIsPlayer = true;
        }
        array_push($gameRolls, $rollValue);
    }
}

function isNumber($value)
{
    if (!filter_var($value, FILTER_VALIDATE_INT)) {
        return false;
    }

    if ($value === null) {
        return false;
    }

    return true;
}

function cubeCreate(int $height, int $width, string $character)
{
    $result = array();

    for ($y = 0; $y < $height; $y++) {
        $tempValueHolder = "";
        for ($x = 0; $x < $width; $x++) {
            $tempValueHolder = $tempValueHolder . $character;
        }
        array_push($result, $tempValueHolder);
    }

    return $result;
}
