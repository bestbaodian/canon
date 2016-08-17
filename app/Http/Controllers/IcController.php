<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
class IcController extends Controller{
    public function Ic(){
        header('location:http://tmjob.mbaodian.com');
    }
}