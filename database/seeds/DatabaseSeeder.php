<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'sampleadmin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('sampleadmin'),
        ]);
    }
}
