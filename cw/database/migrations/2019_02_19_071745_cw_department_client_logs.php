<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwDepartmentClientLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'department_client_logs' ;
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
                if(!Schema::hasColumn($this->table,'client_pid')){
                    $table->unsignedBigInteger('client_pid')->comment('设备对应的ID');
                }
                if(!Schema::hasColumn($this->table,'create_time')){
                    $table->timestamp('create_time')->useCurrent()->comment('创建时间');
                }
                if(!Schema::hasColumn($this->table,'api')){
                    $table->string('api',100)->comment('对应的URL值');
                }
                if(!Schema::hasColumn($this->table,'item')){
                    $table->string('item',20)->default('connection')->comment('对应的栏目分类');
                }
                if(!Schema::hasColumn($this->table,'value')){
                    $table->text('value')->comment('APP上传值');
                }
                $table->foreign('client_pid')->references('id')->on('department_client');
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