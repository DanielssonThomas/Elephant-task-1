![This is an image](https://media.tenor.com/KzfDyYrsLngAAAAC/dice-roll.gif)

# DeathRoll

Death roll is a luck based 'game' where there is a select number, a player rolls between 1 and the selected number. The result of the players roll turns into the opponents roll. This continues until either player rolls 1, the player that rolls 1. Looses.

Check the project out [here](https://thomasdanielsson.coffee/DeathRoll).

# Installation

-   Clone the project
-   Open the cloned project in VS code
    View the cloned project by opening the terminal within VS code and write this:
    ```
    'php -S localhost:3000'
    ```

# Code Review

Code review written by [Alfred Unenge](https://github.com/username).

1. `functions.php:28` - `FILTER_VALIDATE_INT` kan ta emot min och max-värden för att hindra oönskade beteenden vid stora värden i `$_POST['newValue']`.

2. `main-roll.php:14` - Verkar array_pusha strings till ints. Något kör custom roll-funktionen trots error-meddelande pga
   string och decimaltal.

3. `functions.php:26` - isNumber-funktionen skulle eventuellt kunna bytas mot inbyggda `is_numeric()` tillsammans med `floor()` eller `ceil()`-funktionerna för att avrunda decimaltal.

4. `about.php:27+30` - `$cubeChar`-variabeln utgör en sårbarhet och kan behöva ett filter/sanitizer.

5. `about.php:16+121+136` - Fundera på om du även vill ha ett max-värde eftersom höga värden lätt överbelastar sidan.

# Testers

Tested by the following people:

1. Douglas Lindahl
2. John Doe
