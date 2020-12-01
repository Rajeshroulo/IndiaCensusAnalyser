<?php
ini_set("log_errors",True);
$log_file="error.log";
ini_set("error_log",$log_file);

require_once('CensusAnalyser.php');
require_once('CensusAnalyserException.php');

class CensusAnalyserTest extends PHPUnit\Framework\TestCase
{
   static $csvPath = "StateCensusData.csv";
   static $statePath = "StateCode.csv";
   protected $analyser;
   protected $exceptioner;

   protected function setUp(): void{
      $this->analyser= new CensusAnalyser();
      $this->exceptioner= new CensusAnalyserException();
   }

   public function testTotalCsvRecords()
   {
      try {
         $this->assertEquals(29, $this->analyser->loadStateCensusData(self::$csvPath));
      } catch (CensusAnalyserException $e) {
         echo $e->getMessage();
      }
   }

   public function testStateCensusCsvFile(){
      try{
         $path="StateCensus.csv";
         if(!file_exists($path)){
            $this->analyser->loadStateCensusData($path);
            $this->assertFalse(file_exists($path));
         } 
      }catch(CensusAnalyserException $e){
         error_log($e->getMessage());
      }

   }

   public function testStateCensusTypeFile(){
      try{
         $path="StateCensus.txt";
         if(!file_exists($path)){
            $this->analyser->loadStateCensusData($path);
            $this->assertFalse(file_exists($path));
         } 
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }

   }

   public function testStateRecords()
   {
      try {
         $this->assertEquals(37, $this->analyser->loadCensusData(self::$statePath));
      } catch (CensusAnalyserException $e) {
         echo $e->getMessage();
      }
   }

   public function testStateCodeCsvFile(){
      try{
         $path="State.csv";
         if(!file_exists($path)){
            $this->analyser->loadCensusData($path);           
            $this->assertFalse(file_exists($path));
         }
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }

   }

   public function testStateCodeTypeFile(){
      try{
         $path="State.txt";
         if(!file_exists($path)){
            $this->analyser->loadCensusData($path);           
            $this->assertFalse(file_exists($path));
         }
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }

   }

   public function testWhentStateCensusDataSortedAccordingToStates(){
      try{
         $this->analyser->sortedCensusData();
         $this->assertEquals("Andhra Pradesh",$this->census['0']);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }
}
?>