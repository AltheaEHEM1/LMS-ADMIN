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
        // Create 'employees' table
        Schema::create('employees', function (Blueprint $table) { 
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('activate')->default(true); // Indicates if the employee account is active
            $table->boolean('cataloger')->default(false); // Role: cataloger
            $table->boolean('librarian')->default(false); // Role: librarian
            $table->boolean('admin')->default(false); // Role: admin
            $table->rememberToken();
            $table->timestamps();
        });
        
        if (!DB::table('employees')->where('email', 'rubenjrtbertuso@gmail.com')->exists()) {
            DB::table('employees')->insert([
                'name' => 'RubenBertuso',
                'email' => 'rubenjrtbertuso@gmail.com',
                'password' => Hash::make('benjr23'), // Replace 'securepassword' with a strong password
                'activate' => true,
                'cataloger' => true,
                'librarian' => true,
                'admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // Create 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Create 'sessions' table
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('employees'); // Updated to drop 'employees' table
    }
};
