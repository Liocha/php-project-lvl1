<?php

namespace Brain\Games\Prime;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($val)
{
    if ($val <= 1) {
        return false;
    };

    for ($i = 2; $i <= $val / 2; $i++) {
        if ($val % $i === 0) {
            return false;
        }
    }

    return true;
}

function run()
{
    $questions = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = isPrime($currentQuestion) ? 'yes' : 'no';

        $questions[$currentQuestion] =  $currentAnswer;
    }
    runGame(DESCRIPTION, $questions);
}
