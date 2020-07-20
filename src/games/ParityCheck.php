<?php

namespace Brain\Games\ParityCheck;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"';

function isEven($value)
{
    return  $value % 2 == 0 ? true : false;
}

function run()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = isEven($currentQuestion) ? 'yes' : 'no';
        $gameData[] = [(string) $currentQuestion, $currentAnswer];
    }
    
    runGame(DESCRIPTION, $gameData);
}
