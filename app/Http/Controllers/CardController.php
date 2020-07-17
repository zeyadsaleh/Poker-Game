<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCardRequest;
use App\Services\GameServiceInterface;
class CardController extends Controller
{
    private $game;
    public function __construct(GameServiceInterface $gameServiceInterface)
    {
        $this->game = $gameServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $card = request()->isMethod('post') ? $this->game->draft() : null;
        $this->game->checkGame($card);
        $percentage = $this->game->percentage();
        
        return view('card.index', [
            'card' => $card,
            'percentage'=>$percentage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->game->reset();
        return view("card.create", 
        ['suits' => ['Hearts','Spades','Diamonds', 'Clubs'],
         'ranks' => array_merge(range("2", "10"), ['Jack', 'Queen', 'King', 'Ace'])
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $this->game->storeSlectedCard($request);
        return redirect()->route('cards.index');
    }


}
