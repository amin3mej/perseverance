<?php

namespace Amin3mej\Perseverance\Test\Unit\Rover;

use Amin3mej\Perseverance\Cardinal\CardinalDirection;
use Amin3mej\Perseverance\Exception\InvalidPositionException;
use Amin3mej\Perseverance\Playground;
use Amin3mej\Perseverance\Rover\Rover;
use Amin3mej\Perseverance\Rover\RoverFactory;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /**
     * @test
     */
    public function rover_moves_well(): void
    {
        $rover = RoverFactory::create(new Playground(4, 4));
        $rover->setLocation(3, 3, CardinalDirection::east());
        self::assertEquals("3 3 E", (string) $rover);
        $rover->goAhead();
        self::assertEquals("4 3 E", (string) $rover);
        $rover->turnLeft();
        self::assertEquals("4 3 N", (string) $rover);
        $rover->goAhead();
        self::assertEquals("4 4 N", (string) $rover);

    }

    /**
     * @test
     */
    public function cant_start_a_rover_out_of_range(): void
    {
        $this->expectException(InvalidPositionException::class);
        $rover = RoverFactory::create(new Playground(4, 4));
        $rover->setLocation(5, 4, CardinalDirection::east());
    }

    /**
     * @test
     */
    public function cant_move_a_rover_out_of_range(): void
    {
        $rover = RoverFactory::create(new Playground(4, 4));
        $rover->setLocation(3, 4, CardinalDirection::east());
        $rover->goAhead();

        $this->expectException(InvalidPositionException::class);
        $rover->goAhead();
    }
}
