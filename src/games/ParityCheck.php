<?php

namespace Brain\Games\ParityCheck;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no"';

function run()
{
    $questionsCount = 3;
    $questions = [];

    for ($questionIndex = 0; $questionIndex < $questionsCount; $questionIndex++) {
        $currentQuestion = mt_rand(1, 100);
        $currentAnswer = $currentQuestion % 2 == 0 ? 'yes' : 'no';
        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $questionIndex -= 1;
        }
    }
    
    \Brain\Games\Engine\startUp(CONDITION, $questions);
}
