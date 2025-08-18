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
        // Додаємо нові колонки в Users
        Schema::table('users', function (Blueprint $table) {
            $table->enum('method', ['email', 'phone', 'google', 'apple', 'facebook'])->nullable();
            $table->string('identifier')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_email_verified')->default(false);
            $table->timestamp('created_date')->nullable();
            $table->timestamp('updated_date')->nullable();
            $table->timestamp('last_password_change')->nullable();
            $table->integer('failed_attempts')->default(0);
            $table->timestamp('locked_until')->nullable();
            $table->string('mfa_secret')->nullable();
        });

        // Переносимо дані з user_auth у users
        DB::statement("
            UPDATE users u
            JOIN user_auth ua ON u.user_id = ua.user_id
            SET 
                u.method = ua.method,
                u.identifier = ua.identifier,
                u.email = ua.email,
                u.phone = ua.phone,
                u.is_email_verified = ua.is_email_verified,
                u.created_date = ua.created_date,
                u.updated_date = ua.updated_date,
                u.last_password_change = ua.last_password_change,
                u.failed_attempts = ua.failed_attempts,
                u.locked_until = ua.locked_until,
                u.mfa_secret = ua.mfa_secret
        ");

        // Видаляємо зайві колонки з user_auth
        Schema::table('user_auth', function (Blueprint $table) {
            $table->dropColumn([
                'method',
                'identifier',
                'email',
                'phone',
                'is_email_verified',
                'created_date',
                'updated_date',
                'last_password_change',
                'failed_attempts',
                'locked_until',
                'mfa_secret',
                'login'
            ]);

            $table->string('username')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'method',
                'identifier',
                'email',
                'phone',
                'is_email_verified',
                'created_date',
                'updated_date',
                'last_password_change',
                'failed_attempts',
                'locked_until',
                'mfa_secret'
            ]);
        });

        // Повертаємо колонки в user_auth
        Schema::table('user_auth', function (Blueprint $table) {
            $table->enum('method', ['email', 'phone', 'google', 'apple', 'facebook'])->nullable();
            $table->string('identifier')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_email_verified')->default(false);
            $table->timestamp('created_date')->nullable();
            $table->timestamp('updated_date')->nullable();
            $table->timestamp('last_password_change')->nullable();
            $table->integer('failed_attempts')->default(0);
            $table->timestamp('locked_until')->nullable();
            $table->string('mfa_secret')->nullable();

            $table->dropColumn('username');
        });
    }
};
