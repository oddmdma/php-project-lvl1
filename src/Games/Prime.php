<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

function init():void
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getGameData = function () {
        $question = rand(1, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    run($gameDescription, $getGameData);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
