<?php

namespace Brain\Games\Calculator;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';

function calculate($first, $second, $sign)
{
    switch ($sign) {
        case '*':
            return $first * $second;
        case '+':
            return $first + $second;
        default:
            throw new \Exception('Unknown operation symbol ' . $sign);
    }
}

function run()
{
    $questions = [];
    $signs = ['+', '*'];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstOperand = mt_rand(1, 100);
        $secondOperand = mt_rand(1, 100);
        $signNum = array_rand($signs);
        $sign = $signs[$signNum];

        $currentAnswer = calculate($firstOperand, $secondOperand, $sign);
        $currentQuestion = "{$firstOperand} {$sign} {$secondOperand}";

        $questions[$currentQuestion] =  $currentAnswer;
    }

    runGame(DESCRIPTION, $questions);
}
