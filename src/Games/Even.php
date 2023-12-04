<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

function init(): void
{
    $gameName = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = function () {
        $question = rand(1, 100);
        $correctAnswer = $question % 2 === 0 ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    run($gameName, $gameData);
}
