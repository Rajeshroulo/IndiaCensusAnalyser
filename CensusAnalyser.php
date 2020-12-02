<?php
class CensusAnalyser
{
  public $census=array();

  public function __construct()
  {
    echo "\n Welcome to Census Analyser Program \n";
  }  
 
  function loadCensusData($filePath)
  {
    $row=0;
    try{
      if(!file_exists($filePath)){
        throw new CensusAnalyserException("enter valid file");
      }

      else{
        if (($h = fopen($filePath,"r")) !== FALSE) {
          // Convert each line into the local $data variable
          // The items of the array are comma separated
          while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c = 0; $c < $num; $c++) {
               $data[$c]. "\n" ;          //printing the contents of csv file
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
  }

  public function sortCensusDataByState(){    
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

  public function sortCensusDataByStateCode(){    
    $states=array();
    //using loop to get states from census array
    foreach($this->census as $value => $row){
     $states[$value] = $row[2]; 
    }
    //function used to sort array 
    array_multisort($states, SORT_ASC, $this->census); 
    $array_json=json_encode($this->census);
    //printing output in json format
   return($array_json);
  }  
  
  public function sortCensusDataByPopulation(){    
    $states=array();
    //using loop to get states from census array
    foreach($this->census as $value => $row){
     $states[$value] = $row[1]; 
    }
    //function used to sort array 
    array_multisort($states, SORT_DESC, $this->census); 
    $array_json=json_encode($this->census);
    //printing output in json format
   return ($array_json);   
  }

  public function sortCensusDataByPopulationDensity(){    
    $states=array();
    //using loop to get states from census array
    foreach($this->census as $value => $row){
     $states[$value] = $row[3]; 
    }
    //function used to sort array 
    array_multisort($states, SORT_DESC, $this->census); 
    $array_json=json_encode($this->census);
    //printing output in json format
   return ($array_json);   
  }

  public function sortCensusDataByArea(){    
    $states=array();
    //using loop to get states from census array
    foreach($this->census as $value => $row){
     $states[$value] = $row[2]; 
    }
    //function used to sort array 
    array_multisort($states, SORT_DESC, $this->census); 
    $array_json=json_encode($this->census);
    //printing output in json format
   return ($array_json);   
  }

}
$analyser= new CensusAnalyser();
$analyser->sortCensusDataByState();
$analyser->sortCensusDataByStateCode();
$analyser->sortCensusDataByPopulation();
$analyser->sortCensusDataByPopulationDensity();
$analyser->sortCensusDataByArea();

?>