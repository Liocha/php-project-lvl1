<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';

function makeProgression($amountElements, $first, $step)
{
    $progression = [];
    for ($i = 1; $i <= $amountElements; $i++) {
        $progression[] = $first  + $i * $step;
    }

    return $progression;
}

function run()
{
    $gameData = [];
    $maskHideElement = "..";
    $amountElements = 10;

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNum = mt_rand(1, 10);
        $progressionDiff = mt_rand(1, 10);
        $progression = makeProgression($amountElements, $startNum, $progressionDiff);
        $numHideElement = array_rand($progression);
        $currentAnswer = (string) $progression[$numHideElement];
        $progression[$numHideElement] = $maskHideElement;

        $currentQuestion = implode($progression, ' ');

        $gameData[] = [$currentQuestion, $currentAnswer];
    }
    runGame(DESCRIPTION, $gameData);
}
