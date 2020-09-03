<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Get the home page
     */
    public function index()
    {
        $countries = array('UK', 'France', 'Spain', 'USA', 'Macedonia', 'Montenegro');
        $countries = Http::get('https://restcountries.eu/rest/v2/all')->json();
        $states = array("Alabama", "Alaska", "American Samoa", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", 
        "District Of Columbia", "Federated States Of Micronesia", "Florida", "Georgia", "Guam", "Hawaii", "Idaho", "Illinois", "Indiana", 
        "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Marshall Islands", "Maryland", "Massachusetts", "Michigan", "Minnesota", 
        "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina",
         "North Dakota", "Northern Mariana Islands", "Ohio", "Oklahoma", "Oregon", "Palau", "Pennsylvania", "Puerto Rico", "Rhode Island", 
         "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virgin Islands", "Virginia", "Washington", "West Virginia", 
         "Wisconsin", "Wyoming");

        return view('home', ['countries' => $countries, 'states' => $states]);
    }

    /**
     * Restart the session after the timer has run out
     */
    public function restart(Request $request)
    {
        $request->session()->flush();
    }
}
