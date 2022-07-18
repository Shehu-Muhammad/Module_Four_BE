<?php

//if function is called, it will unset session variables 
//destroy the session
//refresh the page
function restartGame() {
    unset($_SESSION["userArray"]);
    unset($_SESSION["holidayArray"]);
    session_destroy();
    header("Refresh: 0;");
}

//if the function is called, it will loop through holiday array
//subtract todays date from holiday dates 
//if the number is 0, a boolean variable will be set to true and the loop will be broken out of
//it says that it will echo out which holiday it is
//if the number is not 0, it will say today is not a holiday
function isItAHoliday($holidays, $year, $todaysDate) {
    foreach($holidays as $holiday => $holidayDate) {
        $date = date_create($year."-".$holidayDate);
        $date2 = date_create($todaysDate);
        $diff = date_diff($date, $date2);
        if($diff->format("%a") == "0") {
            $holidayTrue = true;
            break;
        } else {
            $holidayTrue = false;
        }
    }

    if($holidayTrue == true) {
        echo $holiday;
    } else {
        echo("Today is NOT a holiday!");
    }
}

//if this function is called, today's date will be printed out
function getTodaysDate() {
    $todaysDate = date("l\, F d\, Y");
    echo $todaysDate;
}

//if this function is called, the number of days until next holiday is printed out
function getNumberOfDayUntilNextHoliday($todaysDateTwo, $holidays, $year) {
    foreach($holidays as $holiday => $holidayDate) {
        if($holidayDate > $todaysDateTwo) {
            $date1 = date_create($year."-".$holidayDate);
            break;
        }
    }
    $date2 = date_create($year."-".$todaysDateTwo);
    $diff = date_diff($date1, $date2);
    $result = $diff-> format("%a");
    if($result == "1") {
        echo ($result." day");
    } else {
        echo ($result." days");
    }
}

//if this function is called, the next holiday is printed out
function getNextHoliday($todaysDateTwo, $holidays) {
    foreach($holidays as $holiday => $holidayDate) {
        if($holidayDate > $todaysDateTwo) {
            echo $holiday;
            break;
        }
    }
}
?>