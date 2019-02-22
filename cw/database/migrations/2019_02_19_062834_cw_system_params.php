<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwSystemParams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'system_params' ;
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
                if(!Schema::hasColumn($this->table,'name')){
                    $table->string('name',50)->nullable()->comment('参数名称');
                }
                if(!Schema::hasColumn($this->table,'key')){
                    $table->string('key',50)->comment('键')->unique();;
                }
                if(!Schema::hasColumn($this->table,'value')){
                    $table->string('value',1000)->nullable()->comment('值');
                }
                if(!Schema::hasColumn($this->table,'status')){
                    $table->tinyInteger('status')->default(1) ->comment('是否有效：1、有效 0 无效');
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