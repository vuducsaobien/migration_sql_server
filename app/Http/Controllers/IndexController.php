<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StoreProcedureModel as MainModel;
use App\Models\StoreProcedureModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // private $pathViewController = 'news.pages.about.'; 
    private $pathViewController = ''; 
    private $controllerName     = 'index';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {          
        $model  = new StoreProcedureModel();

        $items[1] = $model->getItem(null, ['task' => 'get-item-01']);
        $items[2] = $model->getItem(null, ['task' => 'get-item-02']);
        $items[3] = $model->getItem(null, ['task' => 'get-item-03']);
        $items[4] = $model->getItem(null, ['task' => 'get-item-04']);

        $model->saveItem(null, ['task' => 'save-item-01']);

        // echo '<pre style="color:red";>$items[5] === '; print_r($items[5]);echo '</pre>';

        // echo '<h3>' . __FILE__ . '</h3>'; echo '<h3>Die is Called </h3>';die;

        return view($this->pathViewController . 'index',compact(
            'items'
        ));

    }

    

 
}