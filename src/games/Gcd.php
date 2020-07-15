<?php

namespace Brain\Games\Gcd;

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
    $questionsCount = 3;
    $questions = [];

    for ($questionIndex = 0; $questionIndex < $questionsCount; $questionIndex++) {
        $firstOperand = mt_rand(1, 100);
        $secondOperand = mt_rand(1, 100);

        $currentAnswer = getGcd($firstOperand, $secondOperand);
        $currentQuestion = "{$firstOperand} {$secondOperand}";

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $questionIndex -= 1;
        }
    }
    \Brain\Games\Engine\startUp(CONDITION, $questions);
}
