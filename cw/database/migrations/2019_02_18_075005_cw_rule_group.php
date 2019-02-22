<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CwRuleGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table = 'rule_group' ;
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
                if(!Schema::hasColumn($this->table,'rule_group_name')){
                    $table->string('rule_group_name',128)->nullable()->comment('规则组名称');
                }
                if(!Schema::hasColumn($this->table,'pid')){
                    $table->integer('pid')->nullable()->default(0)->comment('父级ID');
                }
                if(!Schema::hasColumn($this->table,'jurisdiction')){
                    $table->text('jurisdiction')->comment('栏目权限');
                }
                if(!Schema::hasColumn($this->table,'create_time')){
                    $table->timestamp('create_time')->useCurrent()->comment('创建时间');
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
