<?php

namespace Brain\Games\Progression;

use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';

function progression($amountElements, $first, $d)
{
    $resault = [];
    for ($i = 1; $i <= $amountElements; $i++) {
        $resault[] = $first  + $i * $d;
    }

    return $resault;
}

function run()
{
    $gameData = [];
    $maskHideElement = "..";
    $amountElements = 10;

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNum = mt_rand(1, 10);
        $progressionDiff = mt_rand(1, 10);
        $progression = progression($amountElements, $startNum, $progressionDiff);
        $numHideElement = array_rand($progression);
        $currentAnswer = $progression[$numHideElement];
        $progression[$numHideElement] = $maskHideElement;

        $currentQuestion = implode($progression, ' ');

        $gameData[] = [$currentQuestion, (string) $currentAnswer];
    }
    runGame(DESCRIPTION, $gameData);
}
