<?php

namespace Brain\Games\ParityCheck;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no"';

function run()
{
    $questions = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = $currentQuestion % 2 == 0 ? 'yes' : 'no';
        $questions[$currentQuestion] =  $currentAnswer;
    }
    
    runGame(CONDITION, $questions);
}
