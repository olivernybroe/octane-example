<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory;
use ReflectionClass;

class DashboardController extends Controller
{
    public function __construct(
        private Factory $factory,
    )
    {
        info("Dashboard constructor called:" . spl_object_id($this));
        info("socialite factory:" . spl_object_id($factory));
    }

    public function __invoke(Request $request)
    {
        $driver = $this->factory->driver('github');
        $driverRequest = $this->accessProtected($driver, 'request');


        info("github driver id:" . spl_object_id($driver));
        info("request id:" . spl_object_id($request));
        info("github request id:" . spl_object_id($driverRequest));
        $driver->redirect();

        return view('welcome');
    }

    private function accessProtected($obj, $prop) {
        $reflection = new ReflectionClass($obj);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        return $property->getValue($obj);
    }
}
