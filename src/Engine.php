<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame($condition, $gameData)
{
    line('Welcome to the Brain Game!');
    line($condition);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: $question");
        $answer = prompt("Your answer");
        if ($answer !== $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
    }

    line("Congratulations, {$name}!");
}
