<?php
use PHPUnit\Framework\TestCase;
 class CensusAnalyserTest extends CensusAnalyser
 {
     function total_records()
     {
        $analyser= new CensusAnalyser();
        $records = $analyser->loadStateCensusData();
        $this->assertSame(29,$records);

     }

 }


?>