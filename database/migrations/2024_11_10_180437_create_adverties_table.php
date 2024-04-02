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
        Schema::create('adverties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->tinyInteger('sex')->default(0)->comment('0 => mail , 1 => femail');
            $table->text('contact_ways');
            $table->tinyInteger('contact_type')->default(0);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('work_houres');
            $table->string('slug')->unique()->nullable();
            $table->text('benefites');
            $table->foreignId('province_id')->constrained('provinces')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('contract_type')->default(0);
            $table->text('salary_range');
            $table->foreignId('category_id')->constrained('taxonomies')->onUpdate('cascade')->onDelete('cascade');
            $table->text('reject_message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverties');
    }
};
