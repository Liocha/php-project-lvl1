<?php

namespace Brain\Games\Calculator;

use function Brain\Engine\main;

use const Brain\Engine\QUESTIONSCOUNT;

const CONDITION = 'What is the result of the expression?';

function calculate($first, $second, $sign)
{
    switch ($sign) {
        case '*':
            return $first * $second;
        default:
            return $first + $second;
    }
}

function run()
{
    $questionsCount = QUESTIONSCOUNT;
    $questions = [];
    $signs = ['+', '*'];
   
    for ($i = 0; $i < $questionsCount; $i++) {
        $firstOperand = mt_rand(1, 100);
        $secondOperand = mt_rand(1, 100);
        $signNum = array_rand($signs);
        $sign = $signs[$signNum];

        $currentAnswer = calculate($firstOperand, $secondOperand, $sign);
        $currentQuestion = "{$firstOperand} {$sign} {$secondOperand}";

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $i -= 1;
        }
    }

    main(CONDITION, $questions);
}
