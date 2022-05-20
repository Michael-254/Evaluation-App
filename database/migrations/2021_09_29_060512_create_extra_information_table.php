<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('status')->default('pending');
            $table->string('evaluation_type')->nullable();
            $table->string('Academic');
            $table->string('Designation');
            $table->string('service_years');
            $table->string('review_supervisor');
            $table->string('review_hod')->nullable();
            $table->string('review_period');
            $table->string('last_appraisal');
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
        Schema::dropIfExists('extra_information');
    }
}
