<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => Uuid::uuid1()->getHex(),
            'name'  => 'Administrator',
            'email' => 'administrator@dna-system.com',
            'password'  => Hash::make('bjm12345'),
            'remember_token' => Str::random(10)
        ]);
    }
}
