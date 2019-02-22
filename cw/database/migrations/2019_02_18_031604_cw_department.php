<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwDepartment extends Migration
{
    private $table = 'department';
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
                if(!Schema::hasColumn($this->table,'pid')){
                  $table->bigInteger('pid')->comment('父级ID');
                }
                if(!Schema::hasColumn($this->table,'name')){
                  $table->string('name',100)->comment('公司或部门名称');
                }
                if(!Schema::hasColumn($this->table,'type')){
                    $table->tinyInteger('type')->default(1)->comment('公司或部门类型：0、公司名称 1、部门名称');
                }
                if(!Schema::hasColumn($this->table,'create_time')){
                    $table->timestamp('create_time')->useCurrent()->comment('创建时间');
                }
                if(!Schema::hasColumn($this->table,'update_time')){
                    $table->timestamp('update_time')->useCurrent()->comment('修改时间');
                }
                if(!Schema::hasColumn($this->table,'is_del')){
                    $table->tinyInteger('is_del')->default(0)->comment('是否删除：0、未删除  1、已删除')->index();
                }
                if(!Schema::hasColumn($this->table,'counts')){
                    $table->integer('counts')->default(0)->comment('下属数量');
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
