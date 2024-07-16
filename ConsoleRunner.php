<?php

require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../interfaces/AI.php';
require_once __DIR__ . '/../interfaces/DumbAI.php';

class ConsoleRunner {
    public function run() {
        $game = new Game();
        $ai = new DumbAI();
        
        while ($game->getStatus() == GameStatus::IN_PROGRESS) {
            echo $game->getBoard();
            echo "Enter your move (row and column, starting from 1): ";
            $input = trim(fgets(STDIN));
            $move = explode(" ", $input);

            if (count($move) == 2 && is_numeric($move[0]) && is_numeric($move[1])) {
                $i = (int)$move[0] - 1;
                $j = (int)$move[1] - 1;

                if ($i >= 0 && $i < 3 && $j >= 0 && $j < 3) {
                    if ($game->placePiece($i, $j)) {
                        if ($game->getStatus() == GameStatus::IN_PROGRESS) {
                            $aiMove = $ai->chooseMove($game->getBoard());
                            $game->placePiece($aiMove->i, $aiMove->j);
                        }
                    } else {
                        echo "Invalid move. Spot already taken. Try again.\n";
                    }
                } else {
                    echo "Invalid move. Coordinates out of bounds. Try again.\n";
                }
            } else {
                echo "Invalid input. Please enter two numbers separated by a space. Try again.\n";
            }
        }

        echo $game->getBoard();
        $status = $game->getStatus();
        if ($status == GameStatus::X_WON) {
            echo "You won!\n";
        } elseif ($status == GameStatus::O_WON) {
            echo "AI won!\n";
        } else {
            echo "It's a draw!\n";
        }
    }
}
