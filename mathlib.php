<?php 
class Operations
{
    public  $arrayOfNums = array();
    public $arrayOfIt = array();
    public $arrayOfMaxV = array();
    public $num = 0;
    public function __construct($number)
    {
        $this->num = $number;
    }
    public function printArray()
    {
        $this->arrayOfNums;
        if(count($this->arrayOfNums) > 1)
        {
            echo "<h5>\n</h5>";
            for( $i = 0; $i < count($this->arrayOfNums); $i++)
            {
                echo $this->arrayOfNums[$i] . " ";
            }
        } else{
            $this->arrayOfNums[] = 1;
            echo " 1";
        }
        
    }
    public function clearAll()
    {
        $this->arrayOfNums = array();
        $this->arrayOfIt = array();
        $this->arrayOfMaxV = array();
    }
    public function calculateColatz()
    {
        $counter = 0;
        while ($this->num != 1)
        {
            if($this->num % 2 == 0)
            {
                $this->num = $this->num / 2; 
            } else {
                $this->num =  (3 * $this->num + 1) / 2;
            }
            $this->arrayOfNums[$counter] = $this->num; 
            $counter++;
        }
        $this->arrayOfIt[] = $counter;
        $this->arrayOfMaxV[] = max($this->arrayOfNums);
    }
    public function MaxValueIndex()
    {
        $maxN = max($this->arrayOfNums);
        $index = array_search($maxN, $this->arrayOfNums)+1;
        return array($maxN, $index);
    }
    public function statistics()
    {
        echo "<h4>The max iteration number is " . max($this->arrayOfIt) . "</h4><h4>\nThe min iteration number is ". min($this->arrayOfIt) . "</h4><h4>\nThe maxed reached value is " . max($this->arrayOfMaxV) . "</h4>";
    }
    public function returnIt()
    {
        return $this->arrayOfIt[0];
    }
    
}
class ClassForStat extends Operations 
{
    const const1 = "This is statistic function";
    const const2 = "Let`s start";
    public function countForRange($minNum, $maxNum){
        $this->arrayOfIt = array();
        $this->arrayOfMaxV = array();
        echo self::const1;
        echo self::const2;
        for( $j = $minNum; $j <= $maxNum; $j++){
            $arrayOfNums = array();
            echo "Vale = " . $j;
            $this->num = $j;
            parent::calculateColatz();
            parent::printArray();  
            $resultArr = parent::MaxValueIndex();
            echo "<h4>Max Value = {$resultArr[0]} on index {$resultArr[1]}</h4><br>";
            echo parent::statistic();
        }
       
    }
}
?>