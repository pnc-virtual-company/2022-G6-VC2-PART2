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
            'firstName'=>'OUN',
            'lastName'=>'BAV',
            'role'=>'admin',
            'email'=>'oun.bav@student.passerellesnumeriques.org',
            'password'=>bcrypt('12345678')];
        User::create($user);
    }
}
