<?php

require_once __DIR__ . '/AI.php';
require_once __DIR__ . '/../models/Move.php';

class DumbAI implements AI {
    public function chooseMove($board) {
        // Implement dumb AI logic here (e.g., first available spot)
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board->getBoard()[$i][$j] == ' ') {
                    return new Move($i, $j, 'O');
                }
            }
        }
        return null;
    }
}
