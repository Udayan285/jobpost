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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('company_type');
            $table->string('details');
            $table->string('img_url')->nullable();
            $table->string('post_img')->nullable();
            $table->string('post_date');
            $table->string('location');
            $table->string('vacancy');
            $table->string('job_nature');
            $table->string('salary');
            $table->string('application_date');
            $table->string('categori_job')->nullable();
            $table->string('company_name');
            $table->string('website_url')->nullable();
            $table->string('email');
            $table->string('profile');
            $table->boolean('check')->default(false);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
