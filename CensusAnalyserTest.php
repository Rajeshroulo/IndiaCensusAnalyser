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
   static $usPath = "USCensusData.csv";

   protected $analyser;
   protected $exceptioner;

   protected function setUp(): void{
      $this->analyser= new CensusAnalyser();
      $this->exceptioner= new CensusAnalyserException();
   }

   public function testTotalCsvRecords()
   {
      try {
         $this->assertEquals(29, $this->analyser->loadCensusData(self::$csvPath));
      } catch (CensusAnalyserException $e) {
         echo $e->getMessage();
      }
   }

   public function testStateCensusCsvFile(){
      try{
         $path="StateCensus.csv";
         if(!file_exists($path)){
            $this->analyser->loadCensusData($path);
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
            $this->analyser->loadCensusData($path);
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

   public function testWhentStateCensusDataSortedAccordingToStatesFirstName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByState();
         $array=$this->analyser->census[0];
         $firstState=$array[0];
         $this->assertEquals("Andhra Pradesh",$firstState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhentStateCensusDataSortedAccordingToStatesLastName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByState();
         $array=$this->analyser->census[29];
         $lastState=$array[0];
         $this->assertEquals("West Bengal",$lastState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhenStateDataSortedAccordingToStatecodeFirstCode(){
      try{
         $this->analyser->loadCensusData(self::$statePath);
         $this->analyser->sortCensusDataByStateCode();
         $array=$this->analyser->census[0];
         $firstStatecode=$array[2];
         $this->assertEquals(" AD",$firstStatecode);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhenStateDataSortedAccordingToStatecodeLastCode(){
      try{
         $this->analyser->loadCensusData(self::$statePath);
         $this->analyser->sortCensusDataByStateCode();
         $array=$this->analyser->census[37];
         $lastStatecode=$array[2];
         $this->assertEquals("WB",$lastStatecode);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   } 

   public function testWhentStateCensusDataSortedAccordingToHighestPopulationName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByPopulation();
         $array=$this->analyser->census[1];
         $firstState=$array[0];
         $this->assertEquals("Uttar Pradesh",$firstState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhentStateCensusDataSortedAccordingToLeastPopulationName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByPopulation();
         $array=$this->analyser->census[29];
         $lastState=$array[0];
         $this->assertEquals("Sikkim",$lastState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhentStateCensusDataSortedAccordingToHighestPopulationDensityName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByPopulationDensity();
         $array=$this->analyser->census[1];
         $firstState=$array[0];
         $this->assertEquals("Bihar",$firstState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhentStateCensusDataSortedAccordingToLeastPopulationDensityName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByPopulationDensity();
         $array=$this->analyser->census[29];
         $lastState=$array[0];
         $this->assertEquals("Arunachal Pradesh",$lastState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhentStateCensusDataSortedAccordingToHighestAreaStateName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByArea();
         $array=$this->analyser->census[1];
         $firstState=$array[0];
         $this->assertEquals("Rajasthan",$firstState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }

   public function testWhentStateCensusDataSortedAccordingToSmallestAreaStateName(){
      try{
         $this->analyser->loadCensusData(self::$csvPath);
         $this->analyser->sortCensusDataByArea();
         $array=$this->analyser->census[29];
         $lastState=$array[0];
         $this->assertEquals("Goa",$lastState);  
      }catch(CensusAnalyserException $e){
         echo $e->getMessage();
      }
   }
   
}
?>