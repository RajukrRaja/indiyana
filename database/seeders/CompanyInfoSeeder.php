<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_info')->insert([
            [
                'company_name' => 'Indiana Infotech Pvt. Ltd.',
                'tagline' => 'Transforming Ideas into Digital Solutions',
                'description' => 'We provide custom software, mobile apps, ERP solutions, and more.',
                'header_image' => 'header1.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_name' => 'Tech Innovators',
                'tagline' => 'Innovate, Implement, Impact',
                'description' => 'Leading technology solutions provider for businesses worldwide.',
                'header_image' => 'header2.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_name' => 'NextGen Software',
                'tagline' => 'Bringing the Future Closer',
                'description' => 'AI-driven software solutions for businesses of all sizes.',
                'header_image' => 'header3.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_name' => 'Smart Solutions',
                'tagline' => 'Smart Technology, Smarter Business',
                'description' => 'Cutting-edge software and cloud services to boost productivity.',
                'header_image' => 'header4.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_name' => 'FutureTech Pvt. Ltd.',
                'tagline' => 'Empowering Businesses with Tech',
                'description' => 'Providing advanced IT solutions, cloud computing, and cybersecurity.',
                'header_image' => 'header5.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'company_name' => 'Hello',
                'tagline' => 'sadfvgbg',
                'description' => 'sxcdvfbgvctnhyjmunbn',
                'header_image' => 'homepage_images/vOBf4LPQNxUFrdLEmqZC92ijjSMRF8YMk0...',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
