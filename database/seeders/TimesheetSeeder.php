<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timesheet;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a single timesheet entry linked to an existing user and project
        Timesheet::create([
            'user_id' => 1,  // Assume the user ID is 1 from UserSeeder
            'project_id' => 1,  // Assume the project ID is 1 from ProjectSeeder
            'task_name' => 'Development',
            'date' => '2023-09-21',
            'hours' => 8,
        ]);

        // You can add more timesheets if needed
    }
}
