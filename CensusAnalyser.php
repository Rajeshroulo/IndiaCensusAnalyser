<?php
class CensusAnalyser
{
  public $census=array();
  public $code=array();

  public function __construct()
  {
    echo "\n Welcome to Census Analyser Program \n";
  }  

  function loadStateCensusData($csvPath)
  {
    $row=0;
    try{
      if(!file_exists($csvPath)){
        throw new CensusAnalyserException("enter valid file");
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
            array_push($this->census,$data);
          }
          return ($row-1);
          // Close the file
          fclose($h);
        }
      }
    }catch(CensusAnalyserException $e){
      echo $e->getMessage();
    }
    //open csv file in read mode    
     
  }

  function loadCensusData($statePath)
  {
    $row=0;
    try{
      if(!file_exists($statePath)){
        throw new CensusAnalyserException("enter valid file");
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
            array_push($this->code,$data);
          }
          return ($row-1);
          // Close the file
          fclose($h);
        }

      }
    }catch(CensusAnalyserException $e){
      echo $e->getMessage();
    }   
  }

  public function sortCensusDatainAscending(){    
    $states=array();
    //using loop to get states from census array
    foreach($this->census as $value => $row){
     $states[$value] = $row[0]; 
    }
    //function used to sort array 
    array_multisort($states, SORT_ASC, $this->census); 
    $array_json=json_encode($this->census);
    //printing output in json format
   return ($array_json);
  }

  public function sortCensusDatainDescending(){    
    $states=array();
    //using loop to get states from census array
    foreach($this->census as $value => $row){
     $states[$value] = $row[0]; 
    }
    //function used to sort array 
    array_multisort($states, SORT_DESC, $this->census); 
    $array_json=json_encode($this->census);
    //printing output in json format
   print_r($array_json);
  }
}
$analyser= new CensusAnalyser();
$analyser->loadStateCensusData("StateCensusData.csv");
$analyser->loadCensusData("StateCode.csv");
$analyser->sortCensusDatainDescending();
?>