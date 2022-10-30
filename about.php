<?php

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
                        <label for="cubeAmount">Amount of cubes:</label>
                        <input type="text" name="cubeAmount" required>
                        <br>
                        <label for="cubeRotateAmount">Amount of space: </label>
                        <input type="text" name="cubeRotateAmount" required>
                        <button type="submit">Enter</button>
                    </form>

                    <div class="bored-game-container">

                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>