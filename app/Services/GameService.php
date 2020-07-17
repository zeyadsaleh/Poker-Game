<?php

namespace App\Services;

use App\Card; 
use App\Services\GameServiceInterface;
use Illuminate\Support\Facades\DB;

class GameService implements GameServiceInterface
{
    public function reset(){
        DB::table('cards')->update(array('drafted' => false));
        session()->put(['Wins' => false]);
        session()->forget(['card']);
    }

    public function storeSlectedCard($selectedCard){
        $card = Card::where(['suit'=>$selectedCard->suit,'rank'=>$selectedCard->rank])->first();
        session()->put('card', $card);
    }


    public function draft()
    {
        $card = Card::where(['drafted' => false])->inRandomOrder()->first();
        $card->update(['drafted' => true]);
        return $card;
    }

    public function checkGame($card)
    {
        $selectedCard = session('card');
        if ($card && $card->id === $selectedCard->id) {
            session(['Wins' => true]);
        }
    }

    public function percentage()
    {
        $draftedCards = Card::where(['drafted' => true])->count();
        return round(100 / (52 - ($draftedCards)), 2);
    }
}
