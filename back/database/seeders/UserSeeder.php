<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            'firstName'=>'admin',
            'lastName'=>'',
            'role'=>'admin',
            'status'=>'approve',
            'email'=>'vc2group6.2022@gmail.com',
            'password'=>bcrypt('admin!@#$')];
        User::create($user);
    }
}
