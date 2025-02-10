<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // Table name (if it differs from 'pages')
    protected $table = 'pages';

    // Fillable fields for mass assignment
    protected $fillable = ['title', 'status'];

    // Function to get the human-readable status
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'Published' => '🟢 Published',
            'Draft' => '🟡 Draft',
            'Archived' => '🔴 Archived',
            default => 'Unknown',
        };
    }

    // Function to format the created_at date
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d M Y, h:i A');
    }

    // Function to check if the page is published
    public function isPublished()
    {
        return $this->status === 'Published';
    }

    // Scope to filter only published pages
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }

    // Scope to filter by a search query
    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'LIKE', '%' . $term . '%');
    }
}
