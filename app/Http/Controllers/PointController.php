<?php

namespace App\Http\Controllers;
use App\Model\User;
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

        echo RequestExploder::get("point", $_GET) ; die();
        $user = User::where('username', $username)->first();
        if( $user AND $user->role > 0 ){
            die("We have added point to you");
        }
        else{
            die("Sorry but you can not assign point to any user :confused: ");
        }

    }
}