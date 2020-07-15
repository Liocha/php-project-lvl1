<?php

namespace Brain\Games\Prime;

const CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
    $questionsCount = 3;
    $questions = [];

    for ($questionIndex = 0; $questionIndex < $questionsCount; $questionIndex++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = isPrime($currentQuestion) ? 'yes' : 'no';

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $questionIndex -= 1;
        }
    }
    \Brain\Games\Engine\startUp(CONDITION, $questions);
}
