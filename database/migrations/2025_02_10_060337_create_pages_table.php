<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id(); // ID column
            $table->string('title'); // Title column
            $table->string('slug')->unique(); // Slug column
            $table->text('content')->nullable(); // Content column (optional)
            $table->enum('status', ['Published', 'Draft', 'Archived'])->default('Draft'); // Status column
            $table->string('tags')->nullable(); // Tags column
            $table->unsignedBigInteger('views')->default(0); // Views column
            $table->timestamps(); // Created At and Updated At columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
