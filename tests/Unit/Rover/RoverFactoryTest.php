<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Test\Unit\Rover;

use Amin3mej\Perseverance\Cardinal\CardinalDirection;
use Amin3mej\Perseverance\Exception\InvalidPositionException;
use Amin3mej\Perseverance\Playground;
use Amin3mej\Perseverance\Rover\RoverFactory;
use PHPUnit\Framework\TestCase;

class RoverFactoryTest extends TestCase
{

    /**
     * @test
     */
    public function cant_create_rover_without_playground(): void
    {
        $this->expectException(\TypeError::class);
        RoverFactory::create(null);
    }
}
