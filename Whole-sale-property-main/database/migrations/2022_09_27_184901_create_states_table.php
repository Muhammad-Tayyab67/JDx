<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('dateCreated')->nullable();
            $table->string('dateModified')->nullable();
            $table->string('createdBy')->nullable();
            $table->string('createdByName')->nullable();
            $table->string('modifiedBy')->nullable();
            $table->string('modifiedByName')->nullable();
            $table->string('name')->nullable();
            $table->string('abbr')->nullable();
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
        Schema::dropIfExists('states');
    }
}
