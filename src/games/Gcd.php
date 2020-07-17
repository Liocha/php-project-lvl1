<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function getGcd($a, $b)
{
    while ($a != 0 && $b != 0) {
        if ($a > $b) {
            $a = $a % $b;
        } else {
            $b = $b % $a;
        }
    }

    return $a + $b;
}

function run()
{
    $questions = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstOperand = mt_rand(1, 100);
        $secondOperand = mt_rand(1, 100);

        $currentAnswer = getGcd($firstOperand, $secondOperand);
        $currentQuestion = "{$firstOperand} {$secondOperand}";

        $questions[$currentQuestion] =  $currentAnswer;
    }
    runGame(CONDITION, $questions);
}
