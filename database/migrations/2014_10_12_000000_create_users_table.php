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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('domin')->nullable();
            $table->string('subdomin')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('facebook_page_id')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email_contact')->nullable();
            $table->tinyInteger('plan_id')->nullable();
            $table->dateTime('next_expiration')->nullable();
            $table->dateTime('disabled_acconunt')->nullable();
            $table->dateTime('delete_acconunt')->nullable();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
