<?php
require __DIR__ . '/functions.php';
$error = "";

$cubeAmount;
$cubeChar;
$cubeHeight;
$cubeWidth;

$cubeArrays;

if (isset($_POST['cubeAmount'], $_POST['cubeHeight'], $_POST['cubeWidth'], $_POST['cubeChar'])) {

    if (!isNumber($_POST['cubeAmount']) && !isNumber($_POST['cubeHeight'] && !isNumber($_POST['cubeWidth']))) {
        $error = "invalid input";
    }

    $cubeAmount = $_POST['cubeAmount'];
    $cubeHeight = $_POST['cubeHeight'];
    $cubeWidth = $_POST['cubeWidth'];
    $cubeChar = $_POST['cubeChar'];

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
            <div class="bored-game">
                <h2>If you are bored of the game, try this little function</h2>
                <div>
                    <form action="" method="POST">
                        <p><?= $error ?></p>

                        <label for="cubeAmount">Amount of cubes:</label>
                        <input class="bored-game-input" type="number" name="cubeAmount" required>
                        <br>

                        <label for="cubeRotateAmount">Character for cubes: </label>
                        <input class="bored-game-input" type="text" name="cubeChar" required>
                        <br>

                        <label for="cubeWidth">Cube width: </label>
                        <input class="bored-game-input" type="number" name="cubeWidth" require>
                        <br>

                        <label for="cubeHeight">Cube height: </label>
                        <input class="bored-game-input" type="number" name="cubeHeight" require>
                        <br>

                        <button type="submit">Enter</button>
                    </form>

                    <div class="bored-game-container">
                        <div class="cube-game">
                            <?php global $cubeAmount;
                            for ($i = 0; $i < $cubeAmount; $i++) : ?>
                                <div>
                                    <?php foreach ($cubeArrays as $cubeArray) : ?>
                                        <div>
                                            <?= $cubeArray ?>
                                        </div>
                                    <?php endforeach ?>
                                    <br>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>