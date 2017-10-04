<?php 
namespace codeeval_php\codes\test\challenges\easy\_107_shortest_repetition;

require 'codes/src/challenges/easy/_107_shortest_repetition/Code.php';

use codes\src\challenges\easy\_107_shortest_repetition\Code;

class CodeTest extends \PHPUnit_Framework_TestCase {
    
    const FOLDER_PATH = 'codes/test/challenges/easy/_107_shortest_repetition/';
    
    function test() {
        $this->assertEquals($this->getExpected(), $this->getActual());
    }
    
    private function getExpected() {
        $returnValue = array();
        foreach (file(self::FOLDER_PATH . "output") as $line) {
            array_push($returnValue, trim($line));
        }
        return $returnValue;
    }
    
    private function getActual() {
        $lines = file(self::FOLDER_PATH . "input");
        $code = new Code();
        return explode("\n", $code->execute($lines));
    }
}
?>