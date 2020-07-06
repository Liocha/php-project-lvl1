<?php

namespace Brain\Games\Calculator;

function calc($first, $second, $sign)
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
    $condition = 'What is the result of the expression?';
    $arrayOfQuestions = [];
    $signs = ['+', '*'];
   
    for ($i = 0; $i < 3; $i++) {
        $first = mt_rand(1, 100);
        $second = mt_rand(1, 100);
        $rand_keys = array_rand($signs);
        $sign = $signs[$rand_keys];

        $answer = calc($first, $second, $sign);
        $question = "{$first} {$sign} {$second}";

        if (!array_key_exists($question, $arrayOfQuestions)) {
            $arrayOfQuestions[$question] =  $answer;
        } else {
            $i -= 1;
        }
    }

    \Brain\Games\Engine\run($condition, $arrayOfQuestions);
}
