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
        $prepoint = ( $s = Points::where('username', $receiver)->first() == is_object($s)) ? $s->points : 0;
        $user     = User::where('username', $username)->first();

        if( $user AND $user->role > 0 ){
            $re = Points::updateOrCreate(['username'=> $receiver], ['points'=> $point+$prepoint]);
            if($re){
                die(":checked: You have added point to {$receiver}");
            } die("-_- failed adding point as this moment, you might want to contact the admin...");
            
        }
        else{
            die("Sorry but you can not assign point to any user :confused: ");
        }

    }
}