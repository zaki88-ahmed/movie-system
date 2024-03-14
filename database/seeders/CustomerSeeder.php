<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class
CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Customer::factory()->count(1)->create();
    }
}
