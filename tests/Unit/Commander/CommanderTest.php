<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Test\Unit\Commander;

use Amin3mej\Perseverance\Commander\Commander;
use Amin3mej\Perseverance\Exception\InvalidCommandException;
use PHPUnit\Framework\TestCase;

class CommanderTest extends TestCase
{
    /**
     * @test
     */
    public function throw_error_for_commands_out_of_range()
    {
        $commandable = new TestCommandable();
        Commander::interprete("L", $commandable);
        $this->expectException(InvalidCommandException::class);
        Commander::interprete("X", $commandable);
    }

    /**
     * @test
     */
    public function commander_works_fine(): void
    {
        $commandable = new TestCommandable();
        self::assertEquals("", $commandable->getLastCommands());

        Commander::interprete("L", $commandable);
        self::assertEquals(TestCommandable::LEFT, $commandable->getLastCommands());

        $commandable->resetLastCommands();
        Commander::interprete("R", $commandable);
        self::assertEquals(TestCommandable::RIGHT, $commandable->getLastCommands());

        $commandable->resetLastCommands();
        Commander::interprete("M", $commandable);
        self::assertEquals(TestCommandable::FORWARD, $commandable->getLastCommands());

        $commandable->resetLastCommands();
        Commander::interprete("LRM", $commandable);
        self::assertEquals(TestCommandable::LEFT . TestCommandable::RIGHT . TestCommandable::FORWARD, $commandable->getLastCommands());
    }
}
