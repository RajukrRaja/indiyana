<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $table = 'company_info'; // Ensure this matches your DB table name
    protected $fillable = ['company_name', 'tagline', 'description', 'header_image', 'is_active'];
}
