<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_6_Model extends Model
{
    use HasFactory;
    protected $table      = 'table_6';
    public    $timestamps = false;
    protected $fillable   = ['id_table_6', 'id_table_7', 'name_table_6'];
}
