<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Franchise;
use App\FranchiseWorkingDay;
use App\ArenaType;
use App\Arena;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(App\User::class, 10)->create()->each(function ($user) {
        	//$user->arenas()->save(factory(App\Arena::class)->make());
        });
        factory(App\Franchise::class, 10)->create()->each(function ($franchise) {
        	
        });
        factory(App\FranchiseWorkingDay::class, 10)->create()->each(function ($franchise_working_day) {
        	
        });
        factory(App\ArenaType::class, 5)->create()->each(function ($arena_type) {
        	
        });
        factory(App\Arena::class, 30)->create()->each(function ($arena) {
        	
        });
    }
}
