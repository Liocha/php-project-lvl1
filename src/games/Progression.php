<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const CONDITION = 'What number is missing in the progression?';

function getProgression($first, $d)
{
    $resault = [];
    $amountElements = 10;
    for ($i = 1; $i <= $amountElements; $i++) {
        $resault[] = $first  + $i * $d;
    }

    return $resault;
}

function run()
{
    $questions = [];
    $maskHideEl = "..";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNum = mt_rand(1, 10);
        $progressionDiff = mt_rand(1, 10);
        $progression = getProgression($startNum, $progressionDiff);
        $numHideEl = array_rand($progression);
        $currentAnswer = $progression[$numHideEl];
        $progression[$numHideEl] = $maskHideEl;

        $currentQuestion = implode($progression, ' ');

        $questions[$currentQuestion] =  $currentAnswer;
    }
    runGame(CONDITION, $questions);
}
