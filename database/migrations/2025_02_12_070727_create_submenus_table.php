<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->nullable();
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // Foreign key linking to menus
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('submenus');
    }
};
