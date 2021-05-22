<?php

namespace Amin3mej\Perseverance\Test\Integration;


use Amin3mej\Perseverance\Cardinal\CardinalDirection;
use Amin3mej\Perseverance\Commander\Commander;
use Amin3mej\Perseverance\Controller;
use Amin3mej\Perseverance\Playground;
use Amin3mej\Perseverance\Rover\RoverFactory;
use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{
    /**
     * @test
     */
    public function rover_works(): void
    {
        $playground = new Playground(5, 5);
        $perseverance = RoverFactory::create($playground);

        $perseverance->setLocation(1, 2, CardinalDirection::north());
        Commander::interprete('LMLMLMLMM', $perseverance);
        $this->assertEquals("1 3 N", (string) $perseverance);

        $perseverance->setLocation(3, 3, CardinalDirection::east());
        Commander::interprete('MMRMMRMRRM', $perseverance);
        $this->assertEquals("5 1 E", (string) $perseverance);
    }


    /**
     * @test
     */
    public function rover_can_move_not_clean(): void
    {
        $commands = <<<COMMANDS
5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM
COMMANDS;
        $result = <<<COMMANDS
1 3 N
5 1 E
COMMANDS;

        $output = Controller::cliInterface($commands);
        $this->assertEquals($result, $output);
    }
}