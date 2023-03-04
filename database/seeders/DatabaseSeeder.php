<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


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
    $this->call(AdminSeeder::class);
    $this->call(RaceSeeder::class);
    $this->call(InsurerSeeder::class);
    $this->call(SponsorSeeder::class);
    $this->call(RunnerSeeder::class);
  }
}