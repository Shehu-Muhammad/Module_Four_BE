<?php
session_start();
include "functions.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Holiday Hangman</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <section>
            <h1>
            <?php
                date_default_timezone_set('America/New_York');
                $holidays = array("New Year's" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                $year = date("Y");
                $todaysDate = date($year."-m-d");
                isItAHoliday($holidays, $year, $todaysDate);
            ?>
            </h1>
            <p id="todaysDate">
            <?php
                getTodaysDate();
            ?>
            </p>
            <p>Next Holiday is in 
            <span>    
            <?php
                $todaysDateTwo = date("m-d");
                getNumberOfDayUntilNextHoliday($todaysDateTwo, $holidays, $year);
            ?>
            <p>The Next Holiday is: </p>
            <p hidden="hidden" id="currentHoliday">
            <?php
                getNextHoliday($todaysDateTwo, $holidays);
            ?>
            </p>
            <button id="showHide" onclick="showHoliday()">Show Next Holiday</button>
            <p>Guess the Next Holiday one letter at a time:</p>
            <?php
                //creates an array of letters based on next holiday
                //sets the array to the session variable if it is not empty
                if(empty($_SESSION["holidayArray"]) == true) {
                    foreach($holidays as $holiday => $holidayDate) {
                        if($holidayDate > $todaysDateTwo) {
                            $holidayArrayOne = str_split(strtolower($holiday));
                            break;
                        }
                    }
                } else {
                    $holidayArrayOne = $_SESSION["holidayArray"];
                }
                
                //create an array of underscores equal to the array of holiday letters
                //ses the array equal to a session variable if it is not empty
                if(empty($_SESSION["userArray"]) == true){
                    $holidayArrayTwo = array();
                    for($index = 0; $index < count($holidayArrayOne); $index++) {
                        $holidayArrayTwo[$index] = "_";
                    }
                } else {
                    $holidayArrayTwo = $_SESSION["userArray"];
                }

            ?>
            <form method="POST">
                <input type="text" maxlength="1" placeholder="Enter a letter" name="letterGuessed"></input>
                <input type="submit" name="letter" value="Check Letter">
                <input type="submit" name="punctuation" value="Add Extra Stuff">
                <input type="submit" name="restart" value="Clear">
            </form>
            <?php
                //checks if the punctuation submit button is pressed
                //if the button is pressed, loops through the first array for spaces and apostrophes
                //if any are found, they are added to the second array
                if(isset($_POST["punctuation"]) == true) {
                    for($index = 0; $index < count($holidayArrayOne); $index++) {
                        if($holidayArrayOne[$index] == " ") {
                            $holidayArrayTwo[$index] = "&nbsp;";
                        }
                        if($holidayArrayOne[$index] == "'") {
                            $holidayArrayTwo[$index] = "'";
                        }
                    }
                }
                
                //checks if the letter submit button is pressed
                //if the button is pressed, loop through the first array for the letter
                //if the letter is found, the second array is updated with the letter
                if(isset($_POST["letter"]) == true) {
                    $userInput = $_POST['letterGuessed'];
                    for($index = 0; $index < count($holidayArrayOne); $index++) {
                        if($userInput == $holidayArrayOne[$index]) {
                            $holidayArrayTwo[$index] = $userInput; 
                        }
                    }
                }
                
                //updates the session variable containing user correctly guessed letters
                $_SESSION["userArray"] = $holidayArrayTwo;
                
                //loops through second array that contains underscores and/or user correctly guessed letters
                //prints it out
                for($index = 0; $index < count($holidayArrayTwo); $index++) {
                    print_r($holidayArrayTwo[$index]);
                    echo(" ");
                }
                
                //if clear button is pressed
                //restartGame function is called 
                if(isset($_POST["restart"]) == true) {
                    restartGame();
                }
                
                //once user guesses all correct letters, the game is ended 
                //a message is printed out to the screen with the holiday name
                if(array_diff($holidayArrayOne, $holidayArrayTwo) == []) {
                    echo("<br>You guessed the holiday correctly!");
                }
            ?>
            
            <p>Guess the Next Holiday in one word:</p>
            <form method="POST">
                <input type="text" placeholder="Enter a holiday" name="wordGuessed"></input>
                <input type="submit" name="word" value="Check Holiday">
                <input type="submit" name="reset" value="Clear">
            </form>
            
            <?php
                //loops through array to determine next holiday
                //sets it a variable as all lowercase letters
                foreach($holidays as $holiday => $holidayDate) {
                    if($holidayDate > $todaysDateTwo) {
                        $holiday = strtolower($holiday);
                        break;
                    }
                }
                
                //checks if submit button for solving holiday hangman in one word
                //sets user input as a variable all lowercased
                //if button was pressed, compares user input with the holiday variable 
                //if they match, a string saying the holiday name is the correct answer is echoed
                //if they do not match, a string say the holiday name is not the next holiday is echoed
                //if button is not pressed, an array of underscores equal to next holiday is echoed
                if(isset($_POST["word"]) == true) {
                    $userInput = strtolower($_POST["wordGuessed"]);
                    if(strcmp($userInput, "") != 0) {
                        if(strcmp($userInput, $holiday) == 0) {
                            echo ucfirst($userInput)." is the correct answer!";
                        } else {
                            echo ucfirst($userInput)." is NOT the next holiday!";
                        }
                    }
                } else {
                    for($index = 0; $index < count($holidayArrayTwo); $index++) {
                        print_r($holidayArrayTwo[$index]);
                        echo(" ");
                    }
                }
                
                //if clear button is pressed
                //restart game function is called
                //the last output is set to an empty string
                if(isset($_POST["reset"]) == true) {
                    restartGame();
                    echo("");
                }

            ?>
            <p>Hint: Some holidays end with the word "day" and some end with the word "eve".</p>
        </section>
        <script src="index.js"></script>
    </body>
</html>