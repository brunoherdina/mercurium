<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          =>  'Bruno Herdina',
            'email'         =>  'brunoherdina@outlook.com',
            'password'      =>  bcrypt('1234'),
            'login'         =>  'brunoherdina',
            'employee_position_id' =>  '2'

        ]);
    }
}
