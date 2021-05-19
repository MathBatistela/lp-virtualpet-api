<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_pets', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->default('My Pet');
            $table->float('lifeTime')->default(0);
            $table->string('skin')->default('tailed');
            $table->string('state')->default('normal');
            $table->float('happiness')->default(100);
            $table->float('hunger')->default(100);
            $table->float('health')->default(100);
            $table->float('energy')->default(100);
            $table->float('dirty')->default(100);
            $table->foreignId('userId')->constrained('users')->onDelete('cascade');
            $table->bigInteger('referenceTime')->nullable()->default(1621371188930);
            $table->string('lastScene')->default('bedroom');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_pets');
    }
}
