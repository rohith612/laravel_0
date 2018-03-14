<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('users')->delete();
    	  User::create(array(
          'name'     => 'Chris Sevilleja',
          'username' => 'sevilayha',
          'email'    => 'chris@scotch.io',
          'password' => Hash::make('awesome'),
    	 ));
    }

    // create new seed
    // : php artisan make:seeder UsersTableSeeder
    // run the seeder
    // create the instance in DatabaseSeeder class and call the
    // : $this->call(UsersTableSeeder::class);
    // and run the cmd promt
    // : php artisan db:seed



}
