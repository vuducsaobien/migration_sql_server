<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use App\Models\TemplateTable_4_Model;
use App\Models\TemplateTable_3_Model;

class StoreProcedureModel extends Model
{
    // use HasFactory;
    protected $table      = 'TemplateTable_3';
    public    $timestamps = false;

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item-01') {
            $result = TemplateTable_4_Model::select('*')->get()->toArray();
        }

        if($options['task'] == 'get-item-02') {
            $array  = DB::select('EXEC procedure_1');
            $result = $this->toArrayStd($array);
        }

        if($options['task'] == 'get-item-03') {
            $array  = DB::select('EXEC procedure_2 ?', ["student_1"]);
            $result = $this->toArrayStd($array);
        }

        if($options['task'] == 'get-item-04') {
            $result = DB::select('EXEC procedure_3 ?, ?', ['student_1', 'subject_2']);
            $result = $this->toArrayStd($result);
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 

        if($options['task'] == 'save-item-01') {
            DB::update('EXEC procedure_4 ?, ?', ['student_3', 'subject_1']);
        }

    }

    private function toArrayStd($result){

        $result = array_map(function ($value) {
            return (array)$value;
        }, $result);

        return $result;
    }
}
