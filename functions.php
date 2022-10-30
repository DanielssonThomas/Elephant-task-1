<?php 

function rollGame()
{
    global $arrayOfRolls, $playerRolls, $opponentRolls, $rollValue;

    $isRollerPlayer = true;

    while ($rollValue != 1) {
        $rollValue = rand(1, $rollValue);

        if ($isRollerPlayer) {
            array_push($playerRolls, $rollValue);
            $isRollerPlayer = false;
        } else {
            array_push($opponentRolls, $rollValue);
            $isRollerPlayer = true;
        }
        array_push($arrayOfRolls, $rollValue);
    }
}
