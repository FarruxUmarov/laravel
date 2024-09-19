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
        Schema::table('users', function (Blueprint $table) {
            $table->string('position')->after('password');
            $table->enum('gender', ['male', 'female'])->after('position');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->renameColumn('name', 'username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('position');
            $table->dropColumn('gender');
            $table->timestamp('email_verified_at');
            $table->string('remember_token');
            $table->renameColumn('username', 'name');
        });
    }
};
