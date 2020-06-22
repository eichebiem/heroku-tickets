<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();
        Status::create([
            'status' => "Open"
        ]);
        Status::create([
            'status' => "In Progress"
        ]);
        Status::create([
            'status' => "Closed"
        ]);
    }
}
