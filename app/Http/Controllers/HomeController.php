<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get the home page
     */
    public function index()
    {
        $countries = array('UK', 'France', 'Spain', 'USA', 'Macedonia', 'Montenegro');
        $states =  array('AL'=>"Alabama",  
        'AK'=>"Alaska",  
        'AZ'=>"Arizona",  
        'AR'=>"Arkansas",  
        'CA'=>"California",  
        'CO'=>"Colorado",  
        'CT'=>"Connecticut",  
        'DE'=>"Delaware",  
        'DC'=>"District Of Columbia",  
        'FL'=>"Florida",  
        'GA'=>"Georgia",  
        'HI'=>"Hawaii",  
        'ID'=>"Idaho",  
        'IL'=>"Illinois",  
        'IN'=>"Indiana",  
        'IA'=>"Iowa",  
        'KS'=>"Kansas",  
        'KY'=>"Kentucky",  
        'LA'=>"Louisiana",  
        'ME'=>"Maine",  
        'MD'=>"Maryland",  
        'MA'=>"Massachusetts",  
        'MI'=>"Michigan",  
        'MN'=>"Minnesota",  
        'MS'=>"Mississippi",  
        'MO'=>"Missouri",  
        'MT'=>"Montana",
        'NE'=>"Nebraska",
        'NV'=>"Nevada",
        'NH'=>"New Hampshire",
        'NJ'=>"New Jersey",
        'NM'=>"New Mexico",
        'NY'=>"New York",
        'NC'=>"North Carolina",
        'ND'=>"North Dakota",
        'OH'=>"Ohio",  
        'OK'=>"Oklahoma",  
        'OR'=>"Oregon",  
        'PA'=>"Pennsylvania",  
        'RI'=>"Rhode Island",  
        'SC'=>"South Carolina",  
        'SD'=>"South Dakota",
        'TN'=>"Tennessee",  
        'TX'=>"Texas",  
        'UT'=>"Utah",  
        'VT'=>"Vermont",  
        'VA'=>"Virginia",  
        'WA'=>"Washington",  
        'WV'=>"West Virginia",  
        'WI'=>"Wisconsin",  
        'WY'=>"Wyoming");
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
