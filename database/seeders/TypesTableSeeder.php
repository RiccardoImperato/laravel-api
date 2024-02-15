<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Frontend', 'Backend', 'Altro'];

        foreach ($types as $type) {

            $_type = new Type();
            $_type->title = $type;
            $_type->slug = Str::of($type)->slug('-');

            $_type->save();
        }
    }
}
