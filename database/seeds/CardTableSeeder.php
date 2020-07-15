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
        $suits = ['H','S','C','H'];
        $ranks =array_merge(['J','Q','K','A'], range("2", "10"));
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
