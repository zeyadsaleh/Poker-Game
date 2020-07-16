<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCardRequest;
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("hello index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suits = ['Hearts','Spades','Diamonds', 'Clubs'];
        $ranks = array_merge(range("2", "10"), ['Jack', 'Queen', 'King', 'Ace']); 
        return view("card.create", 
        ['suits' => $suits,
         'ranks' => $ranks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $card = Card::where(['suit'=>$request->suit,'rank'=>$request->rank])->first();
        $request->session()->put('card', $card);
        return redirect()->route('cards.index');
    }


}
