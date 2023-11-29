<?php

namespace Database\Seeders;
use App\Models\Department;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public $timestamps = false;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Country::create([
            'CountryName'=>"Indonesia",
            'Continent'=>"Asia",
            'Currency'=>"IDR",
            "status"=>1

        ]);
        Department::create([
            'DeptName'=>"admin",
            'CountryId'=>1,
            "status"=>1
        ]);
    }
}
