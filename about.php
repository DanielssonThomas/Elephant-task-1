<?php
require __DIR__ . '/functions.php';
$error = "";

$cubeAmount;
$cubeChar;
$cubeHeight;
$cubeWidth;
$isSpinning = false;

$cubeArrays;

if (isset($_POST['cubeAmount'], $_POST['cubeHeight'], $_POST['cubeWidth'], $_POST['cubeChar'], $_POST['isSpinning'])) {

    //Testing if either the amount, width or height is below 0. In that case there will be an error message displayed
    $error = $_POST['cubeAmount'] < 0 || $_POST['cubeWidth'] < 0 || $_POST['cubeHeight'] < 0 ? "The number must be positive!" : "";

    //Testing to se if the user has said 'yes' or 'no' to making the cubes spin
    $isSpinning = $_POST['isSpinning'] == 'true' ? true : false;

    //Entering all the values from the form to the variables
    $cubeAmount = $_POST['cubeAmount'];
    $cubeHeight = $_POST['cubeHeight'];
    $cubeWidth = $_POST['cubeWidth'];
    $cubeChar = $_POST['cubeChar'];

    //Creating the cube array from the functions folder, shaping ONE cube
    $cubeArrays = cubeCreate($cubeHeight, $cubeWidth, $cubeChar);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/typography.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/about.css">
    <title>About</title>
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main>
        <section>
            <!-- about 'DeathRoll' information (Just text) -->
            <h2>What is deathroll?</h2>
            <div>
                <p>
                    Deathroll is a game where you randomly roll between 1 and a chosen number.
                </p>
                <br>
                <p>
                    You roll between the players and the one that rolls the 1, loses the game.
                </p>
                <br>
                <p>
                    For example, if you roll between 1 and 1000000 and get 500000. It will make it so the opponent rolls between 1 and 500000 after that
                    you will have to roll the value of what your opponent gets. The cycle continues until you or hopefully your opponent rolls 1.
                </p>
            </div>

            <!-- Bored game section -->
            <div class="bored-game">
                <h2>If you are bored of the game, try this little function</h2>
                <div>
                    <!-- start of cube form -->
                    <form method="POST">
                        <!-- this is where the error will be displayed if the user tries something suspicious in the cube generator -->
                        <p><?= $error ?></p>

                        <!-- First the amount of cubes that will be generated is entered. All inputs have required as the function wont work without them-->
                        <label for="cubeAmount">Amount of cubes:</label>
                        <input class="bored-game-input" type="number" name="cubeAmount" required>
                        <br>

                        <!-- Second the character for the cube is entered -->
                        <label for="cubeChar">Character for cubes: </label>
                        <input class="bored-game-input" type="text" name="cubeChar" required>
                        <br>

                        <!-- Third the width of every cube (Its the amount of characters that will be used as width) -->
                        <label for="cubeWidth">Cube width: </label>
                        <input class="bored-game-input" type="number" name="cubeWidth" require>
                        <br>

                        <!-- Fourth the height (Same function as width) -->
                        <label for="cubeHeight">Cube height: </label>
                        <input class="bored-game-input" type="number" name="cubeHeight" require>
                        <br>

                        <!-- Five the option to spin or not to spin the cubes -->
                        <div class="cube-game-checkbox">
                            <label>Spinning</label>
                            <input type="radio" name="isSpinning" value="true">
                            <label for="isSpinning">yes</label>

                            <input type="radio" name="isSpinning" value="false">
                            <label for="isSpinning">no</label>
                        </div>

                        <!-- Button to enter and execute the game -->
                        <button type="submit">Enter</button>
                    </form>

                    <!-- The bored game part contains the same loop TWICE, there are 2 for-loops however which on that runs is decided by the spin option in the form -->
                    <div class="bored-game-container">
                        <div class="cube-game">
                            <!-- THIS is were the check for the spin option accurs. If the spin is set to true, the loop with the "animated-cube" styling applies, making the div's spin -->
                            <?php if ($isSpinning) : ?>
                                <?php global $cubeAmount;
                                for ($i = 0; $i < $cubeAmount; $i++) : ?>
                                    <div class="animated-cube">
                                        <?php foreach ($cubeArrays as $cubeArray) : ?>
                                            <div class="cube-char">
                                                <?= $cubeArray ?>
                                            </div>
                                        <?php endforeach ?>
                                        <br>
                                    </div>
                                <?php endfor ?>
                            <?php endif ?>

                            <!-- If the spin is set to false the following will run. Doing the same loop, however without the "animated-cube" style -->
                            <?php if (!$isSpinning) : ?>
                                <?php global $cubeAmount;
                                for ($i = 0; $i < $cubeAmount; $i++) : ?>
                                    <div>
                                        <?php foreach ($cubeArrays as $cubeArray) : ?>
                                            <div class="cube-char">
                                                <?= $cubeArray ?>
                                            </div>
                                        <?php endforeach ?>
                                        <br>
                                    </div>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>