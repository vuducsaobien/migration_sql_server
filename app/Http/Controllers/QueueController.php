<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Models\TemplateTable_5_Model;
// use App\Models\UserDefineFunctionModel;
use App\Models\ViewModel;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Jobs\TestLogJob;
// use Illuminate\Support\Facades\App;

class QueueController extends Controller
{

    public function index(Request $request)
    {          

        // DB::table('TemplateTable_5')->where('id', 1)->delete();

        // dispatch(new TemplateTable_5_Job);

        dispatch(new TestLogJob);

        return view('welcome');

    }
 
}