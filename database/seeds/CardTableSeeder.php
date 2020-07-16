<?php

use Illuminate\Database\Seeder;
use App\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suits = ['H','S','D','C'];
        $ranks =array_merge( range("2", "10"), ['J','Q','K','A']);
        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                Card::create([
                    'suit'=>$suit,
                    'rank'=>$rank
                ]);
            }
        }
    }
}
