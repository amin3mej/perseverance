<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Test\Unit;


use Amin3mej\Perseverance\Exception\OutOfPlaygroundRangeException;
use Amin3mej\Perseverance\Playground;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PlaygroundTest extends TestCase
{
    /**
     * @test
     */
    public function get_playground(): void
    {
        $playground = new Playground(5, 6);

        self::assertInstanceOf(Playground::class, $playground);
        self::assertEquals(5, $playground->getWidth());
        self::assertEquals(6, $playground->getHeight());
    }

    /**
     * @test
     */
    public function get_playground_should_not_accept_zero_as_width(): void
    {
        $this->expectException(OutOfPlaygroundRangeException::class);
        new Playground(0, 8);
    }

    /**
     * @test
     */
    public function get_playground_should_not_accept_negative_width(): void
    {
        $this->expectException(OutOfPlaygroundRangeException::class);
        new Playground(-2, 8);
    }

    /**
     * @test
     */
    public function get_playground_should_not_accept_negative_height(): void
    {
        $this->expectException(OutOfPlaygroundRangeException::class);
        new Playground(8, -2);
    }

    /**
     * @test
     */
    public function get_playground_should_not_accept_zero_as_height(): void
    {
        $this->expectException(OutOfPlaygroundRangeException::class);
        new Playground(8, 0);
    }
}