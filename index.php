<?php
session_start();
include "functions.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Holiday</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <section>
            <h1>
            <?php
                date_default_timezone_set('America/New_York');
                $holidays = array("New Year's Day" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                $year = date("Y");
                $todaysDate = date($year."-m-d");
                // // loops through holidays array, if today's date matches any dates in array, it breaks out of loop with a variable set to true
                // foreach($holidays as $holiday => $holidayDate) {
                //     $date = date_create($year."-".$holidayDate);
                //     $date2 = date_create($todaysDate);
                //     $diff = date_diff($date, $date2);
                //     if($diff->format("%a") == "0") {
                //         $holidayTrue = true;
                //         break;
                //     } else {
                //         $holidayTrue = false;
                //     }
                // }
                
                // if($holidayTrue == true) {
                //     echo $holiday;
                // } else {
                //     echo("Today is NOT a holiday!");
                // }
                isItAHoliday($holidays, $year, $todaysDate);
            ?>
            </h1>
            <p id="todaysDate">
            <?php
                // date_default_timezone_set('America/New_York');
                // $todaysDate = date("l\, F d\, Y");
                // echo $todaysDate;
                getTodaysDate();
            ?>
            </p>
            <p>Next Holiday is in 
            <span>    
            <?php
                // date_default_timezone_set('America/New_York');
                $todaysDateTwo = date("m-d");
                // $holidays = array("New Year's" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                // $year = date("Y");
                // foreach($holidays as $holiday => $holidayDate) {
                //     if($holidayDate > $todaysDateTwo) {
                //         $date1 = date_create($year."-".$holidayDate);
                //         break;
                //     }
                // }
                // $date2 = date_create($year."-".$todaysDateTwo);
                // $diff = date_diff($date1, $date2);
                // echo $diff->format("%a");
                getNumberOfDayUntilNextHoliday($todaysDateTwo, $holidays, $year);
            ?>
            <span> days</p>
            <p>The Next Holiday is: </p>
            <p hidden="hidden" id="currentHoliday">
            <?php
                // date_default_timezone_set('America/New_York');
                // $todaysDate = date("m-d");
                // $holidays = array("New Year's" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                // foreach($holidays as $holiday => $holidayDate) {
                //     if($holidayDate > $todaysDateTwo) {
                //         echo $holiday;
                //         break;
                //     }
                // }
                getNextHoliday($todaysDateTwo, $holidays);
            ?>
            </p>
            <button id="showHide" onclick="showHoliday()">Show Next Holiday</button>
            <p>Guess the Next Holiday:</p>
            <?php
                if(empty($_SESSION["userArray"]) == true){
                    $holidayArrayTwo = array("_", "_", "_", "_", "_", "_", "_", "_", "_");
                } else {
                    $holidayArrayTwo = $_SESSION["userArray"];
                }
                $holidayArrayOne = array("h", "a", "l", "l", "o", "w", "e", "e", "n");
                
            ?>
            <form method="POST">
                <input type="text" maxlength="1" placeholder="Enter a letter" name="letterGuessed"></input>
                <input type="submit" name="letter" value="Check Letter">
                <input type="submit" name="restart" value="Clear">
            </form>
            <?php
                if(isset($_POST['letter']) == true) {
                    $userInput = $_POST['letterGuessed'];
                    for($index = 0; $index < count($holidayArrayOne); $index++) {
                        if($userInput == $holidayArrayOne[$index]) {
                            $holidayArrayTwo[$index] = $userInput;
                        }
                    }
                }
                
                $_SESSION["userArray"] = $holidayArrayTwo;
                
                // function restartGame() {
                //     unset($_SESSION["userArray"]);
                //     session_destroy();
                //     header("Refresh: 0;");
                // }
                
                for($index = 0; $index < count($holidayArrayTwo); $index++) {
                    print_r($holidayArrayTwo[$index]);
                    echo(" ");
                }
                
                if(isset($_POST["restart"]) == true) {
                    restartGame();
                }
                
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
                $holiday = "halloween";
                if(isset($_POST["word"]) == true) {
                    $userInput = strtolower($_POST["wordGuessed"]);
                    if(strcmp($userInput, "") != 0) {
                        if(strcmp($userInput, $holiday) == 0) {
                            echo ucfirst($userInput)." is the correct answer!";
                        } else {
                            echo ucfirst($userInput)." is NOT the next holiday!";
                        }
                    }
                }
                if(isset($_POST["reset"]) == true) {
                    echo("");
                }
            ?>
            
        </section>
        <script src="index.js"></script>
    </body>
</html>