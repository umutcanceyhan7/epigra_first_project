<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapsulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->string('capsule_serial')->unique();
            $table->string('capsule_id');
            $table->string('status');
            $table->string('original_launch')->nullable();
            $table->integer('original_launch_unix')->nullable();
            $table->json('missions');
            $table->integer('landings');
            $table->string('type');
            $table->text('details')->nullable();
            $table->integer('reuse_count');
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
        Schema::dropIfExists('capsules');
    }
}
