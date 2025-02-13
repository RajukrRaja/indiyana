<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->nullable();
            $table->integer('order')->default(0); // Order of menu items
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('menus');
    }
};
