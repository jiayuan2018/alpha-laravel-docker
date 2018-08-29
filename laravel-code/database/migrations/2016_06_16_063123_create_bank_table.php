<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //银行卡数据表
        Schema::create('bank', function(Blueprint $table)
        {
            $table->bigIncrements('id')->comment('银行信息表');
            $table->string('name',30)->default('')->comment('银行名称');
            $table->timestamps();
        });
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
