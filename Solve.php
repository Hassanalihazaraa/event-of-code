<?php
declare(strict_types=1);


class Solve
{
    private array $numbers = [
        148454,
        118001,
        98851,
        51106,
        113158,
        139801,
        126884,
        63241,
        71513,
        60490,
        131129,
        76176,
        74841,
        73589,
        130062,
        77999,
        140758,
        98182,
        101049,
        80951,
        75759,
        92666,
        142078,
        89196,
        124613,
        134713,
        75618,
        62680,
        141366,
        108899,
        88419,
        133385,
        90018,
        123521,
        51919,
        58191,
        109523,
        106012,
        94564,
        61103,
        72803,
        66309,
        143380,
        113708,
        146037,
        135176,
        131177,
        77109,
        108287,
        72170,
        87055,
        121407,
        126216,
        139520,
        120675,
        103833,
        130708,
        74029,
        149840,
        117122,
        105745,
        81186,
        51331,
        72686,
        52095,
        72612,
        76915,
        104859,
        114009,
        69714,
        130716,
        133106,
        73911,
        79766,
        56647,
        98035,
        103504,
        93728,
        111546,
        57637,
        68064,
        62803,
        72759,
        144845,
        80084,
        139247,
        139905,
        112807,
        87844,
        149388,
        76795,
        135703,
        120523,
        137422,
        108335,
        60206,
        133851,
        138574,
        141740,
        74398
    ];

    public function partOne(): void
    {
        $result = [];
        foreach ($this->numbers as $key => $number) {
            $result[$key] = floor($number / 3) - 2;
        }
        print_r(array_sum($result));
    }

    public function partTwo(): void
    {
        $result = [];
        $sum = [];
        foreach ($this->numbers as $key => $number) {
            $result[$key] = floor($number / 3) - 2;
            $sum[$key] += $result[$key];
            while ($result[$key] > 6) {
                foreach ($result as $i => $bigNumber) {
                    if ($result[$i] > 6) {
                        $result[$i] = floor($bigNumber / 3) - 2;
                        $sum[$i] += $result[$i];
                    }
                }
            }
        }
        print_r(array_sum($sum));
    }
}

$solution = new Solve();
$solution->partOne();
$solution->partTwo();