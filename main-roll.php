<?php

// $rollValue = 1000000;
// $previousValues = [1, 5];

// if (isset($_GET['rollCall'])) {
//     rollCall($rollValue, $previousValues);
// }

// function rollCall(&$rollValue, &$previousValues)
// {
//     $rollValue = rand(1, $rollValue);
//     $previousValues += $rollValue;
//     echo $rollValue;
// }


$arrayOfRolls = array();

if (isset($_GET['rollGame-btn'])) {
    rollGame();
}

function rollGame()
{
    global $arrayOfRolls;
    $numberOfRolls = 0;
    $Value = 1000000;

    while ($Value != 1) {
        $Value = rand(1, $Value);

        $arrayOfRolls[$numberOfRolls] = $Value;

        $numberOfRolls++;
    }
}


?>

<main class="roll-main">
    <section class="game-container">

        <!-- player display side -->
        <div class="player-roll-display">
            <p class="player-name">
                Player
            </p>

            <p>
                last roll
            </p>
            <ul>
                <li class="player-last-roll">

                </li>
            </ul>
        </div>

        <!-- main center roll side -->
        <div class="main-roll-display">
            <div class="main-roll-display-top">
                <ul>
                    <?php foreach ($arrayOfRolls as $rolls) : ?>
                        <li>
                            <?= $rolls ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>

            <form method="GET">
                <button name="rollGame-btn">Run Game</button>
            </form>
            <p>
                <?php
                if (is_float(count($arrayOfRolls) / 2)) {
                    echo "Opponent wins...";
                } else {
                    echo "Player WINNS!";
                }

                ?>
            </p>
        </div>


        <!-- opponent display side -->
        <div class="player-roll-display">
            <p class="player-name">
                opponent
            </p>
            <p>
                last roll
            </p>
            <ul>
                <li class="player-last-roll">

                </li>
            </ul>
        </div>

    </section>
</main>