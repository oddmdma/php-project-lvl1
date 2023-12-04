<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

function init(): void
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $getGameData = function () {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $question = "{$firstNumber} {$secondNumber}";
        $correctAnswer = getGcd($firstNumber, $secondNumber);
        return [$question, $correctAnswer];
    };
    run($gameDescription, $getGameData);
}

function getGcd(int $firstNumber, int $secondNumber): int
{
    $minNumber = min($firstNumber, $secondNumber);
    for ($i = $minNumber; $i > 0; $i--) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            return $i;
        }
    }
    return 1;
}
