<?php
    namespace codes\src\challenges\easy\_136_racing_chars;

    if (isset($argv)) {
        $lines = file($argv[1]);
        $code = new Code();
        echo $code->execute($lines);
    }

    class Code {
    
        function execute($trackList) {
            $returnValue = array();
            foreach ($trackList as $track) {
                $track = trim($track);
                $currentDriveIndex = $this->getDriveIndex($track);
                $drive = '|';
                if (isset($previousDriveIndex)) {
                    if ($currentDriveIndex < $previousDriveIndex) {
                        $drive = '/';
                    } else if ($currentDriveIndex > $previousDriveIndex) {
                        $drive = '\\';
                    }
                }
                $updatedTrack = substr_replace($track, $drive, $currentDriveIndex, 1);
                $previousDriveIndex = $currentDriveIndex;
                array_push($returnValue, $updatedTrack);
            }
            return implode("\n", $returnValue);
        }
        
        function getDriveIndex($track) {
            $gateIndex = strrpos($track, "_");
            $checkpointIndex = strrpos($track, "C");
            return $checkpointIndex ? $checkpointIndex : $gateIndex;
        }
    }
?>