<?php

namespace Brain\Games\Prime;

use function Brain\Engine\main;

use const Brain\Engine\QUESTIONSCOUNT;

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
    $questionsCount = QUESTIONSCOUNT;
    $questions = [];

    for ($i = 0; $i < $questionsCount; $i++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = isPrime($currentQuestion) ? 'yes' : 'no';

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $i -= 1;
        }
    }
    main(CONDITION, $questions);
}
