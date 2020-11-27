<?php

require_once('CensusAnalyser.php');

class CensusAnalyserTest extends PHPUnit\Framework\TestCase
{
   static $csvPath = "StateCensusData.csv";
   static $statePath = "StateCode.csv";

   public function testTotalCsvRecords()
   {
      try {
         $analyser = new CensusAnalyser();
         $this->assertEquals(29, $analyser->loadStateCensusData(self::$csvPath));
      } catch (Exception $e) {
         echo "Csv Records not found";
      }
   }

   public function testStateRecords()
   {
      try {
         $analyser = new CensusAnalyser();
         $this->assertEquals(37, $analyser->loadCensusData(self::$statePath));
      } catch (Exception $e) {
         echo "State Records not found";
      }
   }
}
