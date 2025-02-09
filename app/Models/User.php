<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    static public function getRecordUser($orderBy = 'created_at', $direction = 'desc', $limit = null)
    {
        // Build the query
        $query = self::select('users.*') // Select all columns from the 'users' table
            ->where('is_admin', '=', 0) // Fetch only non-admin users
            ->where('is_delete', '=', 0) // Exclude deleted users
            ->orderBy($orderBy, $direction); // Order the results by the specified column and direction
    
        // Check if pagination or limit should be applied
        if (!is_null($limit)) {
            $query->limit($limit); // Apply limit if provided
            return $query->get(); // Return results with limit
        }
    
        // Apply pagination (default 10 records per page)
        return $query->paginate(10);
    }
    
    
        

    
}
