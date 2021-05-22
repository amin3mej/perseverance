<?php


namespace Amin3mej\Perseverance\Commander;


use Amin3mej\Perseverance\Exception\InvalidCommandException;

class Commander
{
    public const LEFT = 'L';
    public const FORWARD = 'M';
    public const RIGHT = 'R';

    /**
     * @throws InvalidCommandException
     */
    public static function interprete(string $commands, Commandable $commandable)
    {
        foreach (str_split($commands) as $command) {

            if ($command == self::LEFT) {
                $commandable->turnLeft();
            } elseif ($command == self::RIGHT) {
                $commandable->turnRight();
            } elseif ($command == self::FORWARD) {
                $commandable->goAhead();
            } else {
                throw new InvalidCommandException();
            }
        }
    }
}