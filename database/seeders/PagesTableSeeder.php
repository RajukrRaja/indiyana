<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'title' => 'About Us',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Contact Us',
                'status' => 'Draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Privacy Policy',
                'status' => 'Archived',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Terms of Service',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
