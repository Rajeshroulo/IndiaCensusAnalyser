<?php
class CensusAnalyserException extends Exception{
    const csv_file_not_found=1;
    const csv_type_not_found=2;

    public function passMessage($error)
    {
        switch($error){
            case $this->csv_file_not_found:
                $this->message="csv file doesn't exist";
                break;
            case $this->csv_type_not_found:
                $this->message="csv type file not found";
                break;
                
            default:
                $this->message="error in the file";
                break;
            
        }
        return $this->message;
    }

}
?>