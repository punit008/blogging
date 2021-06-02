<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class author extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'author@vardaam.com/demo',
                'email' => 'author@vardaam.com/demo',
                'password' => 'author@vardaam.com/demo'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin123'
            ],
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => 'test123'
            ]
        ];

        foreach ($authors as $author){

            User::create(array(
                'name' => $author['name'],
                'email' => $author['email'],
                'password' => Hash::make($author['password'])
            ));

        }
    }
}
