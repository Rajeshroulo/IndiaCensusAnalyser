<?php
  class CensusAnalyser
  {
	public function __construct()
	{
		echo "\n Welcome to Census Analyser Program \n";
    } 
    
    function loadStateCensusData()
    {
      $arr=array();
        if (($h = fopen("StateCensusData.csv", "r")) !== FALSE) {
			      while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {

             array_push($arr,$data);
            }

            print_r($arr);
            
			    // Close the file
			    fclose($h);
		    }
    }
              
    function loadCensusData()
    {
      $array=array();
      if (($h = fopen("StateCode.csv", "r")) !== FALSE) {
			// Convert each line into the local $data variable
			// The items of the array are comma separated
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {

              array_push($array,$data);
            } 
            print_r($array); 
			      // Close the file
		    	fclose($h);
		  }
    } 

  }

  $state_data = new CensusAnalyser();
  $state_data->loadStateCensusData();
  $state_data->loadCensusData();
?>