<html>  
    <head>
    </head>
    <body>
        <h1> Welcome to the Colatz Counting program V2!</h1>
        <h5>Please, enter the value between 10 and 10^6</h5>
        <form aciton="index.php" method="POST">
            <input type="number" name="numberBox" min="10" max="10000000">
            <button name="subBut">Submit</button>
            <p></p>
            <p>Choose minimum of range (not less than 10)</p>
            <input name="minValue" type="number" min="25" max="24658">
            <p>Choose maximim of range (not more than 10^6)</p>
            <input name="maxValue" type="number" min="25" max="24658">
            <button name="rangeBut">Submit range</button>
        </form>
    </body>
</html>
<?php require "mathlib.php";
    $OperationsClass = new Operations(14);
    $StatisticClass = new ClassForStat(12);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["numberBox"]) && is_numeric($_POST["numberBox"]) && intval($_POST["numberBox"]) > 10 && intval($_POST["numberBox"]) < 10**6) {
            $OperationsClass->clearAll();
            $num = intval($_POST["numberBox"]);
            echo "The value = $num" . "\n";
            $OperationsClass->num = $num;
            $OperationsClass->calculateColatz();
            $OperationsClass->printArray();
            $resultArray = $OperationsClass->MaxValueIndex();
            echo "<h4>Number of iterations is {$OperationsClass->returnIt()}</h4><h4>\nMax value is {$resultArray[0]} at index {$resultArray[1]}</h4>";
        } elseif(isset($_POST["rangeBut"])){
            $StatisticClass->countForRange(intval($_POST["minValue"]), intval($_POST["maxValue"]));
            $StatisticClass->statistics();
            
        } else {
            echo "<h3>Please enter a valid number.</h3>";
        }
        
    }
?>