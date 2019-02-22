<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwSystemTableField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'system_table_field' ;
    public function up()
    {
        //
        if(!Schema::hasTable($this->table)){
            Schema::create($this->table, function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';
                if(!Schema::hasColumn($this->table,'id')){
                    $table->bigIncrements('id')->comment('ID');
                }
                if(!Schema::hasColumn($this->table,'table_name')){
                    $table->string('table_name',50)->nullable()->comment('表名');
                }
                if(!Schema::hasColumn($this->table,'field')){
                    $table->tinyInteger('field')->nullable()->default(0)->comment('字段');
                }
                if(!Schema::hasColumn($this->table,'types')){
                    $table->enum('types',['varchar','int'])->default('varchar')->comment('类型');
                }
                if(!Schema::hasColumn($this->table,'name')){
                    $table->string('name',50)->nullable()->comment('字段名称');
                }
                if(!Schema::hasColumn($this->table,'is_search')){
                    $table->tinyInteger('is_search')->default(0)->comment('是否加入搜索');
                }
                if(!Schema::hasColumn($this->table,'is_order')){
                    $table->tinyInteger('is_order')->default(0)->comment('是否加入排序');
                }
            });
        }else{
            Schema::table($this->table, function(Blueprint $table){
            });
        }
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
