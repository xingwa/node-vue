<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwDepartmentClient extends Migration
{
    private $table = 'department_client';
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
                if(!Schema::hasColumn($this->table,'department_id')){
                    $table->bigInteger('department_id')->default(0)->comment('所属部门或组');
                }
                if(!Schema::hasColumn($this->table,'dev_ident')){
                    $table->bigInteger('dev_ident')->comment('设备协议');
                }
                if(!Schema::hasColumn($this->table,'user_name')){
                    $table->string('user_name',50)->comment('使用人');
                }
                if(!Schema::hasColumn($this->table,'dev_osversion')){
                    $table->string('dev_osversion',50)->comment('操作系统版本');
                }
                if(!Schema::hasColumn($this->table,'dev_name')){
                    $table->string('dev_name',100)->comment('操作系统电脑名');
                }
                if(!Schema::hasColumn($this->table,'mac_address')){
                    $table->string('mac_address',64)->comment('mac地址');
                }
                if(!Schema::hasColumn($this->table,'intranet_ip')){
                    $table->string('intranet_ip',128)->comment('内网IP');
                }
                if(!Schema::hasColumn($this->table,'extranet_ip')){
                    $table->string('extranet_ip',128)->comment('外网IP');
                }
                if(!Schema::hasColumn($this->table,'dev_username')){
                    $table->string('dev_username',64)->comment('操作系统当前用户名');
                }
                if(!Schema::hasColumn($this->table,'is_online')){
                    $table->tinyInteger('is_online')->default(1)->comment('是否在线：1、在线  2、离线  3、待卸载  4、待更新  5、已处理');
                }
                if(!Schema::hasColumn($this->table,'is_infected')){
                    $table->tinyInteger('is_infected')->default(0)->comment('是否在线： 0、否  1、是');
                }
                if(!Schema::hasColumn($this->table,'create_time')){
                    $table->timestamp('create_time')->useCurrent()->comment('首次使用时间');
                }
                if(!Schema::hasColumn($this->table,'login_time')){
                    $table->timestamp('login_time')->useCurrent()->comment('最近使用时间');
                }
                if(!Schema::hasColumn($this->table,'client_version')){
                    $table->string('client_version',32)->comment('客户端版本号');
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
