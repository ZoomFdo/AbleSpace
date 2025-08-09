<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_auth', function (Blueprint $table) {
            $table->id('auth_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->enum('method', ['email', 'phone', 'google', 'apple', 'facebook']);
            $table->string('identifier');
            $table->unique(['method', 'identifier']);//однаковий identifier може бути з різними method, але не повторюватись у одного method

            $table->string('login');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_email_verified')->default(false);
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent()->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('last_password_change')->nullable();
            $table->integer('failed_attempts')->default(0);
            $table->timestamp('locked_until')->nullable();
            $table->string('mfa_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_auth');
    }
};
