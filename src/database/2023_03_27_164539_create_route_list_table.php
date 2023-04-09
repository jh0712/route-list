<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('methods')->default(null)->nullable();
            $table->string('domain')->default(null)->nullable();
            $table->string('path')->default(null)->nullable();
            $table->string('name')->default(null)->nullable();
            $table->string('action')->default(null)->nullable();
            $table->string('middleware')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_list');
    }
}
