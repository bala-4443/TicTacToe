<?php

require_once __DIR__ . '/Board.php';
require_once __DIR__ . '/GameStatus.php';
require_once __DIR__ . '/Move.php';

class Game {
    private $board;
    private $currentPlayer;

    public function __construct() {
        $this->board = new Board();
        $this->currentPlayer = 'X';
    }

    public function placePiece($i, $j) {
        if ($this->board->placeMove(new Move($i, $j, $this->currentPlayer))) {
            $this->currentPlayer = ($this->currentPlayer == 'X') ? 'O' : 'X';
            return true;
        }
        return false;
    }

    public function getStatus() {
        $b = $this->board->getBoard();

        // Check rows, columns, and diagonals
        for ($i = 0; $i < 3; $i++) {
            if ($b[$i][0] != ' ' && $b[$i][0] == $b[$i][1] && $b[$i][1] == $b[$i][2]) {
                return ($b[$i][0] == 'X') ? GameStatus::X_WON : GameStatus::O_WON;
            }
            if ($b[0][$i] != ' ' && $b[0][$i] == $b[1][$i] && $b[1][$i] == $b[2][$i]) {
                return ($b[0][$i] == 'X') ? GameStatus::X_WON : GameStatus::O_WON;
            }
        }

        if ($b[0][0] != ' ' && $b[0][0] == $b[1][1] && $b[1][1] == $b[2][2]) {
            return ($b[0][0] == 'X') ? GameStatus::X_WON : GameStatus::O_WON;
        }

        if ($b[0][2] != ' ' && $b[0][2] == $b[1][1] && $b[1][1] == $b[2][0]) {
            return ($b[0][2] == 'X') ? GameStatus::X_WON : GameStatus::O_WON;
        }

        if ($this->board->isFull()) {
            return GameStatus::DRAW;
        }

        return GameStatus::IN_PROGRESS;
    }

    public function getBoard() {
        return $this->board;
    }
}
