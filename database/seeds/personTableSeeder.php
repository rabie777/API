<?php

use Illuminate\Database\Seeder;
use App\Persone;
class personTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Persone::class,50)->create();
    }
}
