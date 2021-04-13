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
            $table->string('name');
            $table->float('life_time')->default(0);
            $table->string('skin');
            $table->string('state')->default('NORMAL');
            $table->float('happiness')->default(70);
            $table->float('hunger')->default(0);
            $table->float('health')->default(100);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->time('reference_time')->default("00:00");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

//        Schema::table('pets', function (Blueprint $table) {
//            $table->foreign('pets_user_id_foreign"')
//                ->references('id')
//                ->on('users');
//        });

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
