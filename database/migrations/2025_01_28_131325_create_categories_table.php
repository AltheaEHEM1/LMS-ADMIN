<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Ensures category names are unique
            $table->string('picture')->nullable(); // Nullable picture column
            $table->timestamps();
        });

        // Predefined categories with timestamps
        $now = now();
        $categories = [
            ['name' => 'Nonfiction', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Science', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'History', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Audiobook', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Humor', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Physics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Popular Science', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Historical', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Philosophy', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Unfinished', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Psychology', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Economics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Self Help', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Politics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sociology', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Astronomy', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Classics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Space', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Reference', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Trivia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comedy', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Education', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'British Literature', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Personal Development', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Leadership', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Productivity', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Technology', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Computer Science', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Entrepreneurship', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Computers', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Biography', 'created_at' => $now, 'updated_at' => $now],
        ];

        // Insert categories only if they do not already exist
        foreach ($categories as $category) {
            if (!DB::table('categories')->where('name', $category['name'])->exists()) {
                DB::table('categories')->insert($category);
            }
        }
    }


public function down()
    {
        Schema::dropIfExists('categories');
    }
};
