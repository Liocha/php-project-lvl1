<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runCli;

use const Brain\Engine\QUESTIONSCOUNT;

const CONDITION = 'What number is missing in the progression?';

function getProgression($first, $d)
{
    $resault = [];
    $elCount = 10;
    for ($i = 1; $i <= $elCount; $i++) {
        $resault[] = $first  + $i * $d;
    }

    return $resault;
}

function run()
{
    $questions = [];
    $hidElMask = "..";

    for ($i = 0; $i < QUESTIONSCOUNT; $i++) {
        $startNum = mt_rand(1, 10);
        $progressionDiff = mt_rand(1, 10);
        $progression = getProgression($startNum, $progressionDiff);
        $numHideEl = array_rand($progression);
        $currentAnswer = $progression[$numHideEl];
        $progression[$numHideEl] = $hidElMask;

        $currentQuestion = implode($progression, ' ');

        if (!array_key_exists($currentQuestion, $questions)) {
            $questions[$currentQuestion] =  $currentAnswer;
        } else {
            $i -= 1;
        }
    }
    runCli(CONDITION, $questions);
}
