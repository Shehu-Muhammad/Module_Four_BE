<?php
function restartGame() {
    unset($_SESSION["userArray"]);
    session_destroy();
    header("Refresh: 0;");
}

function isItAHoliday($holidays, $year, $todaysDate) {
    // loops through holidays array, if today's date matches any dates in array, it breaks out of loop with a variable set to true
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

function getTodaysDate() {
    $todaysDate = date("l\, F d\, Y");
    echo $todaysDate;
}

function getNumberOfDayUntilNextHoliday($todaysDateTwo, $holidays, $year) {
    // date_default_timezone_set('America/New_York');
    // $todaysDateTwo = date("m-d");
    // $holidays = array("New Year's" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
    // $year = date("Y");
    foreach($holidays as $holiday => $holidayDate) {
        if($holidayDate > $todaysDateTwo) {
            $date1 = date_create($year."-".$holidayDate);
            break;
        }
    }
    $date2 = date_create($year."-".$todaysDateTwo);
    $diff = date_diff($date1, $date2);
    $result = $diff-> format("%a");
    // echo $diff->format("%a");
    if($result == "1") {
        echo ($result." day");
    } else {
        echo ($result." days");
    }
}

function getNextHoliday($todaysDateTwo, $holidays) {
    foreach($holidays as $holiday => $holidayDate) {
        if($holidayDate > $todaysDateTwo) {
            echo $holiday;
            break;
        }
    }
}
?>