<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('heading'); // Main heading
            $table->text('description'); // Detailed description
            $table->string('image_main')->nullable(); // Main image path
            $table->string('image_small')->nullable(); // Small image path
            $table->string('bullet_points')->nullable(); // First bullet point (optional)
            $table->string('bullet_points_2')->nullable(); // Second bullet point (optional)
            $table->string('bullet_points_3')->nullable(); // Third bullet point (optional)
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps(); // Created at & Updated at
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
