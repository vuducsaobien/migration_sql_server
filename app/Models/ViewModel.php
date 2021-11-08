<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ViewModel extends Model
{
    protected $table      = 'TemplateTable_3';
    public    $timestamps = false;

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item-01') {
            // $result = TemplateTable_4_Model::select('*')->get()->toArray();

            $result = DB::select('SELECT * FROM view_01');
            $result = $this->toArrayStd($result);

        }

        return $result;
    }

    // public function saveItem($params = null, $options = null) { 

    //     if($options['task'] == 'save-item-01') {
    //         DB::update('EXEC procedure_4 ?, ?', ['student_3', 'subject_1']);
    //     }

    // }

    private function toArrayStd($result){

        $result = array_map(function ($value) {
            return (array)$value;
        }, $result);

        return $result;
    }
}
