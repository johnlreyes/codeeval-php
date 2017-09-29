<?php
    $lines = file($argv[1]);
    echo execute($lines);
    
    function execute($inputList) {
        $resultStringArr = array();
        foreach ($inputList as $index => $input) {
            array_push($resultStringArr, process($input));
        }
        return implode("\n", $resultStringArr);
    }
    
    function process($line) {
        $input = toInput($line);
        $results = toResultList($input);
        return implode(" ", $results);
    }
        
    function toResultList($input) {
        $results = array();
        for ($i = 1; $i <= $input->max; $i++) {
            array_push($results, fizzBuzz($i, $input->fizz, $input->buzz));
        }
        return $results;
    }
    
    function fizzBuzz($number, $fizz, $buzz) {
        $result = new Result();
        $result->fizz = $number % $fizz == 0;
        $result->buzz = $number % $buzz == 0;
        $result->number = $number;
        return $result;
    }
    
    function toInput($str) {
        $arr = preg_split("/\s+/", $str, -1, PREG_SPLIT_NO_EMPTY);
        $returnValue = new Input();
        $returnValue->fizz = $arr[0];
        $returnValue->buzz = $arr[1];
        $returnValue->max = $arr[2];
        return $returnValue;
    }
    
    class Input {
        public $fizz;
        public $buzz;
        public $max;
    }
    
    class Result {
        public $fizz = false;
        public $buzz = false;
        public $number = -1;
        
        public function __toString() {
            return ($this->fizz ? "F" : "") . ($this->buzz ? "B" : "") . (!$this->fizz && !$this->buzz ? $this->number : "");
        }
    }
?>
