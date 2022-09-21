<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class MainController extends Controller{
    public function index(){
        $countries = Country::all();
        return view('index',compact('countries'));
    }

    public function getStates($id){
        $states = State::where('country_id',$id)->pluck("name","id");
        return json_encode($states);
    }
}
