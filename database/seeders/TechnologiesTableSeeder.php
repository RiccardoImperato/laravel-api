<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'php', 'javascript'];

        foreach ($technologies as $technology) {

            $_technology = new Technology();
            $_technology->title = $technology;
            $_technology->slug = Str::of($technology)->slug('-');
            $_technology->save();
        }
    }
}
