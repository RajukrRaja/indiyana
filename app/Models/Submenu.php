<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model {
    use HasFactory;

    protected $fillable = ['name', 'url', 'menu_id', 'order'];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
}
