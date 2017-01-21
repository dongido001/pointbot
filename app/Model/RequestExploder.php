<?php namespace App\Model;

class RequestExploder{

  public function usage(){

  }

  public static function get($what, $request){
     
  	 if( empty($request) OR $request == NULL){ return "Empty Request :'( ";}

      $cmdline = explode(' ', strtolower($request['text']));

     if(!in_array("to", $cmdline)){ return "keyword \"to\" not found on this request!"; }
      
     return $cmdline;
   }


   public static function checkIfIncomeReqestIsValid(){

      	if(!isset($_GET['token'])  OR $_GET['token'] != "RKSDMDX1YBhJpqd4HsyickJ9"){

           die("We cant process this request at this time :'( , please contact the administrator.");
        }
    }

}