<?php

namespace Brain\Games\Progression;

function progression($start, $d)
{
    $resault = [];
    for ($i = 1; $i <= 10; $i++) {
        $resault[] = $start  + $i * $d;
    }

    return $resault;
}

function run()
{
    $condition = 'What number is missing in the progression?';
    $arrayOfQuestions = [];
    for ($i = 0; $i < 3; $i++) {
        $start = mt_rand(1, 10);
        $d = mt_rand(1, 10);
        $progression = progression($start, $d);
        $numHideEl = array_rand($progression);
        $answer = $progression[$numHideEl];
        $progression[$numHideEl] = '..';

        $question = implode($progression, ' ');

        if (!array_key_exists($question, $arrayOfQuestions)) {
            $arrayOfQuestions[$question] =  $answer;
        } else {
            $i -= 1;
        }
    }
    \Brain\Games\Engine\run($condition, $arrayOfQuestions);
}
