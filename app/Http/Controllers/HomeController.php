<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    /**
     * This is the index page.
     *
     * @return string
     */
    public function index()
    {
        return view('welcome', [
            'sitename' => config('app.name')
        ]);
    }
}