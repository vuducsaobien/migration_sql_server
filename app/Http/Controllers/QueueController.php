<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Models\TemplateTable_5_Model;
use App\Models\ViewModel;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Jobs\TestLogJob;
use App\Jobs\TestLogJob2;

class QueueController extends Controller
{

    public function index(Request $request)
    {          

        // DB::table('TemplateTable_5')->where('id', 1)->delete();

        // dispatch(new TemplateTable_5_Job);

        dispatch(new TestLogJob);

        return view('welcome');

    }

    public function form(Request $request)
    {          

        // DB::table('TemplateTable_5')->where('id', 1)->delete();

        // dispatch(new TemplateTable_5_Job);

        // echo '<pre style="color:red";>$request === '; print_r($request);echo '</pre>';
        // echo '<h3>' . __FILE__ . '</h3>'; echo '<h3>Die is Called </h3>';die;

        // dispatch(new TestLogJob);
        $firstName = $request->first_name;
        $lastName  = $request->last_name;

        if ( !empty($firstName) && !empty($lastName) ) {
            echo '<h3>' . __METHOD__ . '</h3>';
            echo '<pre style="color:red";>$firstName === '; print_r($firstName);echo '</pre>';
            echo '<pre style="color:red";>$lastName === '; print_r($lastName);echo '</pre>';

            dispatch(new TestLogJob2($request) );
        }
        
        return view('welcome');

    }
 
}