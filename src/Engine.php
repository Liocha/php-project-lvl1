<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const QUESTIONSCOUNT = 3;

function main($condition, $questions)
{
    line('Welcome to the Brain Game!');
    line($condition);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    foreach ($questions as $q => $a) {
        line("Question: $q");
        $answer = prompt("Your answer");
        if ($answer !== (string) $a) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$a}'.");
                line("Let's try again, {$name}!");
                return;
        }
        line("Correct!");
    }

    line("Congratulations, {$name}!");
}
