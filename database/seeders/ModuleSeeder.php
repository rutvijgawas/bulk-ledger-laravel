<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Module::factory()->create([
            'module_name' => 'academic',
            'module_id' => 1,
        ]);
        
        Module::factory()->create([
            'module_name' => 'academicmisc',
            'module_id' => 11,
        ]);

        Module::factory()->create([
            'module_name' => 'hostel',
            'module_id' => 2,
        ]);
        
        Module::factory()->create([
            'module_name' => 'hostelmisc',
            'module_id' => 22,
        ]);

        Module::factory()->create([
            'module_name' => 'transport',
            'module_id' => 3,
        ]);
        
        Module::factory()->create([
            'module_name' => 'transportmisc',
            'module_id' => 33,
        ]);
    }
}
