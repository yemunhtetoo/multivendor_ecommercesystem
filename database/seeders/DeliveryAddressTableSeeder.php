<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords = [
            ['id'=>1,'user_id'=>1,'name'=>'Amit Gupta','address'=>'123-a','city'=>'New Delhi','state'=>'Delhi','country'=>'India','pincode'=>10001,'mobile'=>980999999,'status'=>1],
            ['id'=>2,'user_id'=>1,'name'=>'Amit Gupta','address'=>'123-a','city'=>'New Delhi','state'=>'Delhi','country'=>'India','pincode'=>10001,'mobile'=>980999999,'status'=>1],
        ];
        DeliveryAddress::insert($deliveryRecords);
    }
}
