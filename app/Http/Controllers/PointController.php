<?php

namespace App\Http\Controllers;
use App\Model\User;
use App\Model\Points;
use App\Model\IncommingRequests;
use App\Model\RequestExploder;

class PointController extends Controller {

    public function __construct(){
        RequestExploder::checkIfIncomeReqestIsValid();
    }
    /**
     * This is the index page.
     *
     * @return string
     */
    public function index()
    {
       echo "PointBolt";
    }

    /**
     * This is the index page.
     *
     * @return string
     */
    public function add()
    {
       //verify the user is registered on our chanell AND user can give points

        $point    = RequestExploder::get("point", $_GET);
        $receiver = RequestExploder::get("receiver", $_GET);
        $username = $_GET['user_name'];
        $s        = Points::where('username', $receiver)->first();
        $npoint = (is_object($s)) ? $s->points + $point : $point;
        $user     = User::where('username', $username)->first();

        if( $user AND $user->role > 0 ){

            if( (!is_object($s)) ){ //insert
                $pointer = new Points;
                $pointer->username = $receiver;
                $pointer->points = $npoint;
                $re = $pointer->save(); 
            } //update
            else
            {
               $re = Points::where('username', $receiver)->update(['points'=> $npoint]);
            }
            if($re){

                $client = new \Maknz\Slack\Client('*******************WEBHOOK*********************');
                $client->to($receiver)->send('@'. $username . " just added point to you! :joy:");
                $client->to('#'. $_GET['channel_name'])->send(":white_check_mark:". '@'. $username . " You just added {$point} points to {$receiver}");

                die(":white_check_mark: You have added {$point} points to {$receiver}");
            } die("-_- failed adding point as this moment, you might want to contact the admin...");
            
        }
        else{
            die("Sorry but you can not assign point to any user :confused: ");
        }

    }
}
