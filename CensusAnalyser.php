<?php
class CensusAnalyser
{
  public function __construct()
  {
    echo "\n Welcome to Census Analyser Program \n";
  }  

  function loadStateCensusData($csvPath)
  {
    $row=0;
    try{
      if(!file_exists($csvPath)){
        throw new Exception("file is not found");

      }
      else{
        if (($h = fopen($csvPath, "r")) !== FALSE) {
          // Convert each line into the local $data variable
          while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;                
            for ($c = 0; $c < $num; $c++) {
                $data[$c] . "\n";        //printing the contents of csv file
            }
          }
          return ($row-1);
          // Close the file
          fclose($h);
        }
      }
    }catch(Exception $e){
      echo $e->getMessage();
    }
    //open csv file in read mode    
     
  }

  function loadCensusData($statePath)
  {
    $row=0;
    try{
      if(!file_exists($statePath)){
        throw new Exception("file not found");
      }

      else{
        if (($h = fopen($statePath,"r")) !== FALSE) {
          // Convert each line into the local $data variable
          // The items of the array are comma separated
          while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c = 0; $c < $num; $c++) {
               $data[$c]. "\n" ;          //printing the contents of csv file
            }
          }
          return ($row-1);
          // Close the file
          fclose($h);
        }

      }
    }catch(Exception $e){
      echo $e->getMessage();
    }
    
  }
}

?>