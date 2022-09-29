<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        info("Dashboard constructor called:" . spl_object_id($this));
    }

    public function __invoke()
    {
        info("invoke called: ". spl_object_id($this));
        return view('welcome');
    }
}
