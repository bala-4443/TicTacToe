<?php

require_once __DIR__ . '/ConsoleRunner.php';

class TicTacToeApplication {
    public static function main() {
        $consoleRunner = new ConsoleRunner();
        $consoleRunner->run();
    }
}

TicTacToeApplication::main();
