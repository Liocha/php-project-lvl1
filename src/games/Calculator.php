<?php

namespace Brain\Games\Calculator;

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
    $questionsCount = 3;
    $questions = [];
    $signs = ['+', '*'];
   
    for ($questionIndex = 0; $questionIndex < $questionsCount; $questionIndex++) {
        $firstOperand = mt_rand(1, 100);
        $secondOperand = mt_rand(1, 100);
        $signNum = array_rand($signs);
        $sign = $signs[$signNum];

        $currentAnswer = calculate($firstOperand, $secondOperand, $sign);
        $currentQuestion = "{$firstOperand} {$sign} {$secondOperand}";

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $questionIndex -= 1;
        }
    }

    \Brain\Games\Engine\startUp(CONDITION, $questions);
}
