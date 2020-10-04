<?php
declare(strict_types=1);

class DayTwo
{
    private array $opCode = [
        1, 0, 0, 3, 1, 1, 2, 3, 1, 3, 4,
        3, 1, 5, 0, 3, 2, 10, 1, 19, 1,
        5, 19, 23, 1, 23, 5, 27, 1, 27,
        13, 31, 1, 31, 5, 35, 1, 9, 35,
        39, 2, 13, 39, 43, 1, 43, 10,
        47, 1, 47, 13, 51, 2, 10, 51,
        55, 1, 55, 5, 59, 1, 59, 5, 63,
        1, 63, 13, 67, 1, 13, 67, 71,
        1, 71, 10, 75, 1, 6, 75, 79, 1,
        6, 79, 83, 2, 10, 83, 87, 1, 87,
        5, 91, 1, 5, 91, 95, 2, 95, 10,
        99, 1, 9, 99, 103, 1, 103, 13,
        107, 2, 10, 107, 111, 2, 13, 111,
        115, 1, 6, 115, 119, 1, 119, 10,
        123, 2, 9, 123, 127, 2, 127, 9, 131,
        1, 131, 10, 135, 1, 135, 2, 139, 1,
        10, 139, 0, 99, 2, 0, 14, 0
    ];

    public function getOpCode(): array
    {
        return $this->opCode;
    }

    //part one
    public function partOne(array $opCode, int $noun, int $verb): array
    {
        $opCode[1] = $noun;
        $opCode[2] = $verb;

        for ($i = 0, $length = count($opCode); $i < $length; $i += 4) {
            if ($opCode[$i] === 99) {
                break;
            }
            if ($opCode[$i] === 1) {
                $opCode[$opCode[$i + 3]] = $opCode[$opCode[$i + 1]] + $opCode[$opCode[$i + 2]];
            } elseif ($opCode[$i] === 2) {
                $opCode[$opCode[$i + 3]] = $opCode[$opCode[$i + 1]] * $opCode[$opCode[$i + 2]];
            }
        }
        var_dump($opCode[0]);
        return $opCode;
    }

    //part two
    public function partTwo(): array
    {
        for ($i = 0; $i < 100; $i++) {
            for ($j = 0; $j < 100; $j++) {
                $outPut = $this->partOne($this->getOpCode(), $i, $j);
                if ($outPut[0] === 19690720) {
                    var_dump([$i, $j]);
                    return [$i, $j];
                }
            }
        }
    }
}


$solution = new DayTwo;
$solution->partOne($solution->getOpCode(), 12, 2);
$solution->partTwo();
