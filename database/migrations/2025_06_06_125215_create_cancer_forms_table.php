<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cancer_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // คนกรอก
            $table->string('title')->nullable();
            $table->string('sex');
            $table->string('nationality')->nullable();
            $table->integer('age')->nullable();
            $table->string('address_no')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('zipcode')->nullable();
            $table->json('diagnosis_methods')->nullable();
            $table->string('icd10')->nullable();
            $table->string('topology')->nullable();
            $table->text('diagnosis_note')->nullable();
            $table->string('laterality')->nullable();
            $table->string('grade')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancer_forms');
    }
};
