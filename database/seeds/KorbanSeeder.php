<?php

use Illuminate\Database\Seeder;

class KorbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create(); //import library faker
      $limit = 20; //batasan berapa banyak data

      for ($i = 0; $i < $limit; $i++) {
          DB::table('korban')->insert([ //mengisi data di database
            'status_korban' => $faker->word,
            'nama_korban' => $faker->name,
          ]);
        }
    }
}
