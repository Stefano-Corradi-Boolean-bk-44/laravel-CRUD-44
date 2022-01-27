<?php

use App\Pasta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_pastas = config('products');

        foreach ($array_pastas as $pasta) {

            $new_pasta = new Pasta();
            $new_pasta->title = $pasta['titolo'];
            $new_pasta->slug = Str::slug($new_pasta->title, '-');
            $new_pasta->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non inventore iure accusamus hic amet, culpa molestiae? Molestias dicta voluptas accusantium inventore dolorum autem quis distinctio explicabo consequuntur nostrum! Ullam, natus!';
            $new_pasta->type = $pasta['tipo'];
            $new_pasta->image = $pasta['src'];
            $new_pasta->coocking_time = $pasta['cottura'];

            $new_pasta->save();
        }
    }
}
