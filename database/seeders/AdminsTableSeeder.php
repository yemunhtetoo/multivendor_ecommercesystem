<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id'=>2,'name'=>'John','type'=>'vendor','vendor_id'=>1,'mobile'=>'09123456789','email'=>'john@admin.com','password'=>'$2a$12$UYO/REwLhWq0eR.yzXiw9uznI9Cj0t0auemv74K5vp5vmfEX4fDI2','image'=>'','status'=>0
            ],
        ];
        Admin::insert($adminRecords);
    }
}
