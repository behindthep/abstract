<?php

namespace Abstract\Point;

// class Point
function makePoint(int $x, int $y): array
{
    return [
        'x' => $x,
        'y' => $y
    ];
}

function getX(array $point): int
{
    return $point['x'];
}

function getY(array $point): int
{
    return $point['y'];
}

function getMiddlePoint(array $point1, array $point2): array
{
    $x = (getX($point1) + getX($point2)) / 2;
    $y = (getY($point1) + getY($point2)) / 2;

    return makePoint($x, $y);
}

function getSymmetricalPoint(array $point, string $axis = 'x'): array
{
    $x = getX($point);
    $y = getY($point);

    try {
        match (trim(strtolower($axis))) {
            'x' => $y = -$y,
            'y' => $x = -$x
        };
    } catch (\UnhandledMatchError $e) {
        throw new \InvalidArgumentException($e->getMessage() . "\nAxis can only be 'x' or 'y'. You write '{$axis}'.");
    }

    return makePoint($x, $y);
}

// class Segment
function makeSegment(array $beginPoint, array $endPoint): array
{
    return [
        'beginPoint' => $beginPoint,
        'endPoint' => $endPoint
    ];
}

// Usage
// $point1 = makePoint(2, 3);
// $point2 = makePoint(-4, 0);

// $middlePoint = getMiddlePoint($point1, $point2); // [-1, 1.5]
// $symmetricalPoint = getSymmetricalPoint($point1, 'X');

// $segment = makeSegment($point1, $point2);
