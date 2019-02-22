<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwRoleMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'system_menu' ;
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
                    $table->string('name',50)->nullable()->comment('栏目名称');
                }
                if(!Schema::hasColumn($this->table,'alias_name')){
                    $table->string('alias_name',50)->nullable()->comment('别名');
                }
                if(!Schema::hasColumn($this->table,'en_name')){
                    $table->string('en_name',50)->nullable()->comment('英文栏目名称');
                }
                if(!Schema::hasColumn($this->table,'en_alias_name')){
                    $table->string('en_alias_name',50)->nullable()->comment('英文别名');
                }
                if(!Schema::hasColumn($this->table,'item')){
                    $table->tinyInteger('item')->nullable()->default(0)->comment('栏目分类：0、栏目 1、频道  2、Action');
                }
                if(!Schema::hasColumn($this->table,'pid')){
                    $table->integer('pid')->default(0)->comment('父级ID');
                }
                if(!Schema::hasColumn($this->table,'url')){
                    $table->string('url',150)->nullable()->comment('连接地址');
                }
                if(!Schema::hasColumn($this->table,'target')){
                    $table->string('target',20)->default('self')->nullable()->comment('连接类型');
                }
                if(!Schema::hasColumn($this->table,'action')){
                    $table->string('action',20)->default('show')->nullable()->comment('栏目类型：show 显示 create 插入......');
                }
                if(!Schema::hasColumn($this->table,'frontend_show')){
                    $table->unsignedTinyInteger('frontend_show')->default(1)->comment('前端是否显示：0、不显示  1显示');
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
     * @return void
     */
    public function down()
    {
        //
    }
}