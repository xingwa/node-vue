<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwSystemVersion  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'system_version' ;
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
                    $table->string('name',50)->nullable()->comment('软件名称');
                }
                if(!Schema::hasColumn($this->table,'item')){
                    $table->tinyInteger('item')->nullable()->default(0)->comment('软件分类：0、app 1、后端管理')->unique();
                }
                if(!Schema::hasColumn($this->table,'version')){
                    $table->string('version',50)->default('1.0.0')->comment('版本号');
                }
                if(!Schema::hasColumn($this->table,'download')){
                    $table->string('download',150)->nullable()->comment('下载地址');
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