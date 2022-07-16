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
                $holidays = array("New Year's" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                $year = date("Y");
                $todaysDate = date($year."-m-d");
                
                // loops through holidays array, if today's date matches any dates in array, it breaks out of loop with a variable set to true
                foreach($holidays as $holiday => $holidayDate) {
                    if($todaysDate == $holidayDate) {
                        $holiday = true;
                        break;
                    } else {
                        $holiday = false;
                    }
                }
                
                if($holiday == true) {
                    echo("Today is a holiday!");
                } else {
                    echo("Today is NOT a holiday!");
                }
            ?>
            </h1>
            <p id="todaysDate">
            <?php
                date_default_timezone_set('America/New_York');
                $todaysDate = date("l\, F d\, Y");
                echo $todaysDate;
            ?>
            </p>
            <p>Next Holiday is in 
            <span>    
            <?php
                date_default_timezone_set('America/New_York');
                $todaysDate = date("m-d");
                $holidays = array("New Year's" => "01-01", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                $year = date("Y");
                foreach($holidays as $holiday => $holidayDate) {
                    if($holidayDate > $todaysDate) {
                        $date1 = date_create($year."-".$holidayDate);
                        break;
                    }
                }
                $date2 = date_create($year."-".$todaysDate);
                $diff = date_diff($date1, $date2);
                echo $diff->format("%a");
            ?>
            <span> days</p>
            <p>The Next Holiday is: </p>
            <p hidden="hidden" id="currentHoliday">
            <?php
                date_default_timezone_set('America/New_York');
                $todaysDate = date("m-d");
                $holidays = array("New Year's" => "07-16", "Valentine's Day" => "02-14", "Saint Patrick's Day" => "03-17", "Juneteenth" => "06-19", "Independence Day" => "07-04", "Halloween" => "10-31", "Christmas Eve" => "12-24", "Christmas" => "12-25", "New Year's Eve" => "12-31");
                foreach($holidays as $holiday => $holidayDate) {
                    if($holidayDate > $todaysDate) {
                        echo $holiday;
                        break;
                    }
                }
            ?>
            </p>
            <button id="showHide" onclick="showHoliday()">Show Next Holiday</button>
            <p>Guess the Next Holiday:</p>
            
        </section>
        <script src="index.js"></script>
    </body>
</html>