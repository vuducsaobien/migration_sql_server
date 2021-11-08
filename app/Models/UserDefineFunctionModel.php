<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserDefineFunctionModel extends Model
{
    // protected $table      = 'TemplateTable_3';
    public    $timestamps = false;

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item-01') {
            $result = DB::select('SELECT [dbo].get_function_scalar_01()');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-02') {
            $result = DB::select('SELECT [dbo].get_function_scalar_02() Alo');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-03') {
            $result = DB::select('SELECT [dbo].get_function_scalar_03()');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-04') {
            $result = DB::select('SELECT [dbo].get_function_scalar_04(1)');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-05') {
            $result = DB::select(
                'SELECT * FROM dbo.TemplateTable_1
                WHERE string_1 = [dbo].get_function_scalar_04(1)
            ');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-06') {
            $result = DB::select('SELECT * FROM get_function_tabler_01()');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-07') {
            $result = DB::select('SELECT * FROM get_function_tabler_02(1)');
            $result = $this->toArrayStd($result);
        }

        if($options['task'] == 'get-item-08') {
            $result = DB::select('SELECT * FROM get_function_tabler_03()');
            $result = $this->toArrayStd($result);
        }

        return $result;
    }

    private function toArrayStd($result){

        $result = array_map(function ($value) {
            return (array)$value;
        }, $result);

        return $result;
    }
}
