<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function even(): void
{
    $numbers = rand(1, 100);
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $numbers = rand(1, 100);
        line("Question: %s", $numbers);
        $answer = prompt('Your answer');
        if ($numbers % 2 === 0 && $answer === 'yes') {
            line('Correct!');
        } elseif ($numbers % 2 !== 0 && $answer === 'no') {
            line('Correct!');
        } else {
            $correctAnswer = $numbers % 2 === 0 ? 'yes' : 'no';
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
