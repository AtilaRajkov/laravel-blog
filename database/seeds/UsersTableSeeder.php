<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory;

class UsersTableSeeder extends Seeder
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
    DB::table('users')->truncate();

    $faker = Factory::create();

//    DB::table('users')->insert([
//      [
//        'name' => 'John Doe',
//        'email' => 'john@doe.com',
//        'password' => Hash::make('password'),
//        'email_verified_at' => now(),
//        'remember_token' => Str::random(10),
//        'created_at' => now(),
//        'updated_at' => now()
//      ]
//    ]);

    User::create([
      'name' => 'John Doe',
      'email' => 'john@doe.com',
      'password' => Hash::make('password'),
      'email_verified_at' => now(),
      'remember_token' => Str::random(10),
      'created_at' => now(),
      'updated_at' => now(),
      'bio' => $faker->text(rand(250, 300))
    ]);

    factory(User::class, 2)->create();
  }
}
