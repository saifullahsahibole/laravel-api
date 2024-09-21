<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a single project entry
        Project::create([
            'name' => 'Project Alpha',
            'department' => 'Engineering',
            'status' => 'active',
            'start_date' => '2023-01-01',
            'end_date' => '2023-12-31',
        ]);

        // You can add more projects if needed
    }
}
