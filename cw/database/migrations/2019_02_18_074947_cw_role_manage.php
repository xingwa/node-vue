<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwRoleManage extends Migration
{
    private $table = 'role_manage';
    /**
     * Run the migrations.
     *
     * @return void
     */
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
                if(!Schema::hasColumn($this->table,'username')){
                    $table->string('username',50)->comment('用户账号');
                }
                if(!Schema::hasColumn($this->table,'password')){
                    $table->string('password',32)->comment('用户密码');
                }
                if(!Schema::hasColumn($this->table,'rand_str')){
                    $table->string('rand_str',8)->comment('随机8位字符串');
                }
                if(!Schema::hasColumn($this->table,'role_id')){
                    $table->unsignedBigInteger('role_id')->comment('角色ID');
                }
                if(!Schema::hasColumn($this->table,'department_id')){
                    $table->unsignedBigInteger('department_id')->comment('部门公司ID');
                }
                if(!Schema::hasColumn($this->table,'login_time')){
                    $table->timestamp('login_time')->useCurrent()->comment('最后登录时间');
                }
                if(!Schema::hasColumn($this->table,'login_ip')){
                    $table->string('login_ip',8)->comment('最后登录IP');
                }
                if(!Schema::hasColumn($this->table,'status')){
                    $table->tinyInteger('status')->default(0)->unsigned()->comment('状态：0、正常  1、禁用  2、删除');
                }
                if(!Schema::hasColumn($this->table,'create_time')){
                    $table->timestamp('create_time')->useCurrent()->comment('创建时间');
                }
                $table->foreign('department_id')->references('id')->on('department');
             
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
