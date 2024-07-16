<?php

class Move {
    public $i;
    public $j;
    public $piece;

    public function __construct($i, $j, $piece) {
        $this->i = $i;
        $this->j = $j;
        $this->piece = $piece;
    }
}
