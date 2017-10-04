<?php
    namespace codes\src\challenges\easy\_107_shortest_repetition;

    if (isset($argv)) {
        $lines = file($argv[1]);
        $code = new Code();
        echo $code->execute($lines);
    }

    class Code {
    
        function execute($inputList) {
            $resultStringArr = array();
            foreach ($inputList as $index => $input) {
                array_push($resultStringArr, $this->process(trim($input)));
            }
            return implode("\n", $resultStringArr);
        }
        
        function process($line) {
            $nextIndexOfFirstChar = strpos($line, $line[0], 1);
            return $nextIndexOfFirstChar === false ? strlen($line) : $nextIndexOfFirstChar;
        }
    }
?>