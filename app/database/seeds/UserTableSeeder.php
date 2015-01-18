<?php
class UserTableSeeder extends Seeder
{

    public function run()
    {
        User::create(array(
            'first' => 'Jarad',
            'last' => 'Huffman',
            'username' => 'jbhuffman',
            'password' => Hash::make('password'),
            'email' => 'jbhuffman@gmail.com'
        ));
    }
}
