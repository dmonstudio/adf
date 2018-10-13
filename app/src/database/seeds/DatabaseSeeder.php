<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'username' => 'admin',
            'password' => Hash::make('secret')
        ]);

        $this->call(DesignerSeeder::class);
        $this->call(ShowcaseSeeder::class);
    }
}
