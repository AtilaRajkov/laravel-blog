<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // resets the users table
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('users')->delete();

    // generate 3 users/authors
    DB::table('users')->insert([
      [
        'name' => 'John Doe',
        'email' => 'johndoe@test.com',
        'password' => Hash::make('secret')
      ],
      [
        'name' => 'Jane Doe',
        'email' => 'janedoe@test.com',
        'password' => Hash::make('secret')
      ],
      [
        'name' => 'Edo Masaur',
        'email' => 'edomasaur@test.com',
        'password' => Hash::make('secret')
      ],
    ]);

  }
}
