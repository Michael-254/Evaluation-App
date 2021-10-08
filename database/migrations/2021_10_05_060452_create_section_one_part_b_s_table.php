<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionOnePartBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_one_part_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_one_id')->constrained();
            $table->string('Objective');
            $table->string('status');
            $table->string('E_comments');
            $table->string('S_comments');
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
        Schema::dropIfExists('section_one_part_b_s');
    }
}
