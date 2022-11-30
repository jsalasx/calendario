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
         $this->call(UsersSeeder::class);
         $this->call(UserPlansSeeder::class);
         $this->call(ServicesSeeder::class);
         $this->call(RoutesSeeder::class);
         $this->call(RouteDataSeeder::class);
         $this->call(ReservationsSeeder::class);
         $this->call(CalendarsSeeder::class);
         $this->call(CalendarDaysDisabledSeeder::class);

    }
}
