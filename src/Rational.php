<?php

namespace Abstract\Rational;

// нахождение НОД
// private
function gcd(int $a, int $b): int
{
 // 10/20
    while ($b !== 0) {// 1: 2:
        $temp = $b;   // 20 10
        $b = $a % $b; // 10 0  => return 10;
        $a = $temp;   // 20 10
    }
    return $a;
}

function normalizeRational(int $numer, int $denom): array
{
    $gcd = gcd($numer, $denom);

    $normalizedNumer = abs($numer / $gcd);
    $normalizedDenom = abs($denom / $gcd);

    if ($numer * $denom < 0) {
        $normalizedNumer = -$normalizedNumer;
    }

    return [$normalizedNumer, $normalizedDenom];
}

// public
function makeRational(int $numer, int $denom): array
{
    if ($denom === 0) {
        throw new \InvalidArgumentException("Denom can't be 0.");
    }

    [$normalizedNumer, $normalizedDenom] = normalizeRational($numer, $denom);

    return [
        'numer' => $normalizedNumer,
        'denom' => $normalizedDenom
    ];
}

function getNumer(array $rational): int
{
    return $rational['numer'];
}

function getDenom(array $rational): int
{
    return $rational['denom'];
}

function mul(array $rational1, array $rational2): array
{
    return makeRational(
        getNumer($rational1) * getNumer($rational2),
        getDenom($rational1) * getDenom($rational2)
    );
}

function printMul($rational1, $rational2): void
{
    $multiplied = mul($rational1, $rational2);

    echo "Numer: " . getNumer($multiplied);
    echo "\nDenom: " . getDenom($multiplied);
}

// Usage
// $num1 = makeRational(10, 20);
// $num2 = makeRational(4, 17);
// print_r($num1);

// echo getNumer($num1); // 1

// $mul = mul($num1, $num2);
// print_r($mul);

// printMul($num1, $num2);

// // Инвариант
// var_dump(1 === getNumer($num1)); // true
