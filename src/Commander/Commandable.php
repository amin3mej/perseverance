<?php declare(strict_types=1);

namespace Amin3mej\Perseverance\Commander;

interface Commandable
{
    function turnLeft(): void;
    function turnRight(): void;
    function goAhead(): void;
}