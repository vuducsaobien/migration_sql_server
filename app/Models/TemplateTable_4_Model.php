<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateTable_4_Model extends Model
{
    use HasFactory;
    protected $table      = 'TemplateTable_4';
    public    $timestamps = false;
    protected $fillable   = ['string_1', 'string_2'];
}
