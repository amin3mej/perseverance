<?php

namespace Amin3mej\Perseverance\Test\Unit\Cardinal;

use Amin3mej\Perseverance\Cardinal\CardinalDirection;
use PHPUnit\Framework\TestCase;

class CardinalDirectionTest extends TestCase
{
    public function testGetLeft()
    {
        $direction = CardinalDirection::east();
        self::assertEquals(CardinalDirection::EAST, $direction->getValue());

        $direction = $direction->getLeft();
        self::assertEquals(CardinalDirection::NORTH, $direction->getValue());

        $direction = $direction->getLeft();
        self::assertEquals(CardinalDirection::WEST, $direction->getValue());

        $direction = $direction->getLeft();
        self::assertEquals(CardinalDirection::SOUTH, $direction->getValue());

        $direction = $direction->getLeft();
        self::assertEquals(CardinalDirection::EAST, $direction->getValue());
    }
}
