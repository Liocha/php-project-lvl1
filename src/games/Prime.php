<?php

namespace Brain\Games\Prime;

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
    $condition = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $arrayOfQuestions = [];
    for ($i = 0; $i < 3; $i++) {
        $val = mt_rand(1, 100);
        $answer = isPrime($val) ? 'yes' : 'no';

        if (!array_key_exists($val, $arrayOfQuestions)) {
            $arrayOfQuestions[$val] =  $answer;
        } else {
            $i -= 1;
        }
    }
    \Brain\Games\Engine\run($condition, $arrayOfQuestions);
}
