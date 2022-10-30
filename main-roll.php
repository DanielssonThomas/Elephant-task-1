<?php

$error = "";

$rollValue = 1000000;
if (isset($_POST['newValue'])) {
    if (!filter_var($_POST['newValue'], FILTER_VALIDATE_INT)) {
        $error = "Thats an invalid number, try again";
    }
    $rollValue = $_POST['newValue'];
}

// arrays för att spara vad som kommer ut ur rollsen
$arrayOfRolls = array();
$playerRolls = array();
$opponentRolls = array();

// kör roll funktionen när knappen blir klickad
if (isset($_GET['rollGame-btn'])) {
    rollGame();
}



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


?>
<div class="roll-amount-header">
    <h2>Default roll value = 1000000</h2>
</div>
<main class="roll-main">

    <section class="game-container">

        <!-- player display side -->
        <div class="player-roll-display">
            <p class="player-name">
                You
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
                <?php foreach ($arrayOfRolls as $rolls) : ?>
                    <div>
                        <p><?= $rolls ?></p>
                    </div>
                <?php endforeach ?>

            </div>

            <form method="POST">
                <p><?= $error ?></p>
                <label for="newValue">Enter new roll value, and roll from it: </label>
                <input type="text" name="newValue">
                <button type="submit">
                    Custom roll
                </button>
            </form>
            <form method="GET">
                <button name="rollGame-btn">Roll</button>
            </form>
            <p>
                <?php
                if (is_float(count($arrayOfRolls) / 2)) {
                    echo "Opponent wins...";
                } else {
                    echo "YOU WIN!";
                }
                ?>
            </p>
        </div>


        <!-- opponent display side -->
        <div class="player-roll-display">
            <p class="player-name">
                Opponent
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