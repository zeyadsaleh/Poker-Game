<?php

namespace App\Services;

interface GameServiceInterface {
    public function reset();
    public function storeSlectedCard($selecedCard);
    public function draft();
    public function checkGame($card);
    public function percentage();
}