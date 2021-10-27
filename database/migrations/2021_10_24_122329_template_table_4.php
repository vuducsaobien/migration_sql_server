<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TemplateTable_4_Model as MainModel;

class TemplateTable4 extends Migration
{
    private $table_db = 'TemplateTable_4';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_db, function (Blueprint $table) {
            $table->string('string_1');
            $table->string('string_2');
        });

        MainModel::create([
            'string_1' => 'string_1_default',
            'string_2' => 'string_2_default'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_db);
    }
}
