<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function run($condition, $arrayOfQuestions)
{
    line('Welcome to the Brain Game!');
    line($condition);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    foreach ($arrayOfQuestions as $q => $a) {
        line("Question: $q");
        $answer = prompt("Your answer");
        if ($answer === (string) $a) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$a}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}
