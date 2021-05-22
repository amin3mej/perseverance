<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Rover;

use Amin3mej\Perseverance\Playground;

class RoverFactory
{
    public static function create(Playground $playground): Rover
    {
        return new Rover($playground);
    }
}