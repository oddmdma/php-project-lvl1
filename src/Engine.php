<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function lose(string $name, string $result, string $correctAnswer): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $result, $correctAnswer);
    line("Let's try again, %s!", $name);
}

function win(string $name): void
{
    line("Congratulations, %s!", $name);
}

function run(string $gameName, callable $gameData): void
{
    $name = greet();
    line($gameName);
    $count = 0;
    while ($count < 3) {
        [$question, $correctAnswer] = $gameData();
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
            $count++;
        } else {
            lose($name, $answer, $correctAnswer);
            return;
        }
    }
    win($name);
}
