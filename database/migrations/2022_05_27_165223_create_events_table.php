<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $uuid = DB::raw('UUID()');
            $table->uuid('id')->default($uuid)->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamp('startAt')->nullable();
            $table->timestamp('endAt')->nullable();
            $table->softDeletes();
            $table->timestamp('createdAt',  0)->useCurrent();
            $table->timestamp('updatedAt',  0)->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
