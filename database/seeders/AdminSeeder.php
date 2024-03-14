<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Admin::factory()->count(1)->create();
    }
}
