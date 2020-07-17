<?php

namespace Brain\Games\ParityCheck;

use function Brain\Engine\runCli;

use const Brain\Engine\QUESTIONSCOUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no"';

function run()
{
    $questions = [];

    for ($i = 0; $i < QUESTIONSCOUNT; $i++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = $currentQuestion % 2 == 0 ? 'yes' : 'no';
        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $i -= 1;
        }
    }
    
    runCli(CONDITION, $questions);
}
