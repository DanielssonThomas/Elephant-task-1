<?php


$rollValue = 1000000;

if (isset($_GET['rollCall'])) {
    rollCall();
}

function rollCall()
{
    $rollValue = 1000000;
    $rollResult = rand(1, $rollValue);
    echo $rollResult;
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
            <p class="main-roll-text">
                <?php rollCall() ?>
            <form action="index.php" method="GET">
                <p class="main-roll-text" type="text" name="rollCall"></p>
                <button>ROLL</button>
            </form>
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