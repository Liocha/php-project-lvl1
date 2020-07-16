<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\main;

use const Brain\Engine\QUESTIONSCOUNT;

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
    $questionsCount = QUESTIONSCOUNT;
    $questions = [];

    for ($i = 0; $i < $questionsCount; $i++) {
        $firstOperand = mt_rand(1, 100);
        $secondOperand = mt_rand(1, 100);

        $currentAnswer = getGcd($firstOperand, $secondOperand);
        $currentQuestion = "{$firstOperand} {$secondOperand}";

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $i -= 1;
        }
    }
    main(CONDITION, $questions);
}
