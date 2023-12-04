<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

function init(): void
{
    $gameName = 'What is the result of the expression?';
    $gameData = function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];
        $question = "{$firstNumber} {$operator} {$secondNumber}";
        switch ($operator) {
            case '+':
                $correctAnswer = $firstNumber + $secondNumber;
                break;
            case '-':
                $correctAnswer = $firstNumber - $secondNumber;
                break;
            case '*':
                $correctAnswer = $firstNumber * $secondNumber;
                break;
        }
        return [$question, (string)$correctAnswer];
    };
    run($gameName, $gameData);
}
