<?php namespace App\Model;

class RequestExploder{

  public function usage(){

  }

  public static function get($what, $request){
     
  	 if( empty($request) OR $request == NULL){ return "Empty Request :'( ";}

      $cmdline = explode(' ', strtolower($request['text']));

     if(!in_array("to", $cmdline)){ return "keyword \"to\" not found on this request!"; }

     if(in_array($what, array_keys($request))){ return $request[$what]; }

     $point = $command = $receiver = $label = "";


     foreach($cmdline as $cmd){
        if($cmd == "add" OR $cmd == "remove"){
        	$command = $cmd;
        }
        else if(is_numeric($cmd)){
            $point = $cmd;
        }
        else if( $cmd[0] == '@'){
            $receiver = $cmd;
        }
        else{
        	$label .=" " .$cmd;
        }
     }

     //these are availbe commads that we accepts...
     $availcmd = ["point" => $point, "command" => $command, 
                 "receiver" => $receiver, "label" => $label];

     if( $point == "" OR $command == "" OR $receiver == ""){ die("please folow our rule..."); }

     if(in_array($what, array_keys($availcmd))){
     	return $availcmd[$what];
     }
      
     return $what;
   }


   public static function checkIfIncomeReqestIsValid(){

      	if(!isset($_GET['token'])  OR $_GET['token'] != "RKSDMDX1YBhJpqd4HsyickJ9"){

           die("We cant process this request at this time :'( , please contact the administrator.");
        }
    }

}