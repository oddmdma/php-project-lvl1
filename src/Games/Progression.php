<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

function init():void
{
    $gameDescription = 'What number is missing in the progression?';
    $getGameData = function () {
        $progressionLength = 10;
        $firstNumber = rand(1, 100);
        $progressionStep = rand(1, 10);
        $progression = getProgression($firstNumber, $progressionStep, $progressionLength);
        $hiddenElementIndex = array_rand($progression);
        $correctAnswer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    run($gameDescription, $getGameData);
}

function getProgression(int $firstNumber, int $progressionStep, int $progressionLength): array
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $firstNumber + $progressionStep * $i;
    }
    return $progression;
}
