<?php

$arrayOfRolls = array();
$playerRolls = array();
$opponentRolls = array();

$currentPlayerRoll = 0;
$currentOpponentRoll = 0;

if (isset($_GET['rollGame-btn'])) {
    rollGame();
}

function rollGame()
{
    global $arrayOfRolls, $playerRolls, $opponentRolls, $currentPlayerRoll, $currentOpponentRoll;

    $Value = 1000000;

    $isRollerPlayer = true;

    while ($Value != 1) {
        $Value = rand(1, $Value);

        if ($isRollerPlayer) {
            array_push($playerRolls, $Value);
            $isRollerPlayer = false;
        } else {
            array_push($opponentRolls, $Value);
            $isRollerPlayer = true;
        }
        array_push($arrayOfRolls, $Value);
    }
}


?>
<div class="roll-amount-header">
    <h2>Rolling from 1000000</h2>
</div>
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
                <?php foreach ($playerRolls as $playerRoll) : ?>
                    <li class="player-last-roll">
                        <?= $playerRoll ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <!-- main center roll side -->
        <div class="main-roll-display">
            <div class="main-roll-display-top">
                <ol>
                    <?php foreach ($arrayOfRolls as $rolls) : ?>
                        <li>
                            <?= $rolls ?>
                        </li>
                    <?php endforeach ?>
                </ol>
            </div>

            <form method="GET">
                <button name="rollGame-btn">Run Game</button>
            </form>
            <button>
                <a href="rollSettings.php">Change roll?</a>
            </button>
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
                <?php foreach ($opponentRolls as $opponentRoll) : ?>
                    <li class="player-last-roll">
                        <?= $opponentRoll ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

    </section>
</main>