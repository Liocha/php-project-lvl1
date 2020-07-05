<?php

namespace Brain\Games\ParityCheck;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no"');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < 3; $i++) {
        $valRand = mt_rand(1, 100);
        line("Question: {$valRand}");
        $answer = prompt("Your answer");
        $correctAnswer = $valRand % 2 == 0 ? 'yes' : 'no';
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}
