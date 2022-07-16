<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Times Table
        // Create a form with 2 inputs
        // Input 1 takes the constant number
        // Input 2 takes the max number that input one will be multiplied by
        // Create submit button 
        // Result should be displayed in a 2 column by x rows table
        // echo("
        //     <form action='post'>
        //         <label> Enter Constant Number
        //         <input type='number'> 
        //         </label> 
        //         <label> Enter Max Number to be Multiplied By: 
        //         <input type='number'>
        //         </label>
        //         <input type='submit' value='Generate Times Table'>
        //     </form>
        //     ")
        // Get Input 1 and Input 2 
        // Create a table with Input 2 Rows and 2 columns
        // echo ("
        //     <table>
        //         <tr>
        //             <th>Constant <span>1</span></th>
        //             <th>X</th>
        //             <th>Rows <span>2</span</th>
        //         </tr>
        //         <tr>
        //             <td>1</td>
        //             <td>x</td>
        //             <td>1</td>
        //         </tr>
        //         <tr>
        //             <td>1</td>
        //             <td>x</td>
        //             <td>2</td>
        //         </tr>
        //     </table>
        // ")
        // for(let rows = 1; rows <= 100; rows++) { console.log(`${inputOne} x ${rows} = ${inputOne*rows}`) }
        // $inputOne = 1; 
        // define('inputOne', $inputOne);
        // $inputTwo = 12;
        // for($row = 1; $row <= $inputTwo; $row++) {
        //     echo(inputOne." x ".$row." = ".inputOne*$row."<br>");
        // }
        function createTimesTable($inputOne, $inputTwo) {
            // define('inputOne', $inputTwo);
            for($row = 1; $row <= $inputOne; $row++) {
                echo($inputOne." x ".$row." = ".$inputOne*$row."<br>");
            }
            echo("You created a times table!!!<br>");
        }
        // createTimesTable(12, 12);
        // createTimesTable(11, 12);
        // createTimesTable(10, 12);
        
        for($row=1; $row <= 3; $row++) {
            createTimesTable($row, 3);
        }

        // $inputOne = 2;
        // $inputTwo = 2;
        // echo("
        //     <table>
        //         <tr>
        //             <th>Constant <span>1</span></th>
        //             <th>X</th>
        //             <th>Rows <span>2</span</th>
        //             <th>=</th>
        //             <th>Result</th>
        //         </tr>
        //         ");
        // for($rows = 1; $rows <= 12; $rows++) {
        //     echo("
        //     <tr>
        //         <td>".$inputOne."</td>
        //         <td>x</td>
        //         <td>".$rows."</td>
        //         <td>=</td>
        //         <td>".$inputOne*$rows."</td>
        //     </tr>
        //     ");
        // }
        // echo("</table>");

        function createMatrixTable($inputOne, $inputTwo) {
            echo("
            <table>
                <tr>
                    <th>".$inputOne." Columns</th>
                    <th>By</th>
                    <th>".$inputTwo." Rows</th>
                    <th>=</th>
                    <th>Result</th>
                </tr>
                ");
            for($rows = 1; $rows <= $inputTwo; $rows++) {
                echo("
                <tr>
                    <td>".$inputOne."</td>
                    <td>x</td>
                    <td>".$rows."</td>
                    <td>=</td>
                    <td>".$inputOne*$rows."</td>
                </tr>
                ");
            }
            echo("</table>");
        }
        // createMatrixTable(12, 12);

        function createAllTimesTables($inputOne, $inputTwo) {
            for($rows = 1; $rows <= $inputOne; $rows++) {
                // for($column = 1; $column <= $inputTwo; $column++)
                // {
                    createMatrixTable($rows, $rows);
                // }
            }
        }
        // createAllTimesTables(1, 3);


    ?>
</body>
</html>
