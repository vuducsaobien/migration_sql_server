<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StoreProcedureModel;
use App\Models\UserDefineFunctionModel;
use App\Models\ViewModel;
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
        $model                   = new StoreProcedureModel();
        $viewModel               = new ViewModel();
        $userDefineFunctionModel = new UserDefineFunctionModel();

        // 01. Store Procedure
        // $items[1] = $model->getItem(null, ['task' => 'get-item-01']);
        // $items[2] = $model->getItem(null, ['task' => 'get-item-02']);
        // $items[3] = $model->getItem(null, ['task' => 'get-item-03']);
        // $items[4] = $model->getItem(null, ['task' => 'get-item-04']);

        // $model->saveItem(null, ['task' => 'save-item-01']);
        
        // 02. View 
        // $items[5] = $viewModel->getItem(null, ['task' => 'get-item-01']);

        // 03. User Define Function
        $items[6]  = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-01']);
        $items[7]  = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-02']);
        $items[8]  = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-03']);
        $items[9]  = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-04']);
        $items[10] = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-05']);
        $items[11] = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-06']);
        $items[12] = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-07']);
        $items[13] = $userDefineFunctionModel->getItem(null, ['task' => 'get-item-08']);

        echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        echo '<h3>' . __FILE__ . '</h3>'; echo '<h3>Die is Called </h3>';die;

        // return view($this->pathViewController . 'index',compact(
        //     'items'
        // ));

    }

    

 
}