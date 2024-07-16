<?php

require_once __DIR__ . '/Move.php';

class Board {
    public $board;

    public function __construct() {
        $this->board = array_fill(0, 3, array_fill(0, 3, ' '));
    }

    public function isFull() {
        foreach ($this->board as $row) {
            if (in_array(' ', $row)) {
                return false;
            }
        }
        return true;
    }

    public function getBoard() {
        return $this->board;
    }

    public function placeMove($move) {
        if ($this->board[$move->i][$move->j] == ' ') {
            $this->board[$move->i][$move->j] = $move->piece;
            return true;
        }
        return false;
    }

    public function __toString() {
        $output = "";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $output .= $this->board[$i][$j];
                if ($j < 2) $output .= "|";
            }
            $output .= "\n";
            if ($i < 2) $output .= "-----\n";
        }
        return $output;
    }
}
