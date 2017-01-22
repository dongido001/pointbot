<?php namespace App\Model;

class RequestExploder{

  /*
  * Command Argument Usage
  */

  CONST Usage1 = "/point add 60 to @gideon";
  CONST Usage2 = "/point add 60 from @gideon";
  CONST Usage3 = "@point add 60 to @gideon";
  CONST Usage4 = "@point remove 60 from @gideon";


  /*
  * Explodes command
  */

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

     //these are availabe commads that we accepts...
     $availcmd = ["point" => $point, "command" => $command, 
                 "receiver" => $receiver, "label" => $label];

     if( $point == "" OR $command == "" OR $receiver == ""){ die("please folow our rule...". PHP_EOL . Usage1); }

     if(in_array($what, array_keys($availcmd))){
     	return $availcmd[$what];
     }
      
     return $what;
   }


   public static function checkIfIncomeReqestIsValid(){
        
      	if(!isset($_GET['token'])  OR $_GET['token'] != SLACK_ID){

           die("We cant process this request at this time :'( , please contact the administrator.");
        }
    }

}