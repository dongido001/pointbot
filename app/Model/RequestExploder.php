<?php namespace App\Model;

class RequestExploder{

  public function usage(){

  }

  public static function get($what, $request){

  	 if( empty($request) OR $request == NULL){ return "Empty Request :'( ";}

      $request = explode(' ', strtolower($request));

     if(!in_array("to", $request)){ return "keyword \"to\" not found on this request!"; }
      
     return $request;
   }


   public static function checkIfIncomeReqestIsValid(){
      	
      	if(!isset($_GET['token'])  OR $_GET['token'] != "RKSDMDX1YBhJpqd4HsyickJ9"){

           die("We cant process this request at this time :'( , please contact the administrator.");
        }
    }

}