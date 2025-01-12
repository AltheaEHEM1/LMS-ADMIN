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
            $table->string('first_name'); // User's first name
            $table->string('middle_name')->nullable(); // User's middle name
            $table->string('last_name'); // User's last name
            $table->string('email')->unique(); // User's email address
            $table->string('password'); // User's password (hashed)
            $table->string('phone_no'); // User's phone number
            $table->date('date_of_birth')->nullable(); // User's date of birth
            $table->text('address')->nullable(); // User's address
            $table->string('photo')->nullable(); // File path for the user's photo
            $table->boolean('activate')->default(false); // Indicates if the employee account is active
        
            // Access permissions based on the form
            $table->boolean('access_dashboard')->default(false); // Access to Dashboard
            $table->boolean('access_employee')->default(false); // Access to Employee management
            $table->boolean('access_reservation')->default(false); // Access to Reservation
            $table->boolean('access_catalog')->default(false); // Access to Catalog
            $table->boolean('access_members')->default(false); // Access to Members
            $table->boolean('access_circulations')->default(false); // Access to Circulations
            $table->boolean('access_circulation_reports')->default(false); // Access to Circulations Reports
            $table->boolean('access_member_reports')->default(false); // Access to Members Reports
            $table->boolean('access_overdue_reports')->default(false); // Access to Overdue Reports
            $table->boolean('access_catalog_reports')->default(false); // Access to Catalog Reports
        
            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable(); // ID of the user who created this record
            $table->timestamps();
        
            // Foreign key for created_by field
            $table->foreign('created_by')->references('id')->on('employees')->onDelete('cascade');
        });
        
        if (!DB::table('employees')->where('email', 'rubenjrtbertuso@gmail.com')->exists()) {
            DB::table('employees')->insert([
                'first_name' => 'Ruben',
                'middle_name' => 'Jr',
                'last_name' => 'Bertuso',
                'email' => 'rubenjrtbertuso@gmail.com',
                'password' => Hash::make('benjr23'), // Replace 'benjr23' with a strong password
                'phone_no' => '+639123456789', // Example phone number
                'date_of_birth' => '1985-01-01', // Example date of birth
                'address' => '123 Main Street, City, Country', // Example address
                'photo' => null, // Set to null if no photo is provided initially
                'activate' => true,
                'access_dashboard' => true,
                'access_employee' => true,
                'access_reservation' => true,
                'access_catalog' => true,
                'access_members' => true,
                'access_circulations' => true,
                'access_circulation_reports' => true,
                'access_member_reports' => true,
                'access_overdue_reports' => true,
                'access_catalog_reports' => true,
                'created_by' => null, // Set to null if no creator is specified
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
