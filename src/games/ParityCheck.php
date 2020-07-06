<?php

namespace Brain\Games\ParityCheck;

function run()
{
    $condition = 'Answer "yes" if the number is even, otherwise answer "no"';
    $arrayOfQuestions = [];
    for ($i = 0; $i < 3; $i++) {
        $valRand = mt_rand(1, 100);
        $answer = $valRand % 2 == 0 ? 'yes' : 'no';
        if (!array_key_exists($valRand, $arrayOfQuestions)) {
            $arrayOfQuestions[$valRand] =  $answer;
        } else {
            $i -= 1;
        }
    }
    
    \Brain\Games\Engine\run($condition, $arrayOfQuestions);
}
