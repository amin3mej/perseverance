<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Test\Unit\Commander;


use Amin3mej\Perseverance\Commander\Commandable;

class TestCommandable implements Commandable
{
    const LEFT = "L";
    const RIGHT = "R";
    const FORWARD = "M";
    /**
     * @var string
     */
    private $lastCommands = "";

    function turnLeft(): void
    {
        $this->lastCommands .= self::LEFT;
    }

    function turnRight(): void
    {
        $this->lastCommands .= self::RIGHT;
    }

    function goAhead(): void
    {
        $this->lastCommands .= self::FORWARD;
    }

    public function getLastCommands(): string
    {
        return $this->lastCommands;
    }

    public function resetLastCommands()
    {
        $this->lastCommands = '';
    }
}