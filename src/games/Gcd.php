<?php

namespace Brain\Games\Gcd;

function gcd($a, $b)
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
    $condition = 'Find the greatest common divisor of given numbers.';
    $arrayOfQuestions = [];
    for ($i = 0; $i < 3; $i++) {
        $first = mt_rand(1, 100);
        $second = mt_rand(1, 100);

        $answer = gcd($first, $second);
        $question = "{$first} {$second}";

        if (!array_key_exists($question, $arrayOfQuestions)) {
            $arrayOfQuestions[$question] =  $answer;
        } else {
            $i -= 1;
        }
    }
    \Brain\Games\Engine\run($condition, $arrayOfQuestions);
}
