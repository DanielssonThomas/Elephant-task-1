<?php

declare(strict_types=1);

require __DIR__ . '/functions.php';

$error = "";

$rollValue = 1000000;
if (isset($_POST['newValue'])) {
    if (!isNumber($_POST['newValue'])) {
        $error = "Thats an invalid number, try again";
    }
    $rollValue = (int)$_POST['newValue'];
}

// arrays för att spara vad som kommer ut ur rollsen
$gameRolls = array();
$playerRolls = array();
$opponentRolls = array();

// kör roll funktionen när knappen blir klickad
if (isset($_POST['rollGame-btn'])) {
    runGame();
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
                <?php foreach ($gameRolls as $rolls) : ?>
                    <div>
                        <p><?= $rolls ?></p>
                    </div>
                <?php endforeach ?>

            </div>

            <form method="POST">
                <p class="error-p"><?= $error ?></p>
                <label for="newValue">Enter new roll value, and roll from it: </label>
                <input type="text" name="newValue">
                <button type="submit" name="rollGame-btn">
                    Custom roll
                </button>
            </form>
            <form method="POST">
                <button name="rollGame-btn">Roll</button>
            </form>
            <p>
                <?php
                if (is_float(count($gameRolls) / 2)) {
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